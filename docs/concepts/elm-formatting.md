# Elm-style formatting

Long element trees can become hard to read in the default PHP idiom. The `elm-format` style — leading commas, extra parens spacing, indentation that follows the tree depth — translates almost directly to PHP and makes complex structures legible.

## The default

PHP's natural idiom looks like this:

```php
div(['id' => 'wrap', 'class' => 'card'])(
    p()(
        text('Hello, '),
        span(['class' => 'name'])(text('world')),
    ),
);
```

Fine for small trees. Gets visually crowded as the tree grows.

## Elm-style

Spacing between tag and parens, leading commas, opening parens on the next line:

```php
div ([ 'id' => 'wrap', 'class' => 'card' ])
    ( p ()
        ( text('Hello, ')
        , span ([ 'class' => 'name' ])(text('world'))
        )
    );
```

The indentation now mirrors the tree depth. New children are added with a leading `,` at the matching column — the tree's branches are visible at a glance.

## Why leading commas

In trailing-comma style:

```php
( child1,
  child2,
  child3,
);
```

Adding `child4` means you also touch the `child3` line (to add a comma). Diffs are noisier, last-line edits are common.

In leading-comma style:

```php
( child1
, child2
, child3
);
```

Adding `child4` is one new line, no other line changes. Cleaner diffs.

## When to use it

- Long trees with multiple branches per node.
- Anywhere you want the structure visually obvious.

For two-or-three-element trees, the default idiom is usually fine.

## PHP doesn't enforce it

The library is style-agnostic — write attributes and children however you like. The Elm format is a convention, not a requirement.

---

[Back](../index.md)
