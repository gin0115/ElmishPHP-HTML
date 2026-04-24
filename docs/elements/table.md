# Table elements

Tabular data elements. All implement `TableElement`. 10 tags.

[Back to index](../index.md)

---

## `table()`

Tabular data container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Table`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
table()();
```

```html
<table></table>
```

---

## `caption()`

Caption for a table.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Caption`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
caption()(text('Sales by quarter'));
```

```html
<caption>Sales by quarter</caption>
```

---

## `colgroup()`

Group of columns in a table.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Colgroup`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
colgroup()();
```

```html
<colgroup></colgroup>
```

---

## `thead()`

Table header row group.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Thead`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
thead()();
```

```html
<thead></thead>
```

---

## `tbody()`

Table body row group.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Tbody`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
tbody()();
```

```html
<tbody></tbody>
```

---

## `tfoot()`

Table footer row group.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Tfoot`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
tfoot()();
```

```html
<tfoot></tfoot>
```

---

## `tr()`

Table row.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Tr`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
tr()();
```

```html
<tr></tr>
```

---

## `td()`

Table cell.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Td`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
td()(text('Cell'));
```

```html
<td>Cell</td>
```

---

## `th()`

Table header cell.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Th`
- **Implements** &nbsp; `TableElement`
- **Void** &nbsp; no

```php
th()(text('Header'));
```

```html
<th>Header</th>
```

---

## `col()`

Single column in a colgroup.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Col`
- **Implements** &nbsp; `TableElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
col(['span' => '2']);
```

```html
<col span="2">
```

---

