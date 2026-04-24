# Testing

Two layers of tests — both are run by CI.

## PHPUnit (unit / behaviour)

Fast in-process tests over the lib's classes and rendering behaviour. ~320 tests covering every tag class and every attribute edge case.

```shell
composer test
```

Test files live in `tests/`:

| File | What it covers |
|---|---|
| `tests/TestElements.php` | Feature smoke tests — escaping, `text`/`raw`, void rendering, marker interfaces |
| `tests/TestAllTags.php` | Parameterised over **every** tag class — empty render, with-attrs render, marker compliance, with-children render |
| `tests/TestAttributes.php` | Targeted attribute edge cases — positional flags, null flags, mixed, escaping, void+attrs |

### Adding a new test for a new tag

If you're adding a tag, the easiest way to get full coverage is to add an entry to the data provider in `TestAllTags::tags()`:

```php
'mytag' => ['MyTag', 'mytag', BlockElement::class, false],
//          ^class  ^tag    ^marker               ^isVoid
```

It'll automatically run through all four base assertions (empty render, marker check, attrs render, children render).

### Static analysis

```shell
composer analyse
```

PHPStan at level 8 over `src/`. Should always pass clean.

## Playwright (end-to-end / browser)

Real browser parsing of rendered HTML. Each spec hits a fixture page served by a docker container running PHP's built-in server.

### Setup

```shell
npm install
npx playwright install --with-deps chromium
```

### Run

The fixture server is a separate process — start it once, run tests against it, stop it.

```shell
npm run server:up         # docker up -d on http://localhost:57893
npm run test:e2e --       # extra playwright flags after --
npm run server:down       # when finished
```

### Browse the fixtures

While the server is up, visit `http://localhost:57893/` for an index of available fixtures. The kitchen-sink fixture at `/?fixture=kitchen-sink` exercises every category — useful as a live demo.

### Fixture layout

```
tests/e2e/
├── docker-compose.yml          # spawns the fixture server
├── router.php                  # /?fixture=NAME → views/NAME.php
├── playwright.config.js
├── global-setup.js             # health-probe before suite runs
├── fixtures/
│   └── index.js                # re-exports {test, expect}
├── specs/
│   └── elements/               # per-category spec files
│       ├── block-elements.spec.js
│       ├── inline-elements.spec.js
│       └── ...
└── views/                      # PHP fixtures rendered by router
    ├── kitchen-sink.php
    └── ...
```

### Adding a new fixture + spec

1. Drop a new PHP file in `tests/e2e/views/myfixture.php` — `echo` your elmish output. Composer autoload is already loaded by the router.
2. Visit `http://localhost:57893/?fixture=myfixture` to verify it renders.
3. Add `tests/e2e/specs/elements/myfixture.spec.js`:

```js
const { test, expect } = require('../../fixtures');

test.describe('myfixture', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/?fixture=myfixture');
    });

    test('renders something', async ({ page }) => {
        // ...
    });
});
```

### Custom port / base URL

The default port is `57893`. Override per-run with `ELMISH_BASE_URL`:

```shell
ELMISH_BASE_URL=http://localhost:57895 npm run test:e2e --
```

(Useful for running multiple branches in parallel.)

## CI

Both test suites run on every push and PR via GitHub Actions:

- `.github/workflows/php.yml` — PHPUnit + PHPStan across PHP 8.2/8.3/8.4, Codecov upload from 8.3
- `.github/workflows/e2e.yml` — Playwright against chromium

---

[Back](index.md)
