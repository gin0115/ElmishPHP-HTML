<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Element;

use Gin0115\ElmishPHP\HTML\Renderable;

final class Optgroup extends AbstractElement implements FormElement
{
    /**
     * @param array<int|string, string|null> $attributes
     * @param array<Renderable|string>       $children
     */
    public function __construct(array $attributes = [], array $children = [])
    {
        parent::__construct('optgroup', $attributes, $children);
    }
}
