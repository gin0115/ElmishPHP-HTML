# Form elements

Form controls and structure. All implement `FormElement`. 10 tags.

[Back to index](../index.md)

---

## `form()`

Form container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Form`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
form(['method' => 'post', 'action' => '/'])();
```

```html
<form method="post" action="/"></form>
```

---

## `fieldset()`

Group of related form controls.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Fieldset`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
fieldset()();
```

```html
<fieldset></fieldset>
```

---

## `legend()`

Caption for a fieldset.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Legend`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
legend()(text('Personal info'));
```

```html
<legend>Personal info</legend>
```

---

## `label()`

Caption for a form control.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Label`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
label(['for' => 'q'])(text('Search'));
```

```html
<label for="q">Search</label>
```

---

## `button()`

Clickable button.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Button`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
button(['type' => 'submit'])(text('Submit'));
```

```html
<button type="submit">Submit</button>
```

---

## `select()`

Dropdown control.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Select`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
select(['name' => 'role'])();
```

```html
<select name="role"></select>
```

---

## `optgroup()`

Group of options inside a select.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Optgroup`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
optgroup(['label' => 'Group'])();
```

```html
<optgroup label="Group"></optgroup>
```

---

## `option()`

Option in a select.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Option`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
option(['value' => 'x'])(text('Developer'));
```

```html
<option value="x">Developer</option>
```

---

## `textarea()`

Multi-line text input.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Textarea`
- **Implements** &nbsp; `FormElement`
- **Void** &nbsp; no

```php
textarea(['name' => 'bio'])(text('Tell us about yourself.'));
```

```html
<textarea name="bio">Tell us about yourself.</textarea>
```

---

## `input()`

Single-line input control.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Input`
- **Implements** &nbsp; `FormElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
input(['type' => 'text', 'name' => 'q']);
```

```html
<input type="text" name="q">
```

---

