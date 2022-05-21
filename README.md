# Elmish_PHP_ HTML Library

This a library for creating HTML with a functional style in PHP, heavily inspired by Elms HTML package.

## Why

Erm, next question........ok fine, why not. I really enjoyed ELMs approach to creating HTML and have played around with this idea before (Functional WP Plugin)

## Setup

This package can either be installed using composer or manually copied into your projects source code.

### Via Composer

Just add the library, just add the `gin0115/elmishphp/html` to your composer.json file or run
```shell
$ composer require gin0115/elmishphp/html
```
Its just a case of including your `vendor/autoload.php` and you're good to go.

### Copied into Project

If you are not using composer, you can still add this library to your project. To do this just copy this repo into your project and you can easily include it with 

```php
require_once '/path/to/lib/FunctionsLoader.php'
```

> You can remove all other files, except `/src/` and `FunctionsLoader.php`

## How it works

Most HTML elements carry similar patterns, attributes and children for example. 

```html
<div id="attribute" class="these are also attributes" THIS_TOO_AN_ATTRIBUTE>
    <p>Im a child<span data-attribute="yes">granchild</span></p>
</div>
```

This makes use of partial application and currying to allow HTML like this to be created using
```php
div(['id' => 'attribute', 'class' => "these are also attributes", 'THIS_TOO_AN_ATTRIBUTE'])(
    p()(
        'Im a child',
        span(["data-attribute"=>"yes"])
    )
);
```
