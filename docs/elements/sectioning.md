# Sectioning elements

Page-structure elements. All implement `SectioningElement` (which extends `BlockElement`). 7 tags.

[Back to index](../index.md)

---

## `header()`

Sectioning header.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Header`
- **Implements** &nbsp; `SectioningElement`
- **Void** &nbsp; no

```php
header()(text('site header'));
```

```html
<header>site header</header>
```

---

## `footer()`

Sectioning footer.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Footer`
- **Implements** &nbsp; `SectioningElement`
- **Void** &nbsp; no

```php
footer()(text('site footer'));
```

```html
<footer>site footer</footer>
```

---

## `main()`

Main content area.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Main`
- **Implements** &nbsp; `SectioningElement`
- **Void** &nbsp; no

```php
main()(text('main content'));
```

```html
<main>main content</main>
```

---

## `nav()`

Navigation links.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Nav`
- **Implements** &nbsp; `SectioningElement`
- **Void** &nbsp; no

```php
nav()(text('nav links'));
```

```html
<nav>nav links</nav>
```

---

## `section()`

Generic section.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Section`
- **Implements** &nbsp; `SectioningElement`
- **Void** &nbsp; no

```php
section()(text('section content'));
```

```html
<section>section content</section>
```

---

## `article()`

Self-contained composition.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Article`
- **Implements** &nbsp; `SectioningElement`
- **Void** &nbsp; no

```php
article()(text('article body'));
```

```html
<article>article body</article>
```

---

## `aside()`

Tangential content.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Aside`
- **Implements** &nbsp; `SectioningElement`
- **Void** &nbsp; no

```php
aside()(text('aside content'));
```

```html
<aside>aside content</aside>
```

---

