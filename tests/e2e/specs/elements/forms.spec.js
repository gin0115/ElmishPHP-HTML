const { test, expect } = require('../../fixtures');

test.describe('form elements', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=kitchen-sink');
    });

    test('form has correct method and action', async ({ page }) => {
        const form = page.locator('#kitchen-form');
        await expect(form).toHaveAttribute('method', 'post');
        await expect(form).toHaveAttribute('action', '#');
    });

    test('fieldset has legend', async ({ page }) => {
        await expect(page.locator('#kitchen-form fieldset legend')).toHaveText('Sign up');
    });

    test('text input is wired to its label', async ({ page }) => {
        const label = page.locator('#kitchen-form label[for="name"]');
        const input = page.locator('#kitchen-form input#name');
        await expect(label).toHaveText('Name');
        await expect(input).toHaveAttribute('type', 'text');
        await expect(input).toHaveAttribute('required', '');
    });

    test('select has two options with correct values', async ({ page }) => {
        const options = page.locator('#kitchen-form select#role option');
        await expect(options).toHaveCount(2);
        await expect(options.nth(0)).toHaveAttribute('value', 'dev');
        await expect(options.nth(0)).toHaveText('Developer');
        await expect(options.nth(1)).toHaveAttribute('value', 'des');
        await expect(options.nth(1)).toHaveText('Designer');
    });

    test('textarea renders with rows attr and inner text', async ({ page }) => {
        const textarea = page.locator('#kitchen-form textarea#bio');
        await expect(textarea).toHaveAttribute('rows', '3');
        await expect(textarea).toHaveValue('Tell us about yourself.');
    });

    test('submit button renders with correct type', async ({ page }) => {
        const button = page.locator('#kitchen-form button');
        await expect(button).toHaveAttribute('type', 'submit');
        await expect(button).toHaveText('Submit');
    });
});
