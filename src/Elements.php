<?php

declare(strict_types=1);

namespace Gin0115\ElmishPHP\HTML;

use Gin0115\ElmishPHP\HTML\Element\A;
use Gin0115\ElmishPHP\HTML\Element\Abbr;
use Gin0115\ElmishPHP\HTML\Element\Article;
use Gin0115\ElmishPHP\HTML\Element\Aside;
use Gin0115\ElmishPHP\HTML\Element\Audio;
use Gin0115\ElmishPHP\HTML\Element\B;
use Gin0115\ElmishPHP\HTML\Element\Blockquote;
use Gin0115\ElmishPHP\HTML\Element\Br;
use Gin0115\ElmishPHP\HTML\Element\Button;
use Gin0115\ElmishPHP\HTML\Element\Canvas;
use Gin0115\ElmishPHP\HTML\Element\Caption;
use Gin0115\ElmishPHP\HTML\Element\Cite;
use Gin0115\ElmishPHP\HTML\Element\Code;
use Gin0115\ElmishPHP\HTML\Element\Col;
use Gin0115\ElmishPHP\HTML\Element\Colgroup;
use Gin0115\ElmishPHP\HTML\Element\CustomElement;
use Gin0115\ElmishPHP\HTML\Element\Dd;
use Gin0115\ElmishPHP\HTML\Element\Details;
use Gin0115\ElmishPHP\HTML\Element\Dialog;
use Gin0115\ElmishPHP\HTML\Element\Div;
use Gin0115\ElmishPHP\HTML\Element\Dl;
use Gin0115\ElmishPHP\HTML\Element\Dt;
use Gin0115\ElmishPHP\HTML\Element\Em;
use Gin0115\ElmishPHP\HTML\Element\Fieldset;
use Gin0115\ElmishPHP\HTML\Element\Figcaption;
use Gin0115\ElmishPHP\HTML\Element\Figure;
use Gin0115\ElmishPHP\HTML\Element\Footer;
use Gin0115\ElmishPHP\HTML\Element\Form;
use Gin0115\ElmishPHP\HTML\Element\H1;
use Gin0115\ElmishPHP\HTML\Element\H2;
use Gin0115\ElmishPHP\HTML\Element\H3;
use Gin0115\ElmishPHP\HTML\Element\H4;
use Gin0115\ElmishPHP\HTML\Element\H5;
use Gin0115\ElmishPHP\HTML\Element\H6;
use Gin0115\ElmishPHP\HTML\Element\Header;
use Gin0115\ElmishPHP\HTML\Element\Hr;
use Gin0115\ElmishPHP\HTML\Element\I;
use Gin0115\ElmishPHP\HTML\Element\Iframe;
use Gin0115\ElmishPHP\HTML\Element\Img;
use Gin0115\ElmishPHP\HTML\Element\Input;
use Gin0115\ElmishPHP\HTML\Element\Kbd;
use Gin0115\ElmishPHP\HTML\Element\Label;
use Gin0115\ElmishPHP\HTML\Element\Legend;
use Gin0115\ElmishPHP\HTML\Element\Li;
use Gin0115\ElmishPHP\HTML\Element\Main;
use Gin0115\ElmishPHP\HTML\Element\Mark;
use Gin0115\ElmishPHP\HTML\Element\Nav;
use Gin0115\ElmishPHP\HTML\Element\Ol;
use Gin0115\ElmishPHP\HTML\Element\Optgroup;
use Gin0115\ElmishPHP\HTML\Element\Option;
use Gin0115\ElmishPHP\HTML\Element\P;
use Gin0115\ElmishPHP\HTML\Element\Picture;
use Gin0115\ElmishPHP\HTML\Element\Pre;
use Gin0115\ElmishPHP\HTML\Element\Q;
use Gin0115\ElmishPHP\HTML\Element\Samp;
use Gin0115\ElmishPHP\HTML\Element\Section;
use Gin0115\ElmishPHP\HTML\Element\Select;
use Gin0115\ElmishPHP\HTML\Element\Small;
use Gin0115\ElmishPHP\HTML\Element\Source;
use Gin0115\ElmishPHP\HTML\Element\Span;
use Gin0115\ElmishPHP\HTML\Element\Strong;
use Gin0115\ElmishPHP\HTML\Element\Sub;
use Gin0115\ElmishPHP\HTML\Element\Summary;
use Gin0115\ElmishPHP\HTML\Element\Sup;
use Gin0115\ElmishPHP\HTML\Element\Table;
use Gin0115\ElmishPHP\HTML\Element\Tbody;
use Gin0115\ElmishPHP\HTML\Element\Td;
use Gin0115\ElmishPHP\HTML\Element\Textarea;
use Gin0115\ElmishPHP\HTML\Element\Tfoot;
use Gin0115\ElmishPHP\HTML\Element\Th;
use Gin0115\ElmishPHP\HTML\Element\Thead;
use Gin0115\ElmishPHP\HTML\Element\Time;
use Gin0115\ElmishPHP\HTML\Element\Tr;
use Gin0115\ElmishPHP\HTML\Element\Track;
use Gin0115\ElmishPHP\HTML\Element\U;
use Gin0115\ElmishPHP\HTML\Element\Ul;
use Gin0115\ElmishPHP\HTML\Element\Video;
use Gin0115\ElmishPHP\HTML\Element\Wbr;
use Gin0115\ElmishPHP\HTML\TextNode\Raw;
use Gin0115\ElmishPHP\HTML\TextNode\Text;

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Div
 */
