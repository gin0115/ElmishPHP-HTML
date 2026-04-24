const { test, expect } = require('../../fixtures');

test.describe('sectioning elements', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('article wraps header, nav, main, aside, footer', async ({ page }) => {
        const root = page.locator('#sectioning');
        await expect(root).toHaveCount(1);
        await expect(root.locator('header')).toHaveCount(1);
        await expect(root.locator('nav')).toHaveCount(1);
        await expect(root.locator('main')).toHaveCount(1);
        await expect(root.locator('aside')).toHaveCount(1);
        await expect(root.locator('footer')).toHaveCount(1);
    });

    test('header contains article title', async ({ page }) => {
        await expect(page.locator('#sectioning header h2')).toHaveText('Article title');
    });

    test('nav contains anchor links to each section', async ({ page }) => {
        const links = page.locator('#sectioning nav a');
        await expect(links).toHaveCount(2);
        await expect(links.nth(0)).toHaveAttribute('href', '#section-1');
        await expect(links.nth(1)).toHaveAttribute('href', '#section-2');
    });

    test('main contains both numbered sections', async ({ page }) => {
        await expect(page.locator('#sectioning main #section-1 p')).toHaveText('Section 1 content.');
        await expect(page.locator('#sectioning main #section-2 p')).toHaveText('Section 2 content.');
    });
});
