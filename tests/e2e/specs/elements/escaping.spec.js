const { test, expect } = require('../../fixtures');

test.describe('escaping fixture', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=escaping');
    });

    test('attribute values containing quotes and brackets are escaped', async ({ page }) => {
        const target = page.locator('#escape-test');
        await expect(target).toHaveAttribute('title', 'a "quote" & <b>');
    });

    test('script-like text content is rendered as text, not executed', async ({ page }) => {
        const target = page.locator('#escape-test');
        await expect(target).toContainText('<script>document.body.dataset.xssed = "yes"</script>');
        await expect(page.locator('body')).not.toHaveAttribute('data-xssed', 'yes');
    });
});
