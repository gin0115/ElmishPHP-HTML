# Type hierarchy

Everything renderable in the library shares a small interface tree. The shape exists for two reasons:

1. **Uniform stringification** — anything passed as a child of an element implements `__toString`, so the renderer can blindly cast to string.
2. **Categorisation** — marker interfaces let you write code that operates on classes of element (e.g. "a function that accepts any block-level element").

## The tree

```
Renderable extends \Stringable
├── Element                                                   marker — any HTML element
│   ├── BlockElement                                          div, p, h1-h6, ul, blockquote, ...
│   ├── InlineElement                                         span, a, strong, em, br, code, ...
│   ├── SectioningElement   extends BlockElement              header, footer, nav, main, ...
│   ├── FormElement                                           form, input, button, select, ...
│   ├── TableElement                                          table, tr, td, th, ...
│   ├── MediaElement                                          img, video, iframe, ...
│   ├── InteractiveElement                                    details, summary, dialog
│   └── VoidElement                                           marker on br, hr, img, input, ...
└── TextNode                                                  Text, Raw
```

All marker interfaces are empty. They exist purely for `instanceof` checks and type hints.

## `Renderable`

`Gin0115\ElmishPHP\HTML\Renderable` extends PHP's built-in `\Stringable`. That's the only requirement: a `__toString()` that returns valid HTML.

If you write your own renderable thing, implement `Renderable` and elmish will treat it like any other child:

```php
use Gin0115\ElmishPHP\HTML\Renderable;

final class MyWidget implements Renderable
{
    public function __toString(): string
    {
        return '<my-widget />';
    }
}

echo div()(new MyWidget());
// <div><my-widget /></div>
```

## `Element` and its categories

Every concrete tag class implements `Element` (via `AbstractElement` or `AbstractVoidElement`) **plus** at least one category marker.

```php
use Gin0115\ElmishPHP\HTML\Element\Div;
use Gin0115\ElmishPHP\HTML\Element\BlockElement;

$div = new Div();
$div instanceof BlockElement;   // true
$div instanceof Element;        // true
$div instanceof Renderable;     // true
```

Some elements implement multiple markers — `Br` is both `VoidElement` and `InlineElement`:

```php
use Gin0115\ElmishPHP\HTML\Element\Br;
use Gin0115\ElmishPHP\HTML\Element\InlineElement;
use Gin0115\ElmishPHP\HTML\Element\VoidElement;

$br = new Br();
$br instanceof InlineElement;   // true
$br instanceof VoidElement;     // true
```

## `VoidElement` marker

`VoidElement` is *not* a category like the others — it's an orthogonal marker for elements that render without a closing tag. Tags can be both void *and* a category (e.g. `Br` is `InlineElement + VoidElement`, `Img` is `MediaElement + VoidElement`).

If you write a function that should only accept void elements:

```php
function classifyVoidness(Element $el): string {
    return $el instanceof VoidElement ? 'self-closing' : 'paired';
}
```

## `TextNode`

`TextNode` is the marker for text-content nodes — `Text` (escaping) and `Raw` (passthrough). Both implement `Renderable`. There's no `Element` involvement; they're not HTML elements, just renderable strings.

## `AbstractElement` and `AbstractVoidElement`

The two base classes that do all the actual rendering work. Concrete tag classes extend one of them, set their tag name in the constructor, and add the right marker interfaces.

```php
final class Div extends AbstractElement implements BlockElement
{
    public function __construct(array $attrs = [], array $children = [])
    {
        parent::__construct('div', $attrs, $children);
    }
}
```

If you want to add your own element, follow this exact shape.

---

[Back](../index.md)
