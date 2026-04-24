const { test, expect } = require('../../fixtures');

test.describe('div fixture', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=div');
    });

    test('outer div renders with id and class', async ({ page }) => {
        const outer = page.locator('#outer');
        await expect(outer).toBeVisible();
        await expect(outer).toHaveClass(/wrapper/);
    });

    test('nested span renders with data attribute and text', async ({ page }) => {
        const inner = page.locator('[data-test="inner"]');
        await expect(inner).toBeVisible();
        await expect(inner).toHaveText('hello world');
    });
});
