<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use function Gin0115\ElmishPHP\HTML\text;

$categories = [
    'block' => [
        'title'   => 'Block elements',
        'intro'   => 'Block-level content elements. All implement `BlockElement`.',
        'tags'    => [
            'div'        => ['Div',        ['BlockElement']],
            'p'          => ['P',          ['BlockElement']],
            'h1'         => ['H1',         ['BlockElement']],
            'h2'         => ['H2',         ['BlockElement']],
            'h3'         => ['H3',         ['BlockElement']],
            'h4'         => ['H4',         ['BlockElement']],
            'h5'         => ['H5',         ['BlockElement']],
            'h6'         => ['H6',         ['BlockElement']],
            'pre'        => ['Pre',        ['BlockElement']],
            'blockquote' => ['Blockquote', ['BlockElement']],
            'ul'         => ['Ul',         ['BlockElement']],
            'ol'         => ['Ol',         ['BlockElement']],
            'li'         => ['Li',         ['BlockElement']],
            'dl'         => ['Dl',         ['BlockElement']],
            'dt'         => ['Dt',         ['BlockElement']],
            'dd'         => ['Dd',         ['BlockElement']],
            'figure'     => ['Figure',     ['BlockElement']],
            'figcaption' => ['Figcaption', ['BlockElement']],
            'hr'         => ['Hr',         ['BlockElement', 'VoidElement']],
        ],
    ],
    'inline' => [
        'title' => 'Inline elements',
        'intro' => 'Inline content elements. All implement `InlineElement`.',
        'tags'  => [
            'span'   => ['Span',   ['InlineElement']],
            'a'      => ['A',      ['InlineElement']],
            'strong' => ['Strong', ['InlineElement']],
            'em'     => ['Em',     ['InlineElement']],
            'small'  => ['Small',  ['InlineElement']],
            'b'      => ['B',      ['InlineElement']],
            'i'      => ['I',      ['InlineElement']],
            'u'      => ['U',      ['InlineElement']],
            'mark'   => ['Mark',   ['InlineElement']],
            'code'   => ['Code',   ['InlineElement']],
            'kbd'    => ['Kbd',    ['InlineElement']],
            'samp'   => ['Samp',   ['InlineElement']],
            'sub'    => ['Sub',    ['InlineElement']],
            'sup'    => ['Sup',    ['InlineElement']],
            'time'   => ['Time',   ['InlineElement']],
            'abbr'   => ['Abbr',   ['InlineElement']],
            'cite'   => ['Cite',   ['InlineElement']],
            'q'      => ['Q',      ['InlineElement']],
            'br'     => ['Br',     ['InlineElement', 'VoidElement']],
            'wbr'    => ['Wbr',    ['InlineElement', 'VoidElement']],
        ],
    ],
    'sectioning' => [
        'title' => 'Sectioning elements',
        'intro' => 'Page-structure elements. All implement `SectioningElement` (which extends `BlockElement`).',
        'tags'  => [
            'header'  => ['Header',  ['SectioningElement']],
            'footer'  => ['Footer',  ['SectioningElement']],
            'main'    => ['Main',    ['SectioningElement']],
            'nav'     => ['Nav',     ['SectioningElement']],
            'section' => ['Section', ['SectioningElement']],
            'article' => ['Article', ['SectioningElement']],
            'aside'   => ['Aside',   ['SectioningElement']],
        ],
    ],
    'form' => [
        'title' => 'Form elements',
        'intro' => 'Form controls and structure. All implement `FormElement`.',
        'tags'  => [
            'form'     => ['Form',     ['FormElement']],
            'fieldset' => ['Fieldset', ['FormElement']],
            'legend'   => ['Legend',   ['FormElement']],
            'label'    => ['Label',    ['FormElement']],
            'button'   => ['Button',   ['FormElement']],
            'select'   => ['Select',   ['FormElement']],
            'optgroup' => ['Optgroup', ['FormElement']],
            'option'   => ['Option',   ['FormElement']],
            'textarea' => ['Textarea', ['FormElement']],
            'input'    => ['Input',    ['FormElement', 'VoidElement']],
        ],
    ],
    'table' => [
        'title' => 'Table elements',
        'intro' => 'Tabular data elements. All implement `TableElement`.',
        'tags'  => [
            'table'    => ['Table',    ['TableElement']],
            'caption'  => ['Caption',  ['TableElement']],
            'colgroup' => ['Colgroup', ['TableElement']],
            'thead'    => ['Thead',    ['TableElement']],
            'tbody'    => ['Tbody',    ['TableElement']],
            'tfoot'    => ['Tfoot',    ['TableElement']],
            'tr'       => ['Tr',       ['TableElement']],
            'td'       => ['Td',       ['TableElement']],
            'th'       => ['Th',       ['TableElement']],
            'col'      => ['Col',      ['TableElement', 'VoidElement']],
        ],
    ],
    'media' => [
        'title' => 'Media elements',
        'intro' => 'Embedded media elements. All implement `MediaElement`.',
        'tags'  => [
            'img'     => ['Img',     ['MediaElement', 'VoidElement']],
            'iframe'  => ['Iframe',  ['MediaElement']],
            'video'   => ['Video',   ['MediaElement']],
            'audio'   => ['Audio',   ['MediaElement']],
            'canvas'  => ['Canvas',  ['MediaElement']],
            'picture' => ['Picture', ['MediaElement']],
            'source'  => ['Source',  ['MediaElement', 'VoidElement']],
            'track'   => ['Track',   ['MediaElement', 'VoidElement']],
        ],
    ],
    'interactive' => [
        'title' => 'Interactive elements',
        'intro' => 'Interactive widgets. All implement `InteractiveElement`.',
        'tags'  => [
            'details' => ['Details', ['InteractiveElement']],
            'summary' => ['Summary', ['InteractiveElement']],
            'dialog'  => ['Dialog',  ['InteractiveElement']],
        ],
    ],
];

