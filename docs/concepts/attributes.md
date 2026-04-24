# Attributes

Attributes are passed to a tag function as an associative array. There are **three** forms, and they can be mixed freely in the same array.

## 1. Named (the common case)

```php
div(['id' => 'foo', 'class' => 'card'])(text('hi'));
// <div id="foo" class="card">hi</div>
```

The value is HTML-escaped before being written into the attribute. So this is safe:

```php
div(['title' => 'a "quote" & <b>'])(text('hi'));
// <div title="a &quot;quote&quot; &amp; &lt;b&gt;">hi</div>
```

## 2. Null value → bare flag

If the value is `null`, the attribute renders as a bare flag (no `=value`):

```php
div(['data-flag' => null])(text('hi'));
// <div data-flag>hi</div>
```

This is useful for mapping booleans:

```php
$disabled = $user->isLocked();
button(['type' => 'submit', 'disabled' => $disabled ? null : false])(text('Save'));
```

(Set the value to anything other than `null` or `''` to render `attr="value"`; set it to `null`/`''` to render bare; only render the key at all when you want it present — usually with a conditional.)

## 3. Positional entry → bare flag

If the entry has no key (a positional array entry), the value becomes the attribute *name* and is rendered bare:

```php
input(['type' => 'text', 'required']);
// <input type="text" required>
```

This is the most concise form for boolean attributes you always want present.

## Mixing

You can mix all three in a single array — order is preserved in the output.

```php
div([
    'id'        => 'wrap',     // named
    'data-flag' => null,       // null-flag
    'data-x',                  // positional-flag
    'class'     => 'card',     // named again
])(text('hi'));
// <div id="wrap" data-flag data-x class="card">hi</div>
```

## Empty values

Both `null` and `''` (empty string) render as bare flags. They're treated the same way. If you want to render a literal `attr=""`, that's currently not expressible in the named form — use a non-empty value, or open an issue.

## Escaping rules

| Part | Escaped? |
|---|---|
| Attribute *key* | No — under your control, never user-supplied |
| Attribute *value* | Yes — `htmlspecialchars` with `ENT_QUOTES` and UTF-8 |

Never put untrusted data into the *key*. The library doesn't try to validate or sanitise keys.

## Attributes on void elements

Same rules apply — the only difference is that void elements don't take a second call:

```php
img(['src' => 'logo.png', 'alt' => 'Logo']);
br(['class' => 'spacer']);
```

See [Void elements](void-elements.md).

---

[Back](../index.md)
