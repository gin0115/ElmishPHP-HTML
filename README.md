# Elmish PHP — HTML

A functional library for creating HTML in PHP, heavily inspired by Elm's `Html` package. Each element is a typed value object with `__toString` — compose them with curried functions, render by stringification.

## Why

Erm, next question........ok fine, why not. I really enjoyed ELMs approach to creating HTML and have played around with this idea before (Functional WP Plugin).

## Install

```shell
composer require gin0115/elmishphp-html
```

Then the usual `require 'vendor/autoload.php'` and you're good to go.

## How it works

Each HTML tag is a curried function. The first call passes attributes, the second passes children. Every function returns a typed object that knows how to render itself.

```php
use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\span;
use function Gin0115\ElmishPHP\HTML\p;
use function Gin0115\ElmishPHP\HTML\text;

echo div(['id' => 'wrap', 'class' => 'card'])(
    p()(text('Hello, '), span(['class' => 'name'])(text('world'))),
);
```

```html
<div id="wrap" class="card"><p>Hello, <span class="name">world</span></p></div>
```

### Elm-style formatting

For longer trees, leading-comma style mirrors `elm-format`:

```php
div ([ 'id' => 'wrap', 'class' => 'card' ])
    ( p ()
        ( text('Hello, ')
        , span ([ 'class' => 'name' ])(text('world'))
        )
    );
```

### Text content

| | escapes? | use for |
|---|---|---|
| `text('...')` | yes | the default for any string |
| `raw('<b>x</b>')` | no  | pre-rendered HTML you trust |
| bare `'string'` | yes (auto) | shorthand for `text('string')` as a child |

```php
echo div()(text('<script>alert(1)</script>'));
// <div>&lt;script&gt;alert(1)&lt;/script&gt;</div>

echo div()(raw('<b>bold</b>'));
// <div><b>bold</b></div>
```

### Attributes

Attributes are an associative array. Three forms:

```php
div([
    'id'        => 'foo',   // standard key=value — value is HTML-escaped
    'data-flag' => null,    // null value → bare flag attribute
    'data-other',           // positional entry → bare flag attribute
])(text('hi'));
```

```html
<div id="foo" data-flag data-other>hi</div>
```

All attribute *values* are HTML-escaped. Keys are not (they're under your control).

### Void elements

Void elements take attributes only — **no second call for children**:

```php
echo br();                                            // <br>
echo img(['src' => 'logo.png', 'alt' => 'logo']);     // <img src="logo.png" alt="logo">
echo input(['type' => 'text', 'name' => 'q', 'required']);
// <input type="text" name="q" required>
```

The void set: `br`, `hr`, `img`, `input`, `wbr`, `col`, `source`, `track`.

### Custom tags via `node()`

For anything not in the built-in set:

```php
use function Gin0115\ElmishPHP\HTML\node;

echo node('custom-element', ['data-x' => 'y'])(text('whatever'));
// <custom-element data-x="y">whatever</custom-element>
```

## Type hierarchy

Everything renderable shares a small interface tree — useful for categorisation and type-narrowing in your own code:

```
Renderable extends \Stringable
├── Element
│   ├── BlockElement                                   div, p, h1-h6, ul, blockquote, ...
│   ├── InlineElement                                  span, a, strong, em, br, code, ...
│   ├── SectioningElement extends BlockElement         header, footer, nav, main, ...
│   ├── FormElement                                    form, input, button, select, ...
│   ├── TableElement                                   table, tr, td, th, ...
│   ├── MediaElement                                   img, video, iframe, ...
│   ├── InteractiveElement                             details, summary, dialog
│   └── VoidElement                                    marker on br, hr, img, input, ...
└── TextNode                                           Text, Raw
```

Every element function returns its concrete typed class (e.g. `div(...)(...)` returns `Gin0115\ElmishPHP\HTML\Element\Div`), so you can `instanceof BlockElement` or pass them around with full type info.

## Supported tags

77 standard HTML elements out of the box.

| Category | Tags |
|---|---|
| Block | `div`, `p`, `h1`–`h6`, `pre`, `blockquote`, `ul`, `ol`, `li`, `dl`, `dt`, `dd`, `figure`, `figcaption`, `hr` |
| Inline | `span`, `a`, `strong`, `em`, `small`, `b`, `i`, `u`, `mark`, `code`, `kbd`, `samp`, `sub`, `sup`, `time`, `abbr`, `cite`, `q`, `br`, `wbr` |
| Sectioning | `header`, `footer`, `main`, `nav`, `section`, `article`, `aside` |
| Form | `form`, `fieldset`, `legend`, `label`, `button`, `select`, `optgroup`, `option`, `textarea`, `input` |
| Table | `table`, `caption`, `colgroup`, `thead`, `tbody`, `tfoot`, `tr`, `td`, `th`, `col` |
| Media | `img`, `iframe`, `video`, `audio`, `canvas`, `picture`, `source`, `track` |
| Interactive | `details`, `summary`, `dialog` |

For anything else, use `node('tag-name', ...)`.

## Tests

**PHPUnit** (unit / behaviour):

```shell
composer test
```

**Playwright** (browser-driven E2E against the kitchen-sink fixtures):

```shell
npm install
npm run server:up        # docker container on http://localhost:57893
npm run test:e2e --      # extra playwright flags after --
npm run server:down      # when finished
```

The kitchen-sink fixture at `tests/e2e/views/kitchen-sink.php` exercises every category — visit `http://localhost:57893/?fixture=kitchen-sink` while the server is up.

## Requirements

- PHP 8.2+
- (optional) Docker + Node for the e2e suite

## License

GPL-2.0-or-later
