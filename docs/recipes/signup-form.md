# Recipe — Signup form

A typical "sign up" form: text input, select dropdown, textarea, submit button. Wired up with labels and a submit handler.

```php
use function Gin0115\ElmishPHP\HTML\button;
use function Gin0115\ElmishPHP\HTML\div;
use function Gin0115\ElmishPHP\HTML\fieldset;
use function Gin0115\ElmishPHP\HTML\form;
use function Gin0115\ElmishPHP\HTML\input;
use function Gin0115\ElmishPHP\HTML\label;
use function Gin0115\ElmishPHP\HTML\legend;
use function Gin0115\ElmishPHP\HTML\option;
use function Gin0115\ElmishPHP\HTML\select;
use function Gin0115\ElmishPHP\HTML\text;
use function Gin0115\ElmishPHP\HTML\textarea;

echo form(['method' => 'post', 'action' => '/signup'])(
    fieldset()(
        legend()(text('Sign up')),

        div(['class' => 'field'])(
            label(['for' => 'name'])(text('Name')),
            input(['id' => 'name', 'name' => 'name', 'type' => 'text', 'required']),
        ),

        div(['class' => 'field'])(
            label(['for' => 'email'])(text('Email')),
            input(['id' => 'email', 'name' => 'email', 'type' => 'email', 'required']),
        ),

        div(['class' => 'field'])(
            label(['for' => 'role'])(text('Role')),
            select(['id' => 'role', 'name' => 'role'])(
                option(['value' => 'dev'])(text('Developer')),
                option(['value' => 'des'])(text('Designer')),
                option(['value' => 'pm'])(text('Product manager')),
            ),
        ),

        div(['class' => 'field'])(
            label(['for' => 'bio'])(text('Bio')),
            textarea(['id' => 'bio', 'name' => 'bio', 'rows' => '4'])(text('')),
        ),

        button(['type' => 'submit', 'class' => 'btn btn-primary'])(text('Create account')),
    ),
);
```

## Things to note

- **Label–input wiring**: every `label` carries a `for` attribute matching the input's `id`. This is essential for accessibility.
- **`required`** uses the positional bare-flag form. Equivalently: `'required' => null`.
- **`textarea`** is *not* a void element — it takes children (which become its initial value). Pass `text('')` if you want it empty.
- **`<input>` is void** — no second call.

## Extracting a helper

Repetitive `div.field > label + input` patterns deserve a helper:

```php
use Gin0115\ElmishPHP\HTML\Element\Div;

function field(string $id, string $labelText, array $inputAttrs): Div {
    return div(['class' => 'field'])(
        label(['for' => $id])(text($labelText)),
        input(array_merge(['id' => $id, 'name' => $id], $inputAttrs)),
    );
}

echo form(['method' => 'post', 'action' => '/signup'])(
    fieldset()(
        legend()(text('Sign up')),
        field('name',  'Name',  ['type' => 'text',  'required']),
        field('email', 'Email', ['type' => 'email', 'required']),
        button(['type' => 'submit'])(text('Create account')),
    ),
);
```

---

[Back](../index.md)
