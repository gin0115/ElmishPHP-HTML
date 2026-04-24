<?php

declare(strict_types=1);

use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\text;

echo div(['id' => 'escape-test', 'title' => 'a "quote" & <b>'])(
    text('<script>document.body.dataset.xssed = "yes"</script>'),
);