$exampleAttrs = [
    'a'        => ['href' => '/about'],
    'abbr'     => ['title' => 'World Wide Web'],
    'audio'    => ['controls'],
    'button'   => ['type' => 'submit'],
    'col'      => ['span' => '2'],
    'dialog'   => ['open'],
    'form'     => ['method' => 'post', 'action' => '/'],
    'iframe'   => ['src' => 'about:blank', 'title' => 'frame'],
    'img'      => ['src' => 'logo.png', 'alt' => 'Logo'],
    'input'    => ['type' => 'text', 'name' => 'q'],
    'label'    => ['for' => 'q'],
    'option'   => ['value' => 'x'],
    'optgroup' => ['label' => 'Group'],
    'select'   => ['name' => 'role'],
    'source'   => ['src' => 'a.mp3', 'type' => 'audio/mpeg'],
    'textarea' => ['name' => 'bio'],
    'time'     => ['datetime' => '2026-04-24'],
    'track'    => ['src' => 'subs.vtt', 'kind' => 'subtitles'],
    'video'    => ['controls'],
];

$exampleChildren = [
    'a'        => 'About',
    'abbr'     => 'WWW',
    'h1'       => 'Title',
    'h2'       => 'Title',
    'h3'       => 'Title',
    'h4'       => 'Title',
    'h5'       => 'Title',
    'h6'       => 'Title',
    'p'        => 'A paragraph.',
    'span'     => 'inline',
    'strong'   => 'important',
    'em'       => 'emphasis',
    'small'    => 'fine print',
    'b'        => 'bold',
    'i'        => 'italic',
    'u'        => 'underline',
    'mark'     => 'highlight',
    'code'     => 'echo $x;',
    'kbd'      => 'Ctrl+C',
    'samp'     => 'Hello, world.',
    'sub'      => '2',
    'sup'      => '2',
    'time'     => 'today',
    'cite'     => 'Book',
    'q'        => 'quoted',
    'pre'      => 'preformatted',
    'blockquote' => 'A pull quote.',
    'li'       => 'item',
    'dt'       => 'term',
    'dd'       => 'definition',
    'figcaption' => 'caption text',
    'caption'  => 'Sales by quarter',
    'th'       => 'Header',
    'td'       => 'Cell',
    'legend'   => 'Personal info',
    'label'    => 'Search',
    'button'   => 'Submit',
    'option'   => 'Developer',
    'textarea' => 'Tell us about yourself.',
    'summary'  => 'Click to expand',
    'header'   => 'site header',
    'footer'   => 'site footer',
    'aside'    => 'aside content',
    'main'     => 'main content',
    'nav'      => 'nav links',
    'section'  => 'section content',
    'article'  => 'article body',
];

