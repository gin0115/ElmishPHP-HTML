# Recipe — Data table

A data table built from a PHP array, with a caption, header row, and one row per record.

```php
use function Gin0115\ElmishPHP\HTML\caption;
use function Gin0115\ElmishPHP\HTML\table;
use function Gin0115\ElmishPHP\HTML\tbody;
use function Gin0115\ElmishPHP\HTML\td;
use function Gin0115\ElmishPHP\HTML\text;
use function Gin0115\ElmishPHP\HTML\th;
use function Gin0115\ElmishPHP\HTML\thead;
use function Gin0115\ElmishPHP\HTML\tr;

$browsers = [
    ['name' => 'Chrome',  'share' => '64%'],
    ['name' => 'Safari',  'share' => '19%'],
    ['name' => 'Firefox', 'share' => ' 3%'],
];

echo table(['class' => 'browsers'])(
    caption()(text('Browser market share')),
    thead()(tr()(
        th()(text('Browser')),
        th()(text('Share')),
    )),
    tbody()(
        ...array_map(
            static fn(array $row) => tr()(
                td()(text($row['name'])),
                td()(text($row['share'])),
            ),
            $browsers,
        ),
    ),
);
```

## Things to note

- Tags are values — they compose with `array_map` and the splat operator just like any other PHP value.
- `text()` escapes the cell contents, so user-provided strings can't break out of cells.
- `tbody()` accepts variadic children — `...array_map(...)` spreads the rows in.

## Extracting a helper

```php
use Gin0115\ElmishPHP\HTML\Element\Table;
use Gin0115\ElmishPHP\HTML\Renderable;

/**
 * @param array<int, string>                $headers
 * @param array<int, array<int, Renderable|string>> $rows
 */
function dataTable(array $headers, array $rows, string $captionText = ''): Table {
    return table(['class' => 'data-table'])(
        $captionText !== '' ? caption()(text($captionText)) : raw(''),
        thead()(tr()(
            ...array_map(static fn(string $h) => th()(text($h)), $headers),
        )),
        tbody()(
            ...array_map(
                static fn(array $row) => tr()(
                    ...array_map(static fn($cell) => td()($cell), $row),
                ),
                $rows,
            ),
        ),
    );
}

echo dataTable(
    ['Browser', 'Share'],
    [
        [text('Chrome'),  text('64%')],
        [text('Safari'),  text('19%')],
        [text('Firefox'), text(' 3%')],
    ],
    'Browser market share',
);
```

---

[Back](../index.md)
