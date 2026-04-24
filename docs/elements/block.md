# Block elements

Block-level content elements. All implement `BlockElement`. 19 tags.

[Back to index](../index.md)

---

## `div()`

Generic block container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Div`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
div()();
```

```html
<div></div>
```

---

## `p()`

Paragraph.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\P`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
p()(text('A paragraph.'));
```

```html
<p>A paragraph.</p>
```

---

## `h1()`

Top-level section heading.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\H1`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
h1()(text('Title'));
```

```html
<h1>Title</h1>
```

---

## `h2()`

Sub-section heading.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\H2`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
h2()(text('Title'));
```

```html
<h2>Title</h2>
```

---

## `h3()`

Sub-sub-section heading.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\H3`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
h3()(text('Title'));
```

```html
<h3>Title</h3>
```

---

## `h4()`

Heading, level 4.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\H4`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
h4()(text('Title'));
```

```html
<h4>Title</h4>
```

---

## `h5()`

Heading, level 5.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\H5`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
h5()(text('Title'));
```

```html
<h5>Title</h5>
```

---

## `h6()`

Heading, level 6.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\H6`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
h6()(text('Title'));
```

```html
<h6>Title</h6>
```

---

## `pre()`

Preformatted text — preserves whitespace.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Pre`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
pre()(text('preformatted'));
```

```html
<pre>preformatted</pre>
```

---

## `blockquote()`

Block-level quotation.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Blockquote`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
blockquote()(text('A pull quote.'));
```

```html
<blockquote>A pull quote.</blockquote>
```

---

## `ul()`

Unordered list container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Ul`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
ul()();
```

```html
<ul></ul>
```

---

## `ol()`

Ordered list container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Ol`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
ol()();
```

```html
<ol></ol>
```

---

## `li()`

List item — child of ul/ol.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Li`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
li()(text('item'));
```

```html
<li>item</li>
```

---

## `dl()`

Description list container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Dl`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
dl()();
```

```html
<dl></dl>
```

---

## `dt()`

Description term — child of dl.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Dt`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
dt()(text('term'));
```

```html
<dt>term</dt>
```

---

## `dd()`

Description detail — child of dl.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Dd`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
dd()(text('definition'));
```

```html
<dd>definition</dd>
```

---

## `figure()`

Self-contained content with optional caption.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Figure`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
figure()();
```

```html
<figure></figure>
```

---

## `figcaption()`

Caption for a figure.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Figcaption`
- **Implements** &nbsp; `BlockElement`
- **Void** &nbsp; no

```php
figcaption()(text('caption text'));
```

```html
<figcaption>caption text</figcaption>
```

---

## `hr()`

Thematic break.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Hr`
- **Implements** &nbsp; `BlockElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
hr();
```

```html
<hr>
```

---

