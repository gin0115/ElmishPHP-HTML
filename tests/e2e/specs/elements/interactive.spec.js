const { test, expect } = require('../../fixtures');

test.describe('interactive elements', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('details has a summary and hidden body content', async ({ page }) => {
        const details = page.locator('#interactive details');
        await expect(details.locator('summary')).toHaveText('Click to expand');
        await expect(details.locator('p')).toHaveText('Hidden content revealed.');
    });

    test('details opens when summary is clicked', async ({ page }) => {
        const details = page.locator('#interactive details');
        await expect(details).not.toHaveAttribute('open', '');
        await details.locator('summary').click();
        await expect(details).toHaveAttribute('open', '');
    });

    test('dialog renders with bare-flag open attribute', async ({ page }) => {
        const dialog = page.locator('#interactive dialog');
        await expect(dialog).toHaveAttribute('open', '');
        await expect(dialog.locator('p')).toHaveText('A non-modal dialog.');
    });
});
