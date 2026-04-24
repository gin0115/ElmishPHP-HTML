# Media elements

Embedded media elements. All implement `MediaElement`. 8 tags.

[Back to index](../index.md)

---

## `img()`

Image.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Img`
- **Implements** &nbsp; `MediaElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
img(['src' => 'logo.png', 'alt' => 'Logo']);
```

```html
<img src="logo.png" alt="Logo">
```

---

## `iframe()`

Inline frame for embedded content.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Iframe`
- **Implements** &nbsp; `MediaElement`
- **Void** &nbsp; no

```php
iframe(['src' => 'about:blank', 'title' => 'frame'])();
```

```html
<iframe src="about:blank" title="frame"></iframe>
```

---

## `video()`

Video player.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Video`
- **Implements** &nbsp; `MediaElement`
- **Void** &nbsp; no

```php
video(['controls'])();
```

```html
<video controls></video>
```

---

## `audio()`

Audio player.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Audio`
- **Implements** &nbsp; `MediaElement`
- **Void** &nbsp; no

```php
audio(['controls'])();
```

```html
<audio controls></audio>
```

---

## `canvas()`

Scriptable graphics surface.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Canvas`
- **Implements** &nbsp; `MediaElement`
- **Void** &nbsp; no

```php
canvas()();
```

```html
<canvas></canvas>
```

---

## `picture()`

Responsive image container.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Picture`
- **Implements** &nbsp; `MediaElement`
- **Void** &nbsp; no

```php
picture()();
```

```html
<picture></picture>
```

---

## `source()`

Media source for picture/video/audio.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Source`
- **Implements** &nbsp; `MediaElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
source(['src' => 'a.mp3', 'type' => 'audio/mpeg']);
```

```html
<source src="a.mp3" type="audio/mpeg">
```

---

## `track()`

Text track for video/audio.

- **Class** &nbsp; `Gin0115\ElmishPHP\HTML\Element\Track`
- **Implements** &nbsp; `MediaElement`, `VoidElement`
- **Void** &nbsp; yes — no second call

```php
track(['src' => 'subs.vtt', 'kind' => 'subtitles']);
```

```html
<track src="subs.vtt" kind="subtitles">
```

---

