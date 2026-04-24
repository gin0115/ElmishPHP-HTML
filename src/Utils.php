<?php

declare(strict_types=1);

/**
 * Utility functions
 *
 * ElmishPHP HTML is free software: you can redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software Foundation, either version 2
 * of the License, or (at your option) any later version.
 *
 * ElmishPHP HTML is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with ElmishPHP HTML.
 * If not, see <https://www.gnu.org/licenses/>.
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0-standalone.html
 * @package Gin0115\ElmishPHP_HTML
 */

namespace Gin0115\ElmishPHP\HTML;

use Closure;

/**
 * Creates a callable for wrapping a string with html/xml style tags.
 * By defaults uses opening as closing, if no closing defined.
 *
 * @param string $openingTag
 * @param string|null $closingTag
 * @return Closure(string):string
 * @see https://github.com/gin0115/pinkcrab_function_constructors
 */
function _tagWrap(string $openingTag, ?string $closingTag = null): Closure
{
    /**
     * @param string $string
     * @return string
     */
    return function (string $string) use ($openingTag, $closingTag): string {
        return \sprintf('<%s>%s</%s>', $openingTag, $string, $closingTag ?? $openingTag);
    };
}

/**
 * Creates a function for defining the callback and initial for reduce/fold, with the key
 * also passed to the callback.
 *
 * @param callable(mixed $carry, int|string $key, mixed $value): mixed $callable
 * @param mixed $initial
 * @return Closure(mixed[]):mixed
 * @see https://github.com/gin0115/pinkcrab_function_constructors
 */
function _foldKeys(callable $callable, $initial = []): Closure
{
    /**
     * @param mixed[] $array
     * @return mixed
     */
    return function (array $array) use ($callable, $initial) {
        foreach ($array as $key => $value) {
            $initial = $callable($initial, $key, $value);
        }
        return $initial;
    };
}
