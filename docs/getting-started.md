# Getting started

## Install

```shell
composer require gin0115/elmishphp-html
```

The library is autoloaded via composer's PSR-4 — no extra setup.

```php
require_once 'vendor/autoload.php';
```

## Your first render

Each tag is a function imported from the `Gin0115\ElmishPHP\HTML` namespace. Use them with PHP's `use function` to keep call sites short.

```php
use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\p;
use function Gin0115\ElmishPHP\HTML\text;

echo div(['class' => 'card'])(
    p()(text('Hello, world.')),
);
```

```html
<div class="card"><p>Hello, world.</p></div>
```

## The mental model

Three things to internalise and the rest of the library is just composition.

### 1. Tag functions are curried

Every non-void tag takes **two** calls: attributes first, children second.

```php
div(['id' => 'wrap'])(text('hi'))
//  ^ first call: attributes      ^ second call: children
```

Children are variadic — pass as many as you like:

```php
div()(text('one'), text(' '), text('two'))
```

### 2. Each tag returns a typed object

`div(...)(...)` returns a `Gin0115\ElmishPHP\HTML\Element\Div`. It has `__toString`, so you can `echo` it, concat it, or pass it as a child to another tag.

```php
$header = h1()(text('Title'));
$body   = p()(text('content'));

echo div()($header, $body);
```

### 3. Composition is the whole API

There's no template engine, no DSL parser. You build a tree of objects, then render by stringification. Anywhere you'd usually write a partial, just write a function that returns a `Renderable`.

```php
function card(string $title, string $body): Div {
    return div(['class' => 'card'])(
        h2()(text($title)),
        p()(text($body)),
    );
}

echo card('Hello', 'World');
```

## Where to next

- [Attributes](concepts/attributes.md) — the three attribute forms
- [Text and escaping](concepts/text-and-escaping.md) — what's safe by default
- [Void elements](concepts/void-elements.md) — what about `br`, `img`, `input`?
- [Element reference](index.md#element-reference) — every supported tag
