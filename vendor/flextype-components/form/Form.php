<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\Form;

use Flextype\Component\Html\Html;

class Form
{
    /**
     * The registered custom macros.
     *
     * @var array
     */
    public static $macros = [];

    /**
     * Registers a custom macro.
     *
     *
     * // Registering a Form macro
     * Form::macro('my_field', function() {
     *     return '<input type="text" name="my_field">';
     * });
     *
     * // Calling a custom Form macro
     * echo Form::my_field();
     *
     *
     * // Registering a Form macro with parameters
     * Form::macro('my_field', function($value = '') {
     *     return '<input type="text" name="my_field" value="'.$value.'">';
     * });
     *
     * // Calling a custom Form macro with parameters
     * echo Form::my_field('Flextype');
     *
     * @param string  $name  Name
     * @param Closure $macro Macro
     * @return void
     */
    public static function macro(string $name, $macro) : void
    {
        Form::$macros[$name] = $macro;
    }

    /**
     * Create an opening HTML form tag.
     *
     * // Form will submit back to the current page using POST
     * echo Form::open();
     *
     * // Form will submit to 'search' using GET
     * echo Form::open('search', array('method' => 'get'));
     *
     * // When "file" inputs are present, you must include the "enctype"
     * echo Form::open(null, array('enctype' => 'multipart/form-data'));
     *
     * @param string $action     Form action, defaults to the current request URI.
     * @param array $attributes HTML attributes.
     * @return string
     */
    public static function open($action = '', array $attributes = null) : string
    {
        // Add the form action to the attributes
        $attributes['action'] = $action;

        if ( ! isset($attributes['method'])) {

            // Use POST method
            $attributes['method'] = 'post';
        }

        return '<form'.Html::attributes($attributes).'>';
    }

    /**
     * Create a form input.
     * Text is default input type.
     *
     * echo Form::input('username', $username);
     *
     * @param string $name       Input name
     * @param string $value      Input value
     * @param array  $attributes HTML attributes
     * @return string
     */
    public static function input(string $name, string $value = '', array $attributes = null) : string
    {
        // Set the input name
        $attributes['name'] = $name;

        // Set the input id
        $attributes['id'] = (isset($attributes['id'])) ? $attributes['id'] : $name;

        // Set the input value
        $attributes['value'] = $value;

        if ( ! isset($attributes['type'])) {

            // Default type is text
            $attributes['type'] = 'text';
        }

        return '<input'.Html::attributes($attributes).'>';
    }

    /**
     * Create a hidden form input.
     *
     * echo Form::hidden('user_id', $user_id);
     *
     * @param string $name       Input name
     * @param string $value      Input value
     * @param array  $attributes HTML attributes
     * @return string
     */
    public static function hidden(string $name, string $value = '', array $attributes = null) : string
    {
        // Set the input type
        $attributes['type'] = 'hidden';

        return Form::input($name, $value, $attributes);
    }

    /**
     * Creates a password form input.
     *
     * echo Form::password('password');
     *
     * @param string $name       Input name
     * @param string $value      Input value
     * @param array  $attributes HTML attributes
     * @return string
     */
    public static function password(string $name, string $value = '', array $attributes = null) : string
    {
        // Set the input type
        $attributes['type'] = 'password';

        return Form::input($name, $value, $attributes);
    }

    /**
     * Creates a file upload form input.
     *
     * echo Form::file('image');
     *
     * @param string $name       Input name
     * @param array  $attributes HTML attributes
     * @return string
     */
    public static function file(string $name, array $attributes = null) : string
    {
        // Set the input type
        $attributes['type'] = 'file';

        return Form::input($name, '', $attributes);
    }

    /**
     * Creates a checkbox form input.
     *
     * echo Form::checkbox('i_am_not_a_robot');
     *
     * @param string  $name       Input name
     * @param string  $input      Input value
     * @param boolean $checked    Checked status
     * @param array   $attributes HTML attributes
     * @uses   Form::input
     * @return string
     */
    public static function checkbox($name, $value = '', $checked = false, array $attributes = null)
    {
        // Set the input type
        $attributes['type'] = 'checkbox';

        if ($checked === true) {
            // Make the checkbox active
            $attributes['checked'] = 'checked';
        }

        return Form::input($name, $value, $attributes);
    }

