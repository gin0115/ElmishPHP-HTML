const { defineConfig } = require('@playwright/test');

module.exports = defineConfig({
    reporter: process.env.CI ? [['github']] : [['list']],
    forbidOnly: !!process.env.CI,
    fullyParallel: false,
    workers: 1,
    retries: process.env.CI ? 2 : 0,
    testDir: './specs',
    outputDir: '../test-results',
    snapshotPathTemplate:
        '{testDir}/{testFileDir}/__snapshots__/{testFileName}/{arg}{ext}',

    use: {
        baseURL: process.env.ELMISH_BASE_URL || 'http://localhost:57893',
        trace: 'retain-on-failure',
        screenshot: 'only-on-failure',
        video: 'retain-on-failure',
    },

    projects: [
        {
            name: 'setup',
            testDir: __dirname,
            testMatch: /global-setup\.js/,
            teardown: undefined,
        },
        {
            name: 'chromium-desktop',
            use: {
                browserName: 'chromium',
                viewport: { width: 1280, height: 800 },
            },
            dependencies: ['setup'],
        },
    ],

    globalSetup: undefined,
});
