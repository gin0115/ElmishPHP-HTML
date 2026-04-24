const { test, expect } = require('../../fixtures');

test.describe('kitchen sink fixture', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('standard attributes — id, class, data-*', async ({ page }) => {
        const el = page.locator('#with-attrs');
        await expect(el).toBeVisible();
        await expect(el).toHaveClass('foo bar');
        await expect(el).toHaveAttribute('data-test', 'attr-value');
    });

    test('positional entry renders as bare flag', async ({ page }) => {
        const el = page.locator('#bare-flag');
        await expect(el).toHaveAttribute('data-special', '');
    });

    test('null value renders as bare flag', async ({ page }) => {
        const el = page.locator('#null-attr');
        await expect(el).toHaveAttribute('data-bool', '');
    });

    test('attribute values are escaped', async ({ page }) => {
        const el = page.locator('#escape-attr');
        await expect(el).toHaveAttribute('title', 'a "quote" & <b>');
    });

    test('bare-string children auto-escape', async ({ page }) => {
        const el = page.locator('#escape-string-child');
        await expect(el).toContainText('<script>document.body.dataset.xssed = "bare-string"</script>');
        await expect(page.locator('body')).not.toHaveAttribute('data-xssed', 'bare-string');
    });

    test('text() escapes html', async ({ page }) => {
        const el = page.locator('#escape-text-fn');
        await expect(el).toContainText('<em>literal text, not html</em>');
        await expect(el.locator('em')).toHaveCount(0);
    });

    test('raw() bypasses escaping', async ({ page }) => {
        const el = page.locator('#raw-html em');
        await expect(el).toHaveCount(1);
        await expect(el).toHaveText('actually italic');
    });

    test('nested elements render correctly', async ({ page }) => {
        const inner = page.locator('#nested span.inner');
        await expect(inner).toHaveText('hello world');
    });

    test('void element renders without closing tag', async ({ page }) => {
        const br = page.locator('#void-element br');
        await expect(br).toHaveCount(1);
    });

    test('node() renders arbitrary custom tag with attrs and children', async ({ page }) => {
        const article = page.locator('#custom-tag article[data-custom="yes"]');
        await expect(article).toBeVisible();
        await expect(article.locator('h3')).toHaveText('article heading via node()');
        await expect(article).toContainText('content');
    });

    test('mixed child types — text, element, raw, plain string', async ({ page }) => {
        const el = page.locator('#mixed-children');
        await expect(el.locator('span')).toHaveText('span');
        await expect(el.locator('i')).toHaveText('raw()');
        await expect(el).toContainText('plain string (auto-escaped)');
    });
});
