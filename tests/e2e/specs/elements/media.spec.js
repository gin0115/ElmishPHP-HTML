const { test, expect } = require('../../fixtures');

test.describe('media elements', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('img is a void element with src and alt attributes', async ({ page }) => {
        const img = page.locator('#media img');
        await expect(img).toHaveAttribute('src', 'https://placehold.co/120x80');
        await expect(img).toHaveAttribute('alt', 'placeholder');
        await expect(img).toHaveAttribute('width', '120');
        await expect(img).toHaveAttribute('height', '80');
    });

    test('iframe carries title and dimensions', async ({ page }) => {
        const iframe = page.locator('#media iframe');
        await expect(iframe).toHaveAttribute('title', 'sample iframe');
        await expect(iframe).toHaveAttribute('width', '120');
        await expect(iframe).toHaveAttribute('height', '80');
    });

    test('video renders with controls bare attribute', async ({ page }) => {
        const video = page.locator('#media video');
        await expect(video).toHaveAttribute('controls', '');
        await expect(video).toHaveAttribute('width', '160');
    });
});
