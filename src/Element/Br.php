<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Element;

final class Br extends AbstractVoidElement implements InlineElement
{
    /**
     * @param array<int|string, string|null> $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct('br', $attributes);
    }
}
