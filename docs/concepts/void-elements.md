# Void elements

Some HTML elements have no content — they self-close in the markup. The HTML spec calls them *void elements*. In elmish, they're rendered without a closing tag, and their PHP function takes attributes only — no second call.

## The void set

`br`, `hr`, `img`, `input`, `wbr`, `col`, `source`, `track`.

These also exist as `Element\AbstractVoidElement` subclasses, all implementing the `VoidElement` marker interface.

## Calling shape

Non-void elements need two calls (attrs, then children):

```php
div(['id' => 'x'])(text('hi'));
//                ^^^^^^^^^^^^ children — required, even if empty
```

Void elements need **one** call:

```php
br(['class' => 'spacer']);
img(['src' => 'logo.png', 'alt' => 'logo']);
input(['type' => 'text', 'name' => 'q', 'required']);
```

If you accidentally call a void element a second time, you'll get a `BadFunctionCallException` (the function returns the element directly, not a closure).

## Rendered output

```php
echo br();                                          // <br>
echo hr(['class' => 'sep']);                        // <hr class="sep">
echo img(['src' => 'logo.png', 'alt' => 'Logo']);   // <img src="logo.png" alt="Logo">
echo input(['type' => 'text', 'required']);         // <input type="text" required>
```

No trailing slash (`<br />`) — that's an XHTML quirk, not required by HTML5.

## Why no second call?

Void elements have no children — there's nothing to put in the second call. Elm's `Html` module makes void tags take an empty list (`br [] []`) for type uniformity; this library favours PHP ergonomics and drops it.

## Common gotcha

When mixing void and non-void in a parent:

```php
div()(
    img(['src' => 'a.png']),     // ✓ called once — returns Img
    iframe(['src' => 'b.html'])(),// ✓ called twice — iframe is NOT void
);
```

Forgetting the empty `()` on a non-void element passes the closure itself as a child and produces a `TypeError`.

---

[Back](../index.md)
