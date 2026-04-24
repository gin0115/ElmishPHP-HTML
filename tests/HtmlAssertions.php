<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Tests;

use Stringable;
use Symfony\Component\DomCrawler\Crawler;

trait HtmlAssertions
{
    public function assertIsElement(string $element, string|Stringable $html, ?string $message = null): void
    {
        $crawler = new Crawler((string) $html);
        $body = $crawler->filter('body');
        if (0 === $body->count()) {
            $this->fail('Failed to create HTML');
        }

        $node = $body->children()->getNode(0);
        if ($node === null) {
            $this->fail('No element found');
        }

        $message === null
            ? $this->assertEquals(\strtolower($element), \strtolower($node->nodeName))
            : $this->assertEquals(\strtolower($element), \strtolower($node->nodeName), $message);
    }

    public function assertElementHasClass(string $class, string|Stringable $html, ?string $message = null): void
    {
        $crawler = new Crawler((string) $html);
        $body = $crawler->filter('body');
        if (0 === $body->count()) {
            $this->fail('Failed to create HTML');
        }

        $node = $body->children()->getNode(0);
        if ($node === null || $node->attributes === null) {
            $this->fail('No element found');
        }

        $classAttr = $node->attributes->getNamedItem('class');
        if ($classAttr === null) {
            $this->fail("Element doesn't contain a class attribute");
        }

        $message === null
            ? $this->assertStringContainsString($class, $classAttr->textContent)
            : $this->assertStringContainsString($class, $classAttr->textContent, $message);
    }
}
