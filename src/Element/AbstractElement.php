<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML\Element;

use Gin0115\ElmishPHP\HTML\Renderable;

abstract class AbstractElement implements Element
{
    /**
     * @param array<int|string, string|null> $attributes
     * @param array<Renderable|string>       $children
     */
    public function __construct(
        protected string $tag,
        protected array $attributes = [],
        protected array $children = [],
    ) {
    }

    public function __toString(): string
    {
        return \sprintf(
            '<%s%s>%s</%s>',
            $this->tag,
            self::renderAttributes($this->attributes),
            self::renderChildren($this->children),
            $this->tag,
        );
    }

    /**
     * @param array<int|string, string|null> $attributes
     */
    public static function renderAttributes(array $attributes): string
    {
        $out = '';
        foreach ($attributes as $key => $value) {
            if (\is_int($key)) {
                $out .= \sprintf(' %s', $value);
                continue;
            }
            if ($value === null || $value === '') {
                $out .= \sprintf(' %s', $key);
                continue;
            }
            $out .= \sprintf(
                ' %s="%s"',
                $key,
                \htmlspecialchars($value, \ENT_QUOTES, 'UTF-8'),
            );
        }
        return $out;
    }

    /**
     * @param array<Renderable|string> $children
     */
    public static function renderChildren(array $children): string
    {
        $out = '';
        foreach ($children as $child) {
            $out .= $child instanceof Renderable
                ? (string) $child
                : \htmlspecialchars((string) $child, \ENT_QUOTES, 'UTF-8');
        }
        return $out;
    }
}