$summary = [
    'div' => 'Generic block container.',
    'p' => 'Paragraph.',
    'h1' => 'Top-level section heading.',
    'h2' => 'Sub-section heading.',
    'h3' => 'Sub-sub-section heading.',
    'h4' => 'Heading, level 4.',
    'h5' => 'Heading, level 5.',
    'h6' => 'Heading, level 6.',
    'pre' => 'Preformatted text — preserves whitespace.',
    'blockquote' => 'Block-level quotation.',
    'ul' => 'Unordered list container.',
    'ol' => 'Ordered list container.',
    'li' => 'List item — child of ul/ol.',
    'dl' => 'Description list container.',
    'dt' => 'Description term — child of dl.',
    'dd' => 'Description detail — child of dl.',
    'figure' => 'Self-contained content with optional caption.',
    'figcaption' => 'Caption for a figure.',
    'hr' => 'Thematic break.',
    'span' => 'Generic inline container.',
    'a' => 'Hyperlink.',
    'strong' => 'Strong importance.',
    'em' => 'Stress emphasis.',
    'small' => 'Side comments / fine print.',
    'b' => 'Stylistically offset text (bring attention).',
    'i' => 'Alternate voice / mood / different quality.',
    'u' => 'Unarticulated annotation (often spelling).',
    'mark' => 'Marked / highlighted for reference.',
    'code' => 'Inline code fragment.',
    'kbd' => 'User keyboard input.',
    'samp' => 'Sample output from a system.',
    'sub' => 'Subscript.',
    'sup' => 'Superscript.',
    'time' => 'Machine-readable date / time.',
    'abbr' => 'Abbreviation, with optional `title` expansion.',
    'cite' => 'Title of a referenced work.',
    'q' => 'Inline quotation.',
    'br' => 'Line break.',
    'wbr' => 'Word break opportunity.',
    'header' => 'Sectioning header.',
    'footer' => 'Sectioning footer.',
    'main' => 'Main content area.',
    'nav' => 'Navigation links.',
    'section' => 'Generic section.',
    'article' => 'Self-contained composition.',
    'aside' => 'Tangential content.',
    'form' => 'Form container.',
    'fieldset' => 'Group of related form controls.',
    'legend' => 'Caption for a fieldset.',
    'label' => 'Caption for a form control.',
    'button' => 'Clickable button.',
    'select' => 'Dropdown control.',
    'optgroup' => 'Group of options inside a select.',
    'option' => 'Option in a select.',
    'textarea' => 'Multi-line text input.',
    'input' => 'Single-line input control.',
    'table' => 'Tabular data container.',
    'caption' => 'Caption for a table.',
    'colgroup' => 'Group of columns in a table.',
    'thead' => 'Table header row group.',
    'tbody' => 'Table body row group.',
    'tfoot' => 'Table footer row group.',
    'tr' => 'Table row.',
    'td' => 'Table cell.',
    'th' => 'Table header cell.',
    'col' => 'Single column in a colgroup.',
    'img' => 'Image.',
    'iframe' => 'Inline frame for embedded content.',
    'video' => 'Video player.',
    'audio' => 'Audio player.',
    'canvas' => 'Scriptable graphics surface.',
    'picture' => 'Responsive image container.',
    'source' => 'Media source for picture/video/audio.',
    'track' => 'Text track for video/audio.',
    'details' => 'Disclosure widget — collapsible content.',
    'summary' => 'Visible label for a details element.',
    'dialog' => 'Modal or non-modal dialog box.',
];

$voidSet = ['hr', 'br', 'wbr', 'col', 'img', 'input', 'source', 'track'];

$ns = 'Gin0115\\ElmishPHP\\HTML\\';

foreach ($categories as $slug => $cat) {
    $out = "# " . $cat['title'] . "\n\n";
    $out .= $cat['intro'] . " " . count($cat['tags']) . " tags.\n\n";
    $out .= "[Back to index](../index.md)\n\n";
    $out .= "---\n\n";

    foreach ($cat['tags'] as $tag => [$class, $markers]) {
        $isVoid = in_array($tag, $voidSet, true);
        $fqcn   = "{$ns}Element\\{$class}";
        $fn     = "{$ns}{$tag}";

        $attrs    = $exampleAttrs[$tag] ?? [];
        $childTxt = $exampleChildren[$tag] ?? null;
        $desc     = $summary[$tag] ?? '';

        $out .= "## `{$tag}()`\n\n";
        if ($desc !== '') {
            $out .= "{$desc}\n\n";
        }
        $out .= "- **Class** &nbsp; `{$fqcn}`\n";
        $out .= "- **Implements** &nbsp; " . implode(', ', array_map(static fn($m) => "`{$m}`", $markers)) . "\n";
        $out .= "- **Void** &nbsp; " . ($isVoid ? 'yes — no second call' : 'no') . "\n\n";

        // Build a representative example.
        $attrsLiteral = '';
        if ($attrs !== []) {
            $parts = [];
            foreach ($attrs as $k => $v) {
                if (is_int($k)) {
                    $parts[] = "'{$v}'";
                } else {
                    $parts[] = "'{$k}' => '{$v}'";
                }
            }
            $attrsLiteral = '[' . implode(', ', $parts) . ']';
        }

        if ($isVoid) {
            $callLiteral = "{$tag}({$attrsLiteral});";
            $instance    = $fn(...[$attrs]);
        } else {
            $childLiteral = $childTxt !== null ? "text('{$childTxt}')" : '';
            $callLiteral  = "{$tag}({$attrsLiteral})({$childLiteral});";
            $closure      = $fn($attrs);
            $instance     = $childTxt !== null
                ? $closure(text($childTxt))
                : $closure();
        }

        $rendered = (string) $instance;

        $out .= "```php\n{$callLiteral}\n```\n\n";
        $out .= "```html\n{$rendered}\n```\n\n";
        $out .= "---\n\n";
    }

    $path = __DIR__ . "/../docs/elements/{$slug}.md";
    file_put_contents($path, $out);
    echo "  wrote docs/elements/{$slug}.md\n";
}

echo "Done.\n";
