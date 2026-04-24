<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Tests;

use Gin0115\ElmishPHP\HTML as HTML;
use Gin0115\ElmishPHP\HTML\Element\BlockElement;
use Gin0115\ElmishPHP\HTML\Element\CustomElement;
use Gin0115\ElmishPHP\HTML\Element\Div;
use Gin0115\ElmishPHP\HTML\Element\InlineElement;
use Gin0115\ElmishPHP\HTML\Element\VoidElement;
use Gin0115\ElmishPHP\HTML\TextNode\Raw;
use Gin0115\ElmishPHP\HTML\TextNode\Text;
use Gin0115\ElmishPHP\HTML\TextNode\TextNode;
use PHPUnit\Framework\TestCase;

class TestElements extends TestCase
{
    use HtmlAssertions;

    public function testCanCreateClosingElementViaCustomElement(): void
    {
        $element = new CustomElement('foo', ['class' => 'really'], [new Raw('VALUE')]);
        $this->assertEquals('<foo class="really">VALUE</foo>', (string) $element);
    }

    public function testNodeFunctionCreatesCustomElement(): void
    {
        $element = HTML\node('my-tag', ['data-x' => 'y'])(HTML\text('content'));
        $this->assertInstanceOf(CustomElement::class, $element);
        $this->assertEquals('<my-tag data-x="y">content</my-tag>', (string) $element);
    }

    public function testVoidElementRendersWithoutClosingTag(): void
    {
        $br = HTML\br(['class' => 'really']);
        $this->assertEquals('<br class="really">', (string) $br);
    }

    public function testCanCreateDiv(): void
    {
        $div = HTML\div([
            'id'        => 'divId',
            'class'     => 'divClass',
            'data-div'  => 'dataDiv',
            'tagDiv',
            'tagDiv2'   => null,
        ])(HTML\text('Contents'));

        $this->assertIsElement('div', $div);
        $this->assertElementHasClass('divClass', $div);
    }

    public function testTextEscapesHtmlSpecialCharacters(): void
    {
        $text = HTML\text('<script>alert("xss")</script>');
        $this->assertEquals('&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;', (string) $text);
    }

    public function testRawDoesNotEscape(): void
    {
        $raw = HTML\raw('<b>bold</b>');
        $this->assertEquals('<b>bold</b>', (string) $raw);
    }

    public function testAttributeValuesAreEscaped(): void
    {
        $div = HTML\div(['title' => 'a "quote" & <b>'])();
        $this->assertEquals('<div title="a &quot;quote&quot; &amp; &lt;b&gt;"></div>', (string) $div);
    }

    public function testStringChildrenAreEscaped(): void
    {
        $div = HTML\div()('<script>alert(1)</script>');
        $this->assertEquals('<div>&lt;script&gt;alert(1)&lt;/script&gt;</div>', (string) $div);
    }

    public function testNestedElementsRender(): void
    {
        $html = HTML\div(['id' => 'outer'])(
            HTML\span(['class' => 'inner'])(HTML\text('hello')),
        );
        $this->assertEquals(
            '<div id="outer"><span class="inner">hello</span></div>',
            (string) $html,
        );
    }

    public function testMarkerInterfacesAreImplemented(): void
    {
        $this->assertInstanceOf(BlockElement::class, HTML\div()());
        $this->assertInstanceOf(InlineElement::class, HTML\span()());
        $this->assertInstanceOf(VoidElement::class, HTML\br());
        $this->assertInstanceOf(InlineElement::class, HTML\br());
        $this->assertInstanceOf(TextNode::class, HTML\text('x'));
        $this->assertInstanceOf(TextNode::class, HTML\raw('x'));
    }
}