function div(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Div => new Div($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Span
 */
function span(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Span => new Span($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function br(array $attributes = []): Br
{
    return new Br($attributes);
}

function text(string $text): Text
{
    return new Text($text);
}

function raw(string $html): Raw
{
    return new Raw($html);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): CustomElement
 */
function node(string $tag, array $attributes = []): callable
{
    return fn(Renderable|string ...$children): CustomElement
        => new CustomElement($tag, $attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): P
 */
function p(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): P => new P($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): H1
 */
function h1(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): H1 => new H1($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): H2
 */
function h2(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): H2 => new H2($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): H3
 */
function h3(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): H3 => new H3($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): H4
 */
function h4(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): H4 => new H4($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): H5
 */
function h5(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): H5 => new H5($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): H6
 */
function h6(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): H6 => new H6($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Pre
 */
function pre(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Pre => new Pre($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Blockquote
 */
function blockquote(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Blockquote => new Blockquote($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Ul
 */
function ul(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Ul => new Ul($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Ol
 */
function ol(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Ol => new Ol($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Li
 */
function li(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Li => new Li($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Dl
 */
function dl(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Dl => new Dl($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Dt
 */
function dt(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Dt => new Dt($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Dd
 */
function dd(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Dd => new Dd($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Figure
 */
function figure(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Figure => new Figure($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Figcaption
 */
function figcaption(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Figcaption => new Figcaption($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function hr(array $attributes = []): Hr
{
    return new Hr($attributes);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): A
 */
function a(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): A => new A($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Strong
 */
function strong(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Strong => new Strong($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Em
 */
function em(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Em => new Em($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Small
 */
function small(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Small => new Small($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): B
 */
function b(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): B => new B($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): I
 */
function i(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): I => new I($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): U
 */
function u(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): U => new U($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Mark
 */
function mark(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Mark => new Mark($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Code
 */
function code(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Code => new Code($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Kbd
 */
function kbd(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Kbd => new Kbd($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Samp
 */
function samp(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Samp => new Samp($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Sub
 */
function sub(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Sub => new Sub($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Sup
 */
function sup(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Sup => new Sup($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Time
 */
function time(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Time => new Time($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Abbr
 */
function abbr(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Abbr => new Abbr($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Cite
 */
function cite(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Cite => new Cite($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Q
 */
function q(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Q => new Q($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function wbr(array $attributes = []): Wbr
{
    return new Wbr($attributes);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Header
 */
function header(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Header => new Header($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Footer
 */
function footer(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Footer => new Footer($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Main
 */
function main(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Main => new Main($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Nav
 */
function nav(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Nav => new Nav($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Section
 */
function section(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Section => new Section($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Article
 */
function article(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Article => new Article($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Aside
 */
function aside(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Aside => new Aside($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Form
 */
function form(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Form => new Form($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Fieldset
 */
function fieldset(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Fieldset => new Fieldset($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Legend
 */
function legend(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Legend => new Legend($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Label
 */
function label(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Label => new Label($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Button
 */
function button(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Button => new Button($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Select
 */
function select(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Select => new Select($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Optgroup
 */
function optgroup(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Optgroup => new Optgroup($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Option
 */
function option(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Option => new Option($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Textarea
 */
function textarea(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Textarea => new Textarea($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function input(array $attributes = []): Input
{
    return new Input($attributes);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Table
 */
function table(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Table => new Table($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Caption
 */
function caption(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Caption => new Caption($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Colgroup
 */
function colgroup(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Colgroup => new Colgroup($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Thead
 */
function thead(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Thead => new Thead($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Tbody
 */
function tbody(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Tbody => new Tbody($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Tfoot
 */
function tfoot(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Tfoot => new Tfoot($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Tr
 */
function tr(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Tr => new Tr($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Td
 */
function td(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Td => new Td($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Th
 */
function th(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Th => new Th($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function col(array $attributes = []): Col
{
    return new Col($attributes);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function img(array $attributes = []): Img
{
    return new Img($attributes);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Iframe
 */
function iframe(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Iframe => new Iframe($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Video
 */
function video(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Video => new Video($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Audio
 */
function audio(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Audio => new Audio($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Canvas
 */
function canvas(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Canvas => new Canvas($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Picture
 */
function picture(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Picture => new Picture($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function source(array $attributes = []): Source
{
    return new Source($attributes);
}

/**
 * @param array<int|string, string|null> $attributes
 */
function track(array $attributes = []): Track
{
    return new Track($attributes);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Details
 */
function details(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Details => new Details($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Summary
 */
function summary(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Summary => new Summary($attributes, $children);
}

/**
 * @param array<int|string, string|null> $attributes
 * @return callable(Renderable|string ...$children): Dialog
 */
function dialog(array $attributes = []): callable
{
    return fn(Renderable|string ...$children): Dialog => new Dialog($attributes, $children);
}
