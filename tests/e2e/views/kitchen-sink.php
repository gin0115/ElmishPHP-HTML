<?php

declare(strict_types=1);

use function Gin0115\ElmishPHP\HTML\a;
use function Gin0115\ElmishPHP\HTML\abbr;
use function Gin0115\ElmishPHP\HTML\article;
use function Gin0115\ElmishPHP\HTML\aside;
use function Gin0115\ElmishPHP\HTML\b;
use function Gin0115\ElmishPHP\HTML\blockquote;
use function Gin0115\ElmishPHP\HTML\br;
use function Gin0115\ElmishPHP\HTML\button;
use function Gin0115\ElmishPHP\HTML\caption;
use function Gin0115\ElmishPHP\HTML\code;
use function Gin0115\ElmishPHP\HTML\details;
use function Gin0115\ElmishPHP\HTML\dialog;
use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\em;
use function Gin0115\ElmishPHP\HTML\fieldset;
use function Gin0115\ElmishPHP\HTML\figcaption;
use function Gin0115\ElmishPHP\HTML\figure;
use function Gin0115\ElmishPHP\HTML\footer;
use function Gin0115\ElmishPHP\HTML\form;
use function Gin0115\ElmishPHP\HTML\h1;
use function Gin0115\ElmishPHP\HTML\h2;
use function Gin0115\ElmishPHP\HTML\h3;
use function Gin0115\ElmishPHP\HTML\header;
use function Gin0115\ElmishPHP\HTML\hr;
use function Gin0115\ElmishPHP\HTML\iframe;
use function Gin0115\ElmishPHP\HTML\img;
use function Gin0115\ElmishPHP\HTML\input;
use function Gin0115\ElmishPHP\HTML\label;
use function Gin0115\ElmishPHP\HTML\legend;
use function Gin0115\ElmishPHP\HTML\li;
use function Gin0115\ElmishPHP\HTML\main;
use function Gin0115\ElmishPHP\HTML\mark;
use function Gin0115\ElmishPHP\HTML\nav;
use function Gin0115\ElmishPHP\HTML\node;
use function Gin0115\ElmishPHP\HTML\option;
use function Gin0115\ElmishPHP\HTML\p;
use function Gin0115\ElmishPHP\HTML\pre;
use function Gin0115\ElmishPHP\HTML\raw;
use function Gin0115\ElmishPHP\HTML\section;
use function Gin0115\ElmishPHP\HTML\select;
use function Gin0115\ElmishPHP\HTML\small;
use function Gin0115\ElmishPHP\HTML\span;
use function Gin0115\ElmishPHP\HTML\strong;
use function Gin0115\ElmishPHP\HTML\summary;
use function Gin0115\ElmishPHP\HTML\table;
use function Gin0115\ElmishPHP\HTML\tbody;
use function Gin0115\ElmishPHP\HTML\td;
use function Gin0115\ElmishPHP\HTML\text;
use function Gin0115\ElmishPHP\HTML\textarea;
use function Gin0115\ElmishPHP\HTML\th;
use function Gin0115\ElmishPHP\HTML\thead;
use function Gin0115\ElmishPHP\HTML\time;
use function Gin0115\ElmishPHP\HTML\tr;
use function Gin0115\ElmishPHP\HTML\ul;
use function Gin0115\ElmishPHP\HTML\video;

$demo = static function (string $title, string $php, callable $produce): void {
    $rendered = (string) $produce();
    $escaped  = htmlspecialchars($rendered, ENT_QUOTES, 'UTF-8');
    $code     = htmlspecialchars($php, ENT_QUOTES, 'UTF-8');

    echo "<section class=\"demo\">\n";
    echo "  <h2>{$title}</h2>\n";
    echo "  <div class=\"demo__source\"><h3>PHP</h3><pre><code>{$code}</code></pre></div>\n";
    echo "  <div class=\"demo__cols\">\n";
    echo "    <div class=\"demo__col\"><h3>HTML</h3><pre><code>{$escaped}</code></pre></div>\n";
    echo "    <div class=\"demo__col\"><h3>Rendered</h3><div class=\"demo__rendered\">{$rendered}</div></div>\n";
    echo "  </div>\n";
    echo "</section>\n";
};

