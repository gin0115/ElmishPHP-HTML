# Elmish PHP — HTML — Docs

A functional HTML library for PHP, modelled on Elm's `Html` package. Each tag is a curried function that returns a typed value object. Stringify the root and you get HTML.

```php
use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\p;
use function Gin0115\ElmishPHP\HTML\text;

echo div(['class' => 'card'])(
    p()(text('Hello, world.')),
);
// <div class="card"><p>Hello, world.</p></div>
```

## Get started

- [Getting started](getting-started.md) — install, first render, mental model

## Concepts

The "why and how" behind the API. Read these once and the rest of the library makes sense.

- [Attributes](concepts/attributes.md) — three forms: named, null-flag, positional-flag; escaping
- [Text and escaping](concepts/text-and-escaping.md) — `text()` vs `raw()` vs bare strings
- [Void elements](concepts/void-elements.md) — `br`, `img`, `input` etc. — why they don't take a second call
- [Custom tags](concepts/custom-tags.md) — `node()` escape hatch for arbitrary tags
- [Type hierarchy](concepts/type-hierarchy.md) — `Renderable`, `Element`, marker interfaces
- [Elm-style formatting](concepts/elm-formatting.md) — leading-comma layout for long trees

## Element reference

77 standard HTML elements, grouped by category. Each page lists every tag with a one-line example and the rendered output.

- [Block](elements/block.md) — `div`, `p`, `h1`–`h6`, `ul`, `blockquote`, …
- [Inline](elements/inline.md) — `span`, `a`, `strong`, `em`, `code`, …
- [Sectioning](elements/sectioning.md) — `header`, `footer`, `nav`, `main`, …
- [Form](elements/form.md) — `form`, `input`, `button`, `select`, …
- [Table](elements/table.md) — `table`, `tr`, `td`, `th`, …
- [Media](elements/media.md) — `img`, `video`, `iframe`, …
- [Interactive](elements/interactive.md) — `details`, `summary`, `dialog`

## Recipes

Practical patterns assembled from the primitives.

- [Signup form](recipes/signup-form.md)
- [Data table](recipes/data-table.md)
- [Article page](recipes/article-page.md)

## Other

- [Testing](testing.md) — PHPUnit + Playwright

---

[Back to README](../README.md)