    /**
     * Creates a radio form input.
     *
     * echo Form::radio('i_am_not_a_robot');
     *
     * @param string  $name       Input name
     * @param string  $value      Input value
     * @param boolean $checked    Checked status
     * @param array   $attributes HTML attributes
     * @uses   Form::input
     * @return string
     */
    public static function radio($name, $value = '', $checked = null, array $attributes = null)
    {
        // Set the input type
        $attributes['type'] = 'radio';

        if ($checked === true) {
            // Make the radio active
            $attributes['checked'] = 'checked';
        }

        return Form::input($name, $value, $attributes);
    }

    /**
     * Creates a textarea form input.
     *
     * echo Form::textarea('text', $text);
     *
     * @param string $name       Name
     * @param string $body       Body
     * @param array  $attributes HTML attributes
     * @uses   Html::attributes
     * @return string
     */
    public static function textarea($name, $body = '', array $attributes = null)
    {
        // Set the input name
        $attributes['name'] = $name;

        // Set the input id
        $attributes['id'] = (isset($attributes['id']))?$attributes['id']:$name;

        return '<textarea'.Html::attributes($attributes).'>'.$body.'</textarea>';
    }

    /**
     * Creates a select form input.
     *
     *  <code>
     *      echo Form::select('themes', array('default', 'classic', 'modern'));
     *  </code>
     *
     * @param string $name       Name
     * @param array  $options    Options array
     * @param string $selected   Selected option
     * @param array  $attributes HTML attributes
     * @uses   Html::attributes
     * @return string
     */
    public static function select($name, array $options = null, $selected = null, array $attributes = null)
    {
        // Set the input name
        $attributes['name'] = $name;

        // Set the input id
        $attributes['id'] = (isset($attributes['id']))?$attributes['id']:$name;

        $options_output = '';

        foreach ($options as $value => $name) {
            if ($selected == $value) $current = ' selected '; else $current = '';
            $options_output .= '<option value="'.$value.'" '.$current.'>'.$name.'</option>';
        }

        return '<select'.Html::attributes($attributes).'>'.$options_output.'</select>';
    }

    /**
     * Creates a submit form input.
     *
     *  <code>
     *      echo Form::submit('save', 'Save');
     *  </code>
     *
     * @param string $name       Input name
     * @param string $value      Input value
     * @param array  $attributes HTML attributes
     * @uses   Form::input
     * @return string
     */
    public static function submit($name, $value, array $attributes = null)
    {
        // Set the input type
        $attributes['type'] = 'submit';

        return Form::input($name, $value, $attributes);
    }

    /**
     * Creates a button form input.
     *
     * echo Form::button('save', 'Save Profile', array('type' => 'submit'));
     *
     * @param string $name       Input name
     * @param string $value      Input value
     * @param array  $attributes HTML attributes
     * @uses   Html::attributes
     * @return string
     */
    public static function button($name, $body, array $attributes = null)
    {
        // Set the input name
        $attributes['name'] = $name;

        return '<button'.Html::attributes($attributes).'>'.$body.'</button>';
    }

    /**
     * Creates a form label.
     *
     * echo Form::label('username', 'Username');
     *
     * @param string $input      Target input
     * @param string $text       Label text
     * @param array  $attributes HTML attributes
     * @uses   Html::attributes
     * @return string
     */
    public static function label($input, $text, array $attributes = null)
    {
        // Set the label target
        $attributes['for'] = $input;

        return '<label'.Html::attributes($attributes).'>'.$text.'</label>';
    }

    /**
     * Create closing form tag.
     *
     * echo Form::close();
     *
     * @return string
     */
    public static function close()
    {
        return '</form>';
    }

    /**
     * Dynamically handle calls to custom macros.
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        if (isset(Form::$macros[$method])) {
            return call_user_func_array(Form::$macros[$method], $parameters);
        }

        throw new RuntimeException("Method [$method] does not exist.");
    }

}
