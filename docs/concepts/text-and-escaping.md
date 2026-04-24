# Text and escaping

Three ways to put text into an element. They differ in escaping behaviour.

| | escapes? | when to use |
|---|---|---|
| `text('...')` | yes | the default for any user-provided string |
| `raw('<b>x</b>')` | no  | pre-rendered HTML you trust |
| bare `'string'` | yes (auto) | shorthand for `text(...)` as a child |

## `text()` — escape

```php
use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\text;

echo div()(text('<script>alert(1)</script>'));
// <div>&lt;script&gt;alert(1)&lt;/script&gt;</div>
```

`text()` returns a `Gin0115\ElmishPHP\HTML\TextNode\Text` — its `__toString` runs `htmlspecialchars($s, ENT_QUOTES, 'UTF-8')`. Use this for **anything you didn't write yourself**.

## `raw()` — passthrough

```php
use function Gin0115\ElmishPHP\HTML\raw;

echo div()(raw('<b>bold</b>'));
// <div><b>bold</b></div>
```

`raw()` returns a `Gin0115\ElmishPHP\HTML\TextNode\Raw` — its `__toString` returns the string as-is, no escaping. Use for HTML strings you fully trust (e.g. output from another renderer).

**This is an XSS vector if misused.** Never wrap user input in `raw()`.

## Bare strings as children

For ergonomics, you can pass a plain PHP string as a child instead of wrapping it in `text()` — the library auto-escapes it the same way `text()` would.

```php
echo div()('<script>alert(1)</script>');
// <div>&lt;script&gt;alert(1)&lt;/script&gt;</div>
```

This is exactly equivalent to `div()(text('...'))`. Pick whichever reads better at the call site.

## Mixed children

Children can be any mix of: `Renderable` objects (other elements, `Text`, `Raw`) and plain strings.

```php
echo p()(
    text('Click '),
    a(['href' => '/'])(text('here')),
    text(', then read '),
    raw('<b>this</b>'),
    '.',                              // plain string — auto-escapes
);
// <p>Click <a href="/">here</a>, then read <b>this</b>.</p>
```

## Default to safe

The rule of thumb: if you didn't write the string in your own source code, use `text()` (or just pass it bare). Reach for `raw()` only when you've got HTML you generated yourself — and even then, prefer composing with element functions where possible.

---

[Back](../index.md)
