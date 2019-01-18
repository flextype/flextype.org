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

namespace Flextype\Component\Html;

class Html
{
    /**
     * Preferred order of attributes
     *
     * @var array
     */
    public static $attribute_order = [
        'action', 'method', 'type', 'id', 'name', 'value',
        'href', 'src', 'width', 'height', 'cols', 'rows',
        'size', 'maxlength', 'rel', 'media', 'accept-charset',
        'accept', 'tabindex', 'accesskey', 'alt', 'title', 'class',
        'style', 'selected', 'checked', 'readonly', 'disabled',
    ];

	/**
	 * The registered custom macros.
	 *
	 * @var array
	 */
	public static $macros = [];

    /**
     * Registers a custom macro.
     *
     * // Registering a Html macro
     * Html::macro('my_element', function() {
     *     return '<element id="flextype">';
     * });
     *
     * // Calling a custom Html macro
     * echo Html::my_element();
     *
     *
     * // Registering a Html macro with parameters
     * Html::macro('my_element', function($id = '') {
     *     return '<element id="'.$id.'">';
     * });
     *
     * // Calling a custom Html macro with parameters
     * echo Html::my_element('flextype');
     *
     * @param string  $name  Name
     * @param Closure $macro Macro
     */
    public static function macro(string $name, $macro)
    {
        Html::$macros[$name] = $macro;
    }

    /**
     * Convert special characters to HTML entities. All untrusted content
     * should be passed through this method to prevent XSS injections.
     *
     * echo Html::toText('test');
     *
     * @param  string  $value         String to convert
     * @param  bool    $double_encode Encode existing entities
     * @return string
     */
    public static function toText(string $value, bool $double_encode = true) : string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'utf-8', $double_encode);
    }

    /**
     * Compiles an array of HTML attributes into an attribute string.
     * Attributes will be sorted using Html::$attribute_order for consistency.
     *
     * echo '<div'.Html::attributes($attrs).'>'.$content.'</div>';
     *
     * @param  array  $attributes Attribute list
     * @return string
     */
    public static function attributes(array $attributes = null) : string
    {
        if (empty($attributes)) return '';

        // Init var
        $sorted = [];

        foreach (Html::$attribute_order as $key) {

            if (isset($attributes[$key])) {
                // Add the attribute to the sorted list
                $sorted[$key] = $attributes[$key];
            }

        }

        // Combine the sorted attributes
        $attributes = $sorted + $attributes;

        $compiled = '';

        foreach ($attributes as $key => $value) {

            if ($value === NULL) {
                // Skip attributes that have NULL values
                continue;
            }

            if (is_int($key)) {
                // Assume non-associative keys are mirrored attributes
                $key = $value;
            }

            // Add the attribute value
            $compiled .= ' '.$key.'="'.Html::toText($value).'"';
        }

        return $compiled;
    }

    /**
     * Create br tags
     *
     * echo Html::br(2);
     *
     * @param  int $num Count of line break tag
     * @return string
     */
    public static function br(int $num = 1) : string
    {
        return str_repeat("<br>", $num);
    }

    /**
     * Create &nbsp;
     *
     * echo Html::nbsp(2);
     *
     * @param  int $num Count of &nbsp;
     * @return string
     */
    public static function nbsp(int $num = 1) : string
    {
        return str_repeat("&nbsp;", $num);
    }

    /**
     * Create an arrow
     *
     * echo Html::arrow('right');
     *
     * @param  string  $direction Arrow direction [up,down,left,right]
     * @return string
     */
    public static function arrow(string $direction) : string
    {
        switch ($direction) {
            case "up": 	  $output = '<span class="arrow">&uarr;</span>'; break;
            case "down":  $output = '<span class="arrow">&darr;</span>'; break;
            case "left":  $output = '<span class="arrow">&larr;</span>'; break;
            case "right": $output = '<span class="arrow">&rarr;</span>'; break;
        }

        return $output;
    }

    /**
     * Create HTML link anchor.
     *
     * echo Html::anchor('About', 'http://sitename.com/about');
     *
     * @param string $title Anchor title
     * @param string $url   Anchor url
     * @param array  $attributes Anchor attributes
     * @return string
     */
    public static function anchor(string $title, string $url = '', array $attributes = null) : string
    {
        // Add link
        if ($url !== '') $attributes['href'] = $url;
        return '<a'.Html::attributes($attributes).'>'.$title.'</a>';
    }

    /**
     * Create HTML <h> tag
     *
     * echo Html::heading('Title', 1);
     *
     * @param string  $title      Text
     * @param int     $h          Number [1-6]
     * @param array   $attributes Heading attributes
     * @return string
     */
    public static function heading(string $title, int $h = 1, array $attributes = null) : string
    {
        $output = '<h'.$h.Html::attributes($attributes).'>'.$title.'</h'.$h.'>';

        return $output;
    }

    /**
     * Generate document type declarations
     *
     * echo Html::doctype('html5');
     *
     * @param  string $type Doctype to generated
     * @return mixed
     */
    public static function doctype(string $type = 'html5')
    {
        $doctypes = ['xhtml11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
                  'xhtml1-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
                  'xhtml1-trans'  => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
                  'xhtml1-frame'  => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
                  'html5'	  => '<!DOCTYPE html>',
                  'html4-strict'  => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
                  'html4-trans'	  => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
                  'html4-frame'	  => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">'];

        if (isset($doctypes[$type])) return $doctypes[$type]; else return false;
    }

    /**
     * Create image
     *
     * echo Html::image('data/files/pic1.jpg');
     *
     * @param string $file       File
     * @param array  $attributes Image attributes
     * @return string
     */
    public static function image(string $file, array $attributes = null) : string
    {
        // Add the image link
        $attributes['src'] = $file;
        $attributes['alt'] = (isset($attributes['alt'])) ? $attributes['alt'] : pathinfo($file, PATHINFO_FILENAME);

        return '<img'.Html::attributes($attributes).'>';
    }

	/**
	 * Obfuscate an e-mail address to prevent spam-bots from sniffing it.
     *
     * echo Html::email('hello@flextype.org');
     *
	 * @param  string  $email
	 * @return string
	 */
	 public static function email(string $email) : string
	 {
	     return str_replace('@', '&#64;', Html::obfuscate($email));
	 }

    /**
     * Obfuscate a string to prevent spam-bots from sniffing it.
     *
     * This method obfuscate the value, randomly convert each
     * letter to its entity or hexadecimal representation, keeping a
     * bot from sniffing the randomly obfuscated letters.
     *
     * echo Html::obfuscate('hello@flextype.org');
     *
     * @param  string  $value
     * @return string
     */
    public static function obfuscate(string $value) : string
    {
        $safe = '';

        foreach (str_split($value) as $letter) {
            switch (rand(1, 3)) {
                case 1:
                    $safe .= '&#'.ord($letter).';';
                break;
                case 2:
                    $safe .= '&#x'.dechex(ord($letter)).';';
                break;
                case 3:
                    $safe .= $letter;
            }
        }

        return $safe;
    }

    /**
     * Dynamically handle calls to custom macros.
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic(string $method, array $parameters)
    {
        if (isset(Html::$macros[$method])) {
            return call_user_func_array(Html::$macros[$method], $parameters);
        }

        throw new RuntimeException("Method [$method] does not exist.");
    }

}
