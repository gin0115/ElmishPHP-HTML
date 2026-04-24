<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Tests;

use Gin0115\ElmishPHP\HTML\Element\BlockElement;
use Gin0115\ElmishPHP\HTML\Element\FormElement;
use Gin0115\ElmishPHP\HTML\Element\InlineElement;
use Gin0115\ElmishPHP\HTML\Element\InteractiveElement;
use Gin0115\ElmishPHP\HTML\Element\MediaElement;
use Gin0115\ElmishPHP\HTML\Element\SectioningElement;
use Gin0115\ElmishPHP\HTML\Element\TableElement;
use Gin0115\ElmishPHP\HTML\Element\VoidElement;
use Gin0115\ElmishPHP\HTML\TextNode\Text;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestAllTags extends TestCase
{
    /**
     * Each entry: [short class name, tag name, marker interface, isVoid].
     *
     * @return array<string, array{0: string, 1: string, 2: string, 3: bool}>
     */
    public static function tags(): array
    {
        return [
            // Block
            'div'        => ['Div',        'div',        BlockElement::class, false],
            'p'          => ['P',          'p',          BlockElement::class, false],
            'h1'         => ['H1',         'h1',         BlockElement::class, false],
            'h2'         => ['H2',         'h2',         BlockElement::class, false],
            'h3'         => ['H3',         'h3',         BlockElement::class, false],
            'h4'         => ['H4',         'h4',         BlockElement::class, false],
            'h5'         => ['H5',         'h5',         BlockElement::class, false],
            'h6'         => ['H6',         'h6',         BlockElement::class, false],
            'pre'        => ['Pre',        'pre',        BlockElement::class, false],
            'blockquote' => ['Blockquote', 'blockquote', BlockElement::class, false],
            'ul'         => ['Ul',         'ul',         BlockElement::class, false],
            'ol'         => ['Ol',         'ol',         BlockElement::class, false],
            'li'         => ['Li',         'li',         BlockElement::class, false],
            'dl'         => ['Dl',         'dl',         BlockElement::class, false],
            'dt'         => ['Dt',         'dt',         BlockElement::class, false],
            'dd'         => ['Dd',         'dd',         BlockElement::class, false],
            'figure'     => ['Figure',     'figure',     BlockElement::class, false],
            'figcaption' => ['Figcaption', 'figcaption', BlockElement::class, false],
            'hr'         => ['Hr',         'hr',         BlockElement::class, true],

            // Inline
            'span'   => ['Span',   'span',   InlineElement::class, false],
            'a'      => ['A',      'a',      InlineElement::class, false],
            'strong' => ['Strong', 'strong', InlineElement::class, false],
            'em'     => ['Em',     'em',     InlineElement::class, false],
            'small'  => ['Small',  'small',  InlineElement::class, false],
            'b'      => ['B',      'b',      InlineElement::class, false],
            'i'      => ['I',      'i',      InlineElement::class, false],
            'u'      => ['U',      'u',      InlineElement::class, false],
            'mark'   => ['Mark',   'mark',   InlineElement::class, false],
            'code'   => ['Code',   'code',   InlineElement::class, false],
            'kbd'    => ['Kbd',    'kbd',    InlineElement::class, false],
            'samp'   => ['Samp',   'samp',   InlineElement::class, false],
            'sub'    => ['Sub',    'sub',    InlineElement::class, false],
            'sup'    => ['Sup',    'sup',    InlineElement::class, false],
            'time'   => ['Time',   'time',   InlineElement::class, false],
            'abbr'   => ['Abbr',   'abbr',   InlineElement::class, false],
            'cite'   => ['Cite',   'cite',   InlineElement::class, false],
            'q'      => ['Q',      'q',      InlineElement::class, false],
            'br'     => ['Br',     'br',     InlineElement::class, true],
            'wbr'    => ['Wbr',    'wbr',    InlineElement::class, true],

            // Sectioning
            'header'  => ['Header',  'header',  SectioningElement::class, false],
            'footer'  => ['Footer',  'footer',  SectioningElement::class, false],
            'main'    => ['Main',    'main',    SectioningElement::class, false],
            'nav'     => ['Nav',     'nav',     SectioningElement::class, false],
            'section' => ['Section', 'section', SectioningElement::class, false],
            'article' => ['Article', 'article', SectioningElement::class, false],
            'aside'   => ['Aside',   'aside',   SectioningElement::class, false],

            // Form
            'form'     => ['Form',     'form',     FormElement::class, false],
            'fieldset' => ['Fieldset', 'fieldset', FormElement::class, false],
            'legend'   => ['Legend',   'legend',   FormElement::class, false],
            'label'    => ['Label',    'label',    FormElement::class, false],
            'button'   => ['Button',   'button',   FormElement::class, false],
            'select'   => ['Select',   'select',   FormElement::class, false],
            'optgroup' => ['Optgroup', 'optgroup', FormElement::class, false],
            'option'   => ['Option',   'option',   FormElement::class, false],
            'textarea' => ['Textarea', 'textarea', FormElement::class, false],
            'input'    => ['Input',    'input',    FormElement::class, true],

            // Table
            'table'    => ['Table',    'table',    TableElement::class, false],
            'caption'  => ['Caption',  'caption',  TableElement::class, false],
            'colgroup' => ['Colgroup', 'colgroup', TableElement::class, false],
            'thead'    => ['Thead',    'thead',    TableElement::class, false],
            'tbody'    => ['Tbody',    'tbody',    TableElement::class, false],
            'tfoot'    => ['Tfoot',    'tfoot',    TableElement::class, false],
            'tr'       => ['Tr',       'tr',       TableElement::class, false],
            'td'       => ['Td',       'td',       TableElement::class, false],
            'th'       => ['Th',       'th',       TableElement::class, false],
            'col'      => ['Col',      'col',      TableElement::class, true],

            // Media
            'img'     => ['Img',     'img',     MediaElement::class, true],
            'iframe'  => ['Iframe',  'iframe',  MediaElement::class, false],
            'video'   => ['Video',   'video',   MediaElement::class, false],
            'audio'   => ['Audio',   'audio',   MediaElement::class, false],
            'canvas'  => ['Canvas',  'canvas',  MediaElement::class, false],
            'picture' => ['Picture', 'picture', MediaElement::class, false],
            'source'  => ['Source',  'source',  MediaElement::class, true],
            'track'   => ['Track',   'track',   MediaElement::class, true],

            // Interactive
            'details' => ['Details', 'details', InteractiveElement::class, false],
            'summary' => ['Summary', 'summary', InteractiveElement::class, false],
            'dialog'  => ['Dialog',  'dialog',  InteractiveElement::class, false],
        ];
    }

    /**
     * Invoke the functional facade for a tag, returning the rendered instance.
     * Void tags: `tag(attrs)`. Non-void: `tag(attrs)(...children)`.
     *
     * @param array<int|string, string|null> $attrs
     * @param array<\Gin0115\ElmishPHP\HTML\Renderable|string> $children
     */
    private function invoke(string $tag, bool $isVoid, array $attrs = [], array $children = []): object
    {
        $fn = "Gin0115\\ElmishPHP\\HTML\\{$tag}";
        return $isVoid ? $fn($attrs) : $fn($attrs)(...$children);
    }

    #[DataProvider('tags')]
    public function testEmptyRender(string $shortClass, string $tag, string $marker, bool $isVoid): void
    {
        $fqcn = "Gin0115\\ElmishPHP\\HTML\\Element\\{$shortClass}";
        $instance = $this->invoke($tag, $isVoid);

        $this->assertInstanceOf($fqcn, $instance);
        $expected = $isVoid ? "<{$tag}>" : "<{$tag}></{$tag}>";
        $this->assertSame($expected, (string) $instance);
    }

    #[DataProvider('tags')]
    public function testImplementsMarkerInterface(string $shortClass, string $tag, string $marker, bool $isVoid): void
    {
        $instance = $this->invoke($tag, $isVoid);

        $this->assertInstanceOf($marker, $instance);
        if ($isVoid) {
            $this->assertInstanceOf(VoidElement::class, $instance);
        }
    }

    #[DataProvider('tags')]
    public function testRenderWithAttributes(string $shortClass, string $tag, string $marker, bool $isVoid): void
    {
        $instance = $this->invoke($tag, $isVoid, ['id' => 'x', 'class' => 'y']);

        $expected = $isVoid
            ? "<{$tag} id=\"x\" class=\"y\">"
            : "<{$tag} id=\"x\" class=\"y\"></{$tag}>";
        $this->assertSame($expected, (string) $instance);
    }

    /**
     * @return array<string, array{0: string, 1: string, 2: string, 3: bool}>
     */
    public static function nonVoidTags(): array
    {
        return array_filter(self::tags(), static fn(array $row): bool => $row[3] === false);
    }

    #[DataProvider('nonVoidTags')]
    public function testRenderWithChildren(string $shortClass, string $tag, string $marker, bool $isVoid): void
    {
        $instance = $this->invoke($tag, false, [], [new Text('hi')]);

        $this->assertSame("<{$tag}>hi</{$tag}>", (string) $instance);
    }
}
