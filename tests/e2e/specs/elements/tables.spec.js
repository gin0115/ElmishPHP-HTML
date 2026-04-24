const { test, expect } = require('../../fixtures');

test.describe('table elements', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('table has caption, thead and tbody', async ({ page }) => {
        const table = page.locator('#kitchen-table');
        await expect(table.locator('caption')).toHaveText('Browser market share');
        await expect(table.locator('thead tr th')).toHaveCount(2);
        await expect(table.locator('tbody tr')).toHaveCount(3);
    });

    test('header cells render in correct order', async ({ page }) => {
        const ths = page.locator('#kitchen-table thead th');
        await expect(ths.nth(0)).toHaveText('Browser');
        await expect(ths.nth(1)).toHaveText('Share');
    });

    test('body rows contain expected data', async ({ page }) => {
        const rows = page.locator('#kitchen-table tbody tr');
        await expect(rows.nth(0).locator('td').nth(0)).toHaveText('Chrome');
        await expect(rows.nth(0).locator('td').nth(1)).toHaveText('64%');
        await expect(rows.nth(1).locator('td').nth(0)).toHaveText('Safari');
        await expect(rows.nth(2).locator('td').nth(0)).toHaveText('Firefox');
    });
});
