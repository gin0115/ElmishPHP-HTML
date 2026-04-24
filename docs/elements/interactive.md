# Interactive elements

Interactive widgets. All implement `InteractiveElement`. 3 tags.

[Back to index](../index.md)

---

## `details()`

Disclosure widget — collapsible content.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Details`
- **Implements** &nbsp; `InteractiveElement`
- **Void** &nbsp; no

```php
details()();
```

```html
<details></details>
```

---

## `summary()`

Visible label for a details element.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Summary`
- **Implements** &nbsp; `InteractiveElement`
- **Void** &nbsp; no

```php
summary()(text('Click to expand'));
```

```html
<summary>Click to expand</summary>
```

---

## `dialog()`

Modal or non-modal dialog box.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Dialog`
- **Implements** &nbsp; `InteractiveElement`
- **Void** &nbsp; no

```php
dialog(['open'])();
```

```html
<dialog open></dialog>
```

---

