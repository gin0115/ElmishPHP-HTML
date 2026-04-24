<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Tests;

use Gin0115\ElmishPHP\HTML\Element\Br;
use Gin0115\ElmishPHP\HTML\Element\Div;
use Gin0115\ElmishPHP\HTML\Element\Img;
use Gin0115\ElmishPHP\HTML\Element\Input;
use PHPUnit\Framework\TestCase;

class TestAttributes extends TestCase
{
    public function testEmptyAttributesProduceNoAttrString(): void
    {
        $this->assertSame('<div></div>', (string) new Div());
        $this->assertSame('<br>', (string) new Br());
    }

    public function testStringValueRendersAsKeyEqualsValue(): void
    {
        $this->assertSame(
            '<div id="x"></div>',
            (string) new Div(['id' => 'x']),
        );
    }

    public function testPositionalEntryRendersAsBareFlag(): void
    {
        $this->assertSame(
            '<div data-flag></div>',
            (string) new Div(['data-flag']),
        );
    }

    public function testNullValueRendersAsBareFlag(): void
    {
        $this->assertSame(
            '<div data-flag></div>',
            (string) new Div(['data-flag' => null]),
        );
    }

    public function testEmptyStringValueRendersAsBareFlag(): void
    {
        $this->assertSame(
            '<div data-flag></div>',
            (string) new Div(['data-flag' => '']),
        );
    }

    public function testMultipleAttributesRenderInOrder(): void
    {
        $this->assertSame(
            '<div id="x" class="y" data-z="z"></div>',
            (string) new Div(['id' => 'x', 'class' => 'y', 'data-z' => 'z']),
        );
    }

    public function testMixedPositionalAndNamedAttributesRender(): void
    {
        $this->assertSame(
            '<div id="x" data-flag class="y"></div>',
            (string) new Div(['id' => 'x', 'data-flag', 'class' => 'y']),
        );
    }

    public function testAttributeValueIsHtmlEscaped(): void
    {
        $this->assertSame(
            '<div title="a &quot;b&quot; &amp; &lt;c&gt;"></div>',
            (string) new Div(['title' => 'a "b" & <c>']),
        );
    }

    public function testAttributeKeyIsNotEscaped(): void
    {
        $this->assertSame(
            '<div data-camelCase="x"></div>',
            (string) new Div(['data-camelCase' => 'x']),
        );
    }

    public function testNumericStringValueRenders(): void
    {
        $this->assertSame(
            '<div data-count="42"></div>',
            (string) new Div(['data-count' => '42']),
        );
    }

    public function testAttributesOnVoidElementRender(): void
    {
        $this->assertSame(
            '<br id="x" class="y">',
            (string) new Br(['id' => 'x', 'class' => 'y']),
        );

        $this->assertSame(
            '<img src="logo.png" alt="logo">',
            (string) new Img(['src' => 'logo.png', 'alt' => 'logo']),
        );
    }

    public function testBareFlagOnVoidElementRenders(): void
    {
        $this->assertSame(
            '<input type="text" required>',
            (string) new Input(['type' => 'text', 'required']),
        );
    }

    public function testApostropheInAttributeValueIsEscaped(): void
    {
        $this->assertSame(
            '<div title="it&#039;s here"></div>',
            (string) new Div(['title' => "it's here"]),
        );
    }

    public function testAmpersandInAttributeValueIsEscaped(): void
    {
        $this->assertSame(
            '<a href="?a=1&amp;b=2"></a>',
            (string) new \Gin0115\ElmishPHP\HTML\Element\A(['href' => '?a=1&b=2']),
        );
    }
}
