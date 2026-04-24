const { test, expect } = require('../../fixtures');

test.describe('block elements', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('headings render at correct levels', async ({ page }) => {
        const root = page.locator('#block-elements');
        await expect(root.locator('h1')).toHaveText('Heading 1');
        await expect(root.locator('h2')).toHaveText('Heading 2');
        await expect(root.locator('h3')).toHaveText('Heading 3');
    });

    test('paragraph contains inline strong + em children', async ({ page }) => {
        const p = page.locator('#block-elements > p');
        await expect(p.locator('strong')).toHaveText('strong');
        await expect(p.locator('em')).toHaveText('emphasis.');
    });

    test('blockquote wraps a nested paragraph', async ({ page }) => {
        await expect(page.locator('#block-elements blockquote p')).toHaveText('A block quote.');
    });

    test('hr renders as a void element', async ({ page }) => {
        await expect(page.locator('#block-elements hr')).toHaveCount(1);
    });

    test('pre + code renders code text', async ({ page }) => {
        await expect(page.locator('#block-elements pre code')).toHaveText('print("hello world")');
    });
});
