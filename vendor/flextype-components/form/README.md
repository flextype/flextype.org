# Form Component
![version](https://img.shields.io/badge/version-1.0.2-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/form/blob/master/LICENSE)

Form component allows you to easily create HTML forms.

### Installation

```
composer require flextype-components/form
```

### Usage

```php
use Flextype\Component\Form\Form;
```

Registers a custom macro.
```php
// Registering a Form macro
Form::macro('my_field', function() {
    return '<input type="text" name="my_field">';
});

// Calling a custom Form macro
echo Form::my_field();


// Registering a Form macro with parameters
Form::macro('my_field', function($value = '') {
    return '<input type="text" name="my_field" value="'.$value.'">';
});

// Calling a custom Form macro with parameters
echo Form::my_field('Flextype');
```

Create an opening HTML form tag.
```php
// Form will submit back to the current page using POST
echo Form::open();

// Form will submit to 'search' using GET
echo Form::open('search', array('method' => 'get'));

// When "file" inputs are present, you must include the "enctype"
echo Form::open(null, array('enctype' => 'multipart/form-data'));
```

Create a form input.
Text is default input type.
```php
echo Form::input('username', $username);
```

Create a hidden form input.
```php
echo Form::hidden('user_id', $user_id);
```

Creates a password form input.
```php
echo Form::password('password');
```

Creates a file upload form input.
```php
echo Form::file('image');
```

Creates a checkbox form input.
```php
echo Form::checkbox('i_am_not_a_robot');
```

Creates a radio form input.
```php
echo Form::radio('i_am_not_a_robot');
```

Creates a textarea form input.
```php
echo Form::textarea('text', $text);
```

Creates a select form input.
```php
echo Form::select('themes', array('default', 'classic', 'modern'));
```

Creates a submit form input.
```php
echo Form::submit('save', 'Save');
```

Creates a button form input.
```php
echo Form::button('save', 'Save Profile', array('type' => 'submit'));
```

Creates a form label.
```php
echo Form::label('username', 'Username');
```

Create closing form tag.
```php
echo Form::close();
```

## License
See [LICENSE](https://github.com/flextype-components/form/blob/master/LICENSE)