?>
<style>
    body { font-family: system-ui, -apple-system, sans-serif; max-width: 1400px; margin: 0 auto; padding: 1rem; color: #222; }
    h1 { margin: 0 0 1rem; }
    section.demo { margin-bottom: 1.5rem; padding: 1rem; border: 1px solid #ddd; border-radius: 6px; background: #fff; }
    section.demo > h2 { margin: 0 0 0.75rem; font-size: 1.05rem; }
    .demo__source { margin-bottom: 1rem; }
    .demo__cols { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem; }
    .demo__source h3, .demo__col h3 { margin: 0 0 0.4rem; font-size: 0.7rem; letter-spacing: 0.05em; color: #777; text-transform: uppercase; }
    .demo__source pre, .demo__col pre { margin: 0; padding: 0.6rem 0.75rem; background: #f5f5f5; border-radius: 4px; font-size: 0.8rem; overflow-x: auto; }
    .demo__source pre code, .demo__col pre code { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }
    .demo__rendered { padding: 0.6rem 0.75rem; background: #fafafa; border: 1px dashed #ccc; border-radius: 4px; }
</style>

<h1>Elmish HTML — Kitchen Sink</h1>

<?php

$demo(
    '1. plain element, no attributes',
    "div()(text('plain div'))",
    static fn() => div()(text('plain div')),
);

$demo(
    '2. standard attributes (id, class, data-*)',
    <<<'PHP'
    div([
        'id'        => 'with-attrs',
        'class'     => 'foo bar',
        'data-test' => 'attr-value',
    ])(text('div with id, class, data-attr'))
    PHP,
    static fn() => div([
        'id'        => 'with-attrs',
        'class'     => 'foo bar',
        'data-test' => 'attr-value',
    ])(text('div with id, class, data-attr')),
);

$demo(
    '3. positional entry → bare flag attribute',
    "div(['id' => 'bare-flag', 'data-special'])(text('positional entry → bare flag'))",
    static fn() => div(['id' => 'bare-flag', 'data-special'])(text('positional entry → bare flag')),
);

$demo(
    '4. null value → bare flag attribute',
    "div(['id' => 'null-attr', 'data-bool' => null])(text('null value → bare flag'))",
    static fn() => div(['id' => 'null-attr', 'data-bool' => null])(text('null value → bare flag')),
);

$demo(
    '5. attribute value escaping',
    <<<'PHP'
    div([
        'id'    => 'escape-attr',
        'title' => 'a "quote" & <b>',
    ])(text('hover for title — should NOT break the markup'))
    PHP,
    static fn() => div([
        'id'    => 'escape-attr',
        'title' => 'a "quote" & <b>',
    ])(text('hover for title — should NOT break the markup')),
);

$demo(
    '6. bare-string child auto-escapes',
    <<<'PHP'
    div(['id' => 'escape-string-child'])(
        '<script>document.body.dataset.xssed = "bare-string"</script>',
    )
    PHP,
    static fn() => div(['id' => 'escape-string-child'])(
        '<script>document.body.dataset.xssed = "bare-string"</script>',
    ),
);

$demo(
    '7. text() escapes html',
    "div(['id' => 'escape-text-fn'])(text('<em>literal text, not html</em>'))",
    static fn() => div(['id' => 'escape-text-fn'])(text('<em>literal text, not html</em>')),
);

$demo(
    '8. raw() bypasses escaping',
    "div(['id' => 'raw-html'])(raw('<em>actually italic</em>'))",
    static fn() => div(['id' => 'raw-html'])(raw('<em>actually italic</em>')),
);

$demo(
    '9. nested elements',
    <<<'PHP'
    div(['id' => 'nested'])(
        span(['class' => 'inner'])(text('hello'), text(' '), text('world')),
    )
    PHP,
    static fn() => div(['id' => 'nested'])(
        span(['class' => 'inner'])(text('hello'), text(' '), text('world')),
    ),
);

$demo(
    '10. void element (br)',
    <<<'PHP'
    div(['id' => 'void-element'])(
        text('line one'),
        br(),
        text('line two'),
    )
    PHP,
    static fn() => div(['id' => 'void-element'])(
        text('line one'),
        br(),
        text('line two'),
    ),
);

$demo(
    '11. node() — arbitrary custom tag',
    <<<'PHP'
    div(['id' => 'custom-tag'])(
        node('article', ['data-custom' => 'yes'])(
            node('h3')(text('article heading via node()')),
            text('content'),
        ),
    )
    PHP,
    static fn() => div(['id' => 'custom-tag'])(
        node('article', ['data-custom' => 'yes'])(
            node('h3')(text('article heading via node()')),
            text('content'),
        ),
    ),
);

$demo(
    '12. mixed child types',
    <<<'PHP'
    div(['id' => 'mixed-children'])(
        text('text(), '),
        span()(text('span')),
        text(', '),
        raw('<i>raw()</i>'),
        text(', '),
        'plain string (auto-escaped)',
    )
    PHP,
    static fn() => div(['id' => 'mixed-children'])(
        text('text(), '),
        span()(text('span')),
        text(', '),
        raw('<i>raw()</i>'),
        text(', '),
        'plain string (auto-escaped)',
    ),
);

$demo(
    '13. block elements — headings, paragraph, blockquote, hr, pre, code',
    <<<'PHP'
    div(['id' => 'block-elements'])(
        h1()(text('Heading 1')),
        h2()(text('Heading 2')),
        h3()(text('Heading 3')),
        p()(text('A paragraph with '), strong()(text('strong')), text(' and '), em()(text('emphasis.'))),
        blockquote()(p()(text('A block quote.'))),
        hr(),
        pre()(code()(text('print("hello world")'))),
    )
    PHP,
    static fn() => div(['id' => 'block-elements'])(
        h1()(text('Heading 1')),
        h2()(text('Heading 2')),
        h3()(text('Heading 3')),
        p()(text('A paragraph with '), strong()(text('strong')), text(' and '), em()(text('emphasis.'))),
        blockquote()(p()(text('A block quote.'))),
        hr(),
        pre()(code()(text('print("hello world")'))),
    ),
);

$demo(
    '14. lists — ul, ol, li, figure, figcaption',
    <<<'PHP'
    div(['id' => 'lists'])(
        ul()(
            li()(text('apples')),
            li()(text('oranges')),
            li()(text('pears')),
        ),
        figure()(
            img(['src' => 'https://placehold.co/200x80', 'alt' => 'placeholder']),
            figcaption()(text('a figure caption')),
        ),
    )
    PHP,
    static fn() => div(['id' => 'lists'])(
        ul()(
            li()(text('apples')),
            li()(text('oranges')),
            li()(text('pears')),
        ),
        figure()(
            img(['src' => 'https://placehold.co/200x80', 'alt' => 'placeholder']),
            figcaption()(text('a figure caption')),
        ),
    ),
);

$demo(
    '15. inline elements — strong, em, small, b, mark, abbr, time, code',
    <<<'PHP'
    p(['id' => 'inline-elements'])(
        text('Some '),
        strong()(text('strong')),
        text(', '),
        em()(text('emphasised')),
        text(', '),
        small()(text('small')),
        text(', '),
        b()(text('bold')),
        text(', '),
        mark()(text('highlighted')),
        text(', '),
        abbr(['title' => 'Hyper Text Markup Language'])(text('HTML')),
        text(', '),
        time(['datetime' => '2026-04-24'])(text('today')),
        text(', and '),
        code()(text('inline code')),
        text('.'),
    )
    PHP,
    static fn() => p(['id' => 'inline-elements'])(
        text('Some '),
        strong()(text('strong')),
        text(', '),
        em()(text('emphasised')),
        text(', '),
        small()(text('small')),
        text(', '),
        b()(text('bold')),
        text(', '),
        mark()(text('highlighted')),
        text(', '),
        abbr(['title' => 'Hyper Text Markup Language'])(text('HTML')),
        text(', '),
        time(['datetime' => '2026-04-24'])(text('today')),
        text(', and '),
        code()(text('inline code')),
        text('.'),
    ),
);

$demo(
    '16. sectioning — header, nav, main, article, aside, footer',
    <<<'PHP'
    article(['id' => 'sectioning'])(
        header()(h2()(text('Article title'))),
        nav()(
            a(['href' => '#section-1'])(text('Section 1')),
            text(' | '),
            a(['href' => '#section-2'])(text('Section 2')),
        ),
        main()(
            section(['id' => 'section-1'])(p()(text('Section 1 content.'))),
            section(['id' => 'section-2'])(p()(text('Section 2 content.'))),
        ),
        aside()(p()(small()(text('Aside content.')))),
        footer()(small()(text('© 2026'))),
    )
    PHP,
    static fn() => article(['id' => 'sectioning'])(
        header()(h2()(text('Article title'))),
        nav()(
            a(['href' => '#section-1'])(text('Section 1')),
            text(' | '),
            a(['href' => '#section-2'])(text('Section 2')),
        ),
        main()(
            section(['id' => 'section-1'])(p()(text('Section 1 content.'))),
            section(['id' => 'section-2'])(p()(text('Section 2 content.'))),
        ),
        aside()(p()(small()(text('Aside content.')))),
        footer()(small()(text('© 2026'))),
    ),
);

$demo(
    '17. forms — form, fieldset, legend, label, input, button, select, option, textarea',
    <<<'PHP'
    form(['id' => 'kitchen-form', 'method' => 'post', 'action' => '#'])(
        fieldset()(
            legend()(text('Sign up')),
            div()(
                label(['for' => 'name'])(text('Name')),
                input(['id' => 'name', 'name' => 'name', 'type' => 'text', 'required']),
            ),
            div()(
                label(['for' => 'role'])(text('Role')),
                select(['id' => 'role', 'name' => 'role'])(
                    option(['value' => 'dev'])(text('Developer')),
                    option(['value' => 'des'])(text('Designer')),
                ),
            ),
            div()(
                label(['for' => 'bio'])(text('Bio')),
                textarea(['id' => 'bio', 'name' => 'bio', 'rows' => '3'])(text('Tell us about yourself.')),
            ),
            button(['type' => 'submit'])(text('Submit')),
        ),
    )
    PHP,
    static fn() => form(['id' => 'kitchen-form', 'method' => 'post', 'action' => '#'])(
        fieldset()(
            legend()(text('Sign up')),
            div()(
                label(['for' => 'name'])(text('Name')),
                input(['id' => 'name', 'name' => 'name', 'type' => 'text', 'required']),
            ),
            div()(
                label(['for' => 'role'])(text('Role')),
                select(['id' => 'role', 'name' => 'role'])(
                    option(['value' => 'dev'])(text('Developer')),
                    option(['value' => 'des'])(text('Designer')),
                ),
            ),
            div()(
                label(['for' => 'bio'])(text('Bio')),
                textarea(['id' => 'bio', 'name' => 'bio', 'rows' => '3'])(text('Tell us about yourself.')),
            ),
            button(['type' => 'submit'])(text('Submit')),
        ),
    ),
);

$demo(
    '18. tables — table, caption, thead, tbody, tr, th, td',
    <<<'PHP'
    table(['id' => 'kitchen-table'])(
        caption()(text('Browser market share')),
        thead()(tr()(
            th()(text('Browser')),
            th()(text('Share')),
        )),
        tbody()(
            tr()(td()(text('Chrome')),  td()(text('64%'))),
            tr()(td()(text('Safari')),  td()(text('19%'))),
            tr()(td()(text('Firefox')), td()(text(' 3%'))),
        ),
    )
    PHP,
    static fn() => table(['id' => 'kitchen-table'])(
        caption()(text('Browser market share')),
        thead()(tr()(
            th()(text('Browser')),
            th()(text('Share')),
        )),
        tbody()(
            tr()(td()(text('Chrome')),  td()(text('64%'))),
            tr()(td()(text('Safari')),  td()(text('19%'))),
            tr()(td()(text('Firefox')), td()(text(' 3%'))),
        ),
    ),
);

$demo(
    '19. media — img, iframe, video',
    <<<'PHP'
    div(['id' => 'media'])(
        img(['src' => 'https://placehold.co/120x80', 'alt' => 'placeholder', 'width' => '120', 'height' => '80']),
        iframe(['src' => 'about:blank', 'width' => '120', 'height' => '80', 'title' => 'sample iframe'])(),
        video(['controls', 'width' => '160'])(),
    )
    PHP,
    static fn() => div(['id' => 'media'])(
        img(['src' => 'https://placehold.co/120x80', 'alt' => 'placeholder', 'width' => '120', 'height' => '80']),
        iframe(['src' => 'about:blank', 'width' => '120', 'height' => '80', 'title' => 'sample iframe'])(),
        video(['controls', 'width' => '160'])(),
    ),
);

$demo(
    '20. interactive — details, summary, dialog',
    <<<'PHP'
    div(['id' => 'interactive'])(
        details()(
            summary()(text('Click to expand')),
            p()(text('Hidden content revealed.')),
        ),
        dialog(['open'])(p()(text('A non-modal dialog.'))),
    )
    PHP,
    static fn() => div(['id' => 'interactive'])(
        details()(
            summary()(text('Click to expand')),
            p()(text('Hidden content revealed.')),
        ),
        dialog(['open'])(p()(text('A non-modal dialog.'))),
    ),
);
