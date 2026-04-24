# Inline elements

Inline content elements. All implement `InlineElement`. 20 tags.

[Back to index](../index.md)

---

## `span()`

Generic inline container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Span`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
span()(text('inline'));
```

```html
<span>inline</span>
```

---

## `a()`

Hyperlink.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\A`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
a(['href' => '/about'])(text('About'));
```

```html
<a href="/about">About</a>
```

---

## `strong()`

Strong importance.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Strong`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
strong()(text('important'));
```

```html
<strong>important</strong>
```

---

## `em()`

Stress emphasis.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Em`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
em()(text('emphasis'));
```

```html
<em>emphasis</em>
```

---

## `small()`

Side comments / fine print.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Small`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
small()(text('fine print'));
```

```html
<small>fine print</small>
```

---

## `b()`

Stylistically offset text (bring attention).

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\B`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
b()(text('bold'));
```

```html
<b>bold</b>
```

---

## `i()`

Alternate voice / mood / different quality.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\I`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
i()(text('italic'));
```

```html
<i>italic</i>
```

---

## `u()`

Unarticulated annotation (often spelling).

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\U`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
u()(text('underline'));
```

```html
<u>underline</u>
```

---

## `mark()`

Marked / highlighted for reference.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Mark`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
mark()(text('highlight'));
```

```html
<mark>highlight</mark>
```

---

## `code()`

Inline code fragment.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Code`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
code()(text('echo $x;'));
```

```html
<code>echo $x;</code>
```

---

## `kbd()`

User keyboard input.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Kbd`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
kbd()(text('Ctrl+C'));
```

```html
<kbd>Ctrl+C</kbd>
```

---

## `samp()`

Sample output from a system.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Samp`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
samp()(text('Hello, world.'));
```

```html
<samp>Hello, world.</samp>
```

---

## `sub()`

Subscript.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Sub`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
sub()(text('2'));
```

```html
<sub>2</sub>
```

---

## `sup()`

Superscript.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Sup`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
sup()(text('2'));
```

```html
<sup>2</sup>
```

---

## `time()`

Machine-readable date / time.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Time`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
time(['datetime' => '2026-04-24'])(text('today'));
```

```html
<time datetime="2026-04-24">today</time>
```

---

## `abbr()`

Abbreviation, with optional `title` expansion.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Abbr`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
abbr(['title' => 'World Wide Web'])(text('WWW'));
```

```html
<abbr title="World Wide Web">WWW</abbr>
```

---

## `cite()`

Title of a referenced work.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Cite`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
cite()(text('Book'));
```

```html
<cite>Book</cite>
```

---

## `q()`

Inline quotation.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Q`
- **Implements** &nbsp; `InlineElement`
- **Void** &nbsp; no

```php
q()(text('quoted'));
```

```html
<q>quoted</q>
```

---

## `br()`

Line break.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Br`
- **Implements** &nbsp; `InlineElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
br();
```

```html
<br>
```

---

## `wbr()`

Word break opportunity.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Wbr`
- **Implements** &nbsp; `InlineElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
wbr();
```

```html
<wbr>
```

---

