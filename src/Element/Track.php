<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Element;

use Gin0115\ElmishPHP\HTML\Renderable;

final class Track extends AbstractVoidElement implements MediaElement
{
    /**
     * @param array<int|string, string|null> $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct('track', $attributes);
    }
}
