# Recipe — Article page

A complete article page with header, navigation, two sections, an aside, and a footer. Demonstrates sectioning elements composed together.

```php
use function Gin0115\ElmishPHP\HTML\a;
use function Gin0115\ElmishPHP\HTML\article;
use function Gin0115\ElmishPHP\HTML\aside;
use function Gin0115\ElmishPHP\HTML\footer;
use function Gin0115\ElmishPHP\HTML\h1;
use function Gin0115\ElmishPHP\HTML\h2;
use function Gin0115\ElmishPHP\HTML\header;
use function Gin0115\ElmishPHP\HTML\main;
use function Gin0115\ElmishPHP\HTML\nav;
use function Gin0115\ElmishPHP\HTML\p;
use function Gin0115\ElmishPHP\HTML\section;
use function Gin0115\ElmishPHP\HTML\small;
use function Gin0115\ElmishPHP\HTML\text;
use function Gin0115\ElmishPHP\HTML\time;

echo article(['class' => 'post'])(
    header()(
        h1()(text('How to build an HTML library')),
        p()(
            small()(text('Posted on ')),
            time(['datetime' => '2026-04-24'])(text('24 April 2026')),
        ),
    ),

    nav(['class' => 'toc'])(
        a(['href' => '#intro'])(text('Intro')),
        text(' · '),
        a(['href' => '#approach'])(text('Approach')),
    ),

    main()(
        section(['id' => 'intro'])(
            h2()(text('Intro')),
            p()(text('Why I started this project.')),
        ),
        section(['id' => 'approach'])(
            h2()(text('Approach')),
            p()(text('Each tag is a curried function returning a typed object.')),
        ),
    ),

    aside(['class' => 'related'])(
        p()(small()(text('Related posts here.'))),
    ),

    footer()(
        small()(text('© 2026 The Author')),
    ),
);
```

## Things to note

- `article` is the **outermost** wrapper — it's `SectioningElement`, which extends `BlockElement`.
- `header`, `nav`, `main`, `aside`, `footer` are all sectioning too — they all participate in the document outline.
- `time` carries a machine-readable `datetime` for parsers / SEO; the visible text is the human-readable form.
- `small` is inline-level for fine-print copyright + dates.

## Extracting a helper

For a multi-page site you'd factor the chrome out:

```php
use Gin0115\ElmishPHP\HTML\Element\Article;
use Gin0115\ElmishPHP\HTML\Renderable;

function postLayout(string $title, string $date, Renderable ...$body): Article {
    return article(['class' => 'post'])(
        header()(
            h1()(text($title)),
            p()(small()(text('Posted on ')), time(['datetime' => $date])(text($date))),
        ),
        main()(...$body),
        footer()(small()(text('© 2026 The Author'))),
    );
}

echo postLayout(
    'How to build an HTML library',
    '2026-04-24',
    section()(h2()(text('Intro')), p()(text('...'))),
    section()(h2()(text('Approach')), p()(text('...'))),
);
```

---

[Back](../index.md)
