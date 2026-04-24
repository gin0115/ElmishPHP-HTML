<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Element;

use Gin0115\ElmishPHP\HTML\Renderable;

final class Wbr extends AbstractVoidElement implements InlineElement
{
    /**
     * @param array<int|string, string|null> $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct('wbr', $attributes);
    }
}
