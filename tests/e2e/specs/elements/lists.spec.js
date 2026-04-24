const { test, expect } = require('../../fixtures');

test.describe('lists and figure', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('unordered list contains three items in order', async ({ page }) => {
        const items = page.locator('#lists ul li');
        await expect(items).toHaveCount(3);
        await expect(items.nth(0)).toHaveText('apples');
        await expect(items.nth(1)).toHaveText('oranges');
        await expect(items.nth(2)).toHaveText('pears');
    });

    test('figure contains image and figcaption', async ({ page }) => {
        const figure = page.locator('#lists figure');
        await expect(figure.locator('img')).toHaveAttribute('alt', 'placeholder');
        await expect(figure.locator('figcaption')).toHaveText('a figure caption');
    });
});
