<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Element;

abstract class AbstractVoidElement implements VoidElement
{
    /**
     * @param array<int|string, string|null> $attributes
     */
    public function __construct(
        protected string $tag,
        protected array $attributes = [],
    ) {
    }

    public function __toString(): string
    {
        return \sprintf(
            '<%s%s>',
            $this->tag,
            AbstractElement::renderAttributes($this->attributes),
        );
    }
}
