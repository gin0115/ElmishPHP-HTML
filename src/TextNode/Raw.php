<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\TextNode;

final class Raw implements TextNode
{
    public function __construct(private string $html)
    {
    }

    public function __toString(): string
    {
        return $this->html;
    }
}
