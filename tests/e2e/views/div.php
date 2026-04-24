<?php

declare(strict_types=1);

use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\span;
use function Gin0115\ElmishPHP\HTML\text;

echo div(['id' => 'outer', 'class' => 'wrapper'])(
    span(['data-test' => 'inner'])(text('hello world')),
);
