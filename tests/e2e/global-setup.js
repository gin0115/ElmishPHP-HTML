const { test: setup, expect } = require('@playwright/test');

const BASE_URL = process.env.ELMISH_BASE_URL || 'http://localhost:57893';

setup('elmish fixture server is reachable', async ({ request }) => {
    const response = await request.get(`${BASE_URL}/?fixture=__health`);
    expect(response.ok()).toBeTruthy();
    expect((await response.text()).trim()).toBe('ok');
});
