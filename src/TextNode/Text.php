<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\TextNode;

final class Text implements TextNode
{
    public function __construct(private string $text)
    {
    }

    public function __toString(): string
    {
        return \htmlspecialchars($this->text, \ENT_QUOTES, 'UTF-8');
    }
}
