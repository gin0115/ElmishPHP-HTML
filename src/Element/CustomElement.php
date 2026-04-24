<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Element;

use Gin0115\ElmishPHP\HTML\Renderable;

final class CustomElement extends AbstractElement
{
    /**
     * @param array<int|string, string|null> $attributes
     * @param array<Renderable|string>       $children
     */
    public function __construct(string $tag, array $attributes = [], array $children = [])
    {
        parent::__construct($tag, $attributes, $children);
    }
}
