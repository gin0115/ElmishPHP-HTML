const { test, expect } = require('../../fixtures');

test.describe('inline elements', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('strong, em, small, b, mark all render as their tags', async ({ page }) => {
        const root = page.locator('#inline-elements');
        await expect(root.locator('strong')).toHaveText('strong');
        await expect(root.locator('em')).toHaveText('emphasised');
        await expect(root.locator('small')).toHaveText('small');
        await expect(root.locator('b')).toHaveText('bold');
        await expect(root.locator('mark')).toHaveText('highlighted');
    });

    test('abbr carries title attribute and inline text', async ({ page }) => {
        const abbr = page.locator('#inline-elements abbr');
        await expect(abbr).toHaveText('HTML');
        await expect(abbr).toHaveAttribute('title', 'Hyper Text Markup Language');
    });

    test('time carries datetime attribute', async ({ page }) => {
        const time = page.locator('#inline-elements time');
        await expect(time).toHaveText('today');
        await expect(time).toHaveAttribute('datetime', '2026-04-24');
    });

    test('inline code renders as code', async ({ page }) => {
        await expect(page.locator('#inline-elements code')).toHaveText('inline code');
    });
});
