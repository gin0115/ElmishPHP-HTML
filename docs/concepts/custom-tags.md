# Custom tags — `node()`

The library ships 77 standard HTML elements. For anything else — custom elements, web components, exotic HTML5 tags not in the built-in set, namespaced markup — use `node()`.

## Signature

```php
node(string $tag, array $attributes = []): callable;
```

Same curried shape as the built-in tag functions: first call passes the tag name and attributes, second call passes children.

```php
use function Gin0115\ElmishPHP\HTML\node;
use function Gin0115\ElmishPHP\HTML\text;

echo node('my-widget', ['data-id' => '42'])(text('content'));
// <my-widget data-id="42">content</my-widget>
```

## What it returns

`node(...)(...)` returns a `Gin0115\ElmishPHP\HTML\Element\CustomElement` — an `AbstractElement` with a runtime tag name. It implements `Element` (the base marker) but **none** of the category markers (`BlockElement`, `InlineElement`, etc) — there's no way for the library to know which category a custom tag belongs to.

If you want a category marker on a custom tag, write your own class:

```php
namespace App\Html;

use Gin0115\ElmishPHP\HTML\Element\AbstractElement;
use Gin0115\ElmishPHP\HTML\Element\BlockElement;

final class MyWidget extends AbstractElement implements BlockElement
{
    public function __construct(array $attributes = [], array $children = [])
    {
        parent::__construct('my-widget', $attributes, $children);
    }
}
```

Then write a function for it the same shape as the built-ins.

## Use cases

- **Web components**: `<my-element>`, `<sl-button>`, etc.
- **MathML / SVG inline tags** that aren't in the built-in set.
- **Custom HTML extensions** (e.g. `<x-icon>`).
- **Server-side template tags** that get processed downstream.

## Limitations

- `node()` always renders an open + close tag. There's no built-in void variant of `node()` — if you need a void custom tag, write a class that extends `AbstractVoidElement`.
- The tag name is not validated — pass `node('this is not a tag')` and you'll get garbage HTML. Use sensible names.

---

[Back](../index.md)
