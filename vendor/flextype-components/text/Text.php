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

namespace Flextype\Component\Text;

class Text
{
    /**
     * Translit function to convert text from one script to another.
     *
     * echo Text::translitIt('Привет');
     *
     * @param  string $str string
     * @return string $str
     */
    public static function translitIt(string $str) : string
    {
        $patern = [

            // Latin
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'AE', 'Ç'=>'C',
            'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I',
            'Ð'=>'D', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O',
            'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'TH',
            'ß'=>'ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'ae', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i',
            'ð'=>'d', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o',
            'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'þ'=>'th',
            'ÿ'=>'y',

            // Latin symbols
            '©'=>'(c)',

            // Greek
            'Α'=>'A', 'Β'=>'B', 'Γ'=>'G', 'Δ'=>'D', 'Ε'=>'E', 'Ζ'=>'Z', 'Η'=>'H', 'Θ'=>'8',
            'Ι'=>'I', 'Κ'=>'K', 'Λ'=>'L', 'Μ'=>'M', 'Ν'=>'N', 'Ξ'=>'3', 'Ο'=>'O', 'Π'=>'P',
            'Ρ'=>'R', 'Σ'=>'S', 'Τ'=>'T', 'Υ'=>'Y', 'Φ'=>'F', 'Χ'=>'X', 'Ψ'=>'PS', 'Ω'=>'W',
            'Ά'=>'A', 'Έ'=>'E', 'Ί'=>'I', 'Ό'=>'O', 'Ύ'=>'Y', 'Ή'=>'H', 'Ώ'=>'W', 'Ϊ'=>'I',
            'Ϋ'=>'Y',
            'α'=>'a', 'β'=>'b', 'γ'=>'g', 'δ'=>'d', 'ε'=>'e', 'ζ'=>'z', 'η'=>'h', 'θ'=>'8',
            'ι'=>'i', 'κ'=>'k', 'λ'=>'l', 'μ'=>'m', 'ν'=>'n', 'ξ'=>'3', 'ο'=>'o', 'π'=>'p',
            'ρ'=>'r', 'σ'=>'s', 'τ'=>'t', 'υ'=>'y', 'φ'=>'f', 'χ'=>'x', 'ψ'=>'ps', 'ω'=>'w',
            'ά'=>'a', 'έ'=>'e', 'ί'=>'i', 'ό'=>'o', 'ύ'=>'y', 'ή'=>'h', 'ώ'=>'w', 'ς'=>'s',
            'ϊ'=>'i', 'ΰ'=>'y', 'ϋ'=>'y', 'ΐ'=>'i',

            // Turkish
            'Ş'=>'S', 'İ'=>'I', 'Ç'=>'C', 'Ü'=>'U', 'Ö'=>'O', 'Ğ'=>'G',
            'ş'=>'s', 'ı'=>'i', 'ç'=>'c', 'ü'=>'u', 'ö'=>'o', 'ğ'=>'g',

            // Russian
            'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'Yo', 'Ж'=>'Zh',
            'З'=>'Z', 'И'=>'I', 'Й'=>'J', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O',
            'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'U', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C',
            'Ч'=>'Ch', 'Ш'=>'Sh', 'Щ'=>'Sh', 'Ъ'=>'', 'Ы'=>'Y', 'Ь'=>'', 'Э'=>'E', 'Ю'=>'Yu',
            'Я'=>'Ya',
            'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'zh',
            'з'=>'z', 'и'=>'i', 'й'=>'j', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o',
            'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f', 'х'=>'h', 'ц'=>'c',
            'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh', 'ъ'=>'', 'ы'=>'y', 'ь'=>'', 'э'=>'e', 'ю'=>'yu',
            'я'=>'ya',

            // Bulgarian
            'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ж'=>'Zh', 'З'=>'Z',
            'И'=>'I', 'Й'=>'J', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P',
            'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'U', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C', 'Ч'=>'Ch',
            'Ш'=>'Sh', 'Щ'=>'Sh', 'Ъ'=>'',	'Ь'=>'J','Ю'=>'Yu','Я'=>'Ya',
            'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ж'=>'zh','з'=>'z',
            'и'=>'i', 'й'=>'j', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o','п'=>'p',
            'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch',
            'ш'=>'sh', 'щ'=>'sh', 'ъ'=>'', 'ь'=>'j', 'ю'=>'yu', 'я'=>'ya',

            // Ukrainian
            'Є'=>'Ye', 'І'=>'I', 'Ї'=>'Yi', 'Ґ'=>'G',
            'є'=>'ye', 'і'=>'i', 'ї'=>'yi', 'ґ'=>'g',

            // Czech
            'Č'=>'C', 'Ď'=>'D', 'Ě'=>'E', 'Ň'=>'N', 'Ř'=>'R', 'Š'=>'S', 'Ť'=>'T', 'Ů'=>'U',
            'Ž'=>'Z',
            'č'=>'c', 'ď'=>'d', 'ě'=>'e', 'ň'=>'n', 'ř'=>'r', 'š'=>'s', 'ť'=>'t', 'ů'=>'u',
            'ž'=>'z',

            // Polish
            'Ą'=>'A', 'Ć'=>'C', 'Ę'=>'e', 'Ł'=>'L', 'Ń'=>'N', 'Ó'=>'o', 'Ś'=>'S', 'Ź'=>'Z',
            'Ż'=>'Z',
            'ą'=>'a', 'ć'=>'c', 'ę'=>'e', 'ł'=>'l', 'ń'=>'n', 'ó'=>'o', 'ś'=>'s', 'ź'=>'z',
            'ż'=>'z',

            // Latvian
            'Ā'=>'A', 'Č'=>'C', 'Ē'=>'E', 'Ģ'=>'G', 'Ī'=>'i', 'Ķ'=>'k', 'Ļ'=>'L', 'Ņ'=>'N',
            'Š'=>'S', 'Ū'=>'u', 'Ž'=>'Z',
            'ā'=>'a', 'č'=>'c', 'ē'=>'e', 'ģ'=>'g', 'ī'=>'i', 'ķ'=>'k', 'ļ'=>'l', 'ņ'=>'n',
            'š'=>'s', 'ū'=>'u', 'ž'=>'z'
        ];

        return strtr($str, $patern);
    }

    /**
     * Removes any leading and traling slashes from a string
     *
     * echo Text::trimSlashes('some text here/');
     *
     * @param  string $str String with slashes
     * @return string
     */
    public static function trimSlashes(string $str) : string
    {
        return trim($str, '/');
    }

    /**
     * Reduces multiple slashes in a string to single slashes.
     *
     * echo Text::reduceSlashes('some//text//here');
     *
     * @param  string $str String or array of strings with slashes
     * @return string
     */
    public static function reduceSlashes(string $str) : string
    {
        return preg_replace('#(?<!:)//+#', '/', $str);
    }

    /**
     * Removes single and double quotes from a string
     *
     * echo Text::stripQuotes('some "text" here');
     *
     * @param  string $str String with single and double quotes
     * @return string
     */
    public static function stripQuotes(string $str) : string
    {
        return str_replace(array('"', "'"), '', $str);
    }

    /**
     * Convert single and double quotes to entities
     *
     * echo Text::quotesToEntities('some "text" here');
     *
     * @param  string $str String with single and double quotes
     * @return string
     */
    public static function quotesToEntities(string $str) : string
    {
        return str_replace(array("\'", "\"", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
    }

    /**
     * Creates a random string of characters
     *
     * echo Text::random();
     *
     * @param  string  $type   The type of string. Default is 'alnum'
     * @param  integer $length The number of characters. Default is 16
     * @return string
     */
    public static function random(string $type = 'alnum', int $length = 16) : string
    {
        switch ($type) {

            case 'basic':
                return mt_rand();
            break;

            default:
                case 'alnum':
                case 'numeric':
                case 'nozero':
                case 'alpha':
                case 'distinct':
                case 'hexdec':
                    switch ($type) {
                        case 'alpha':
                            $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        break;

                        default:
                        case 'alnum':
                            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        break;

                        case 'numeric':
                            $pool = '0123456789';
                        break;

                        case 'nozero':
                            $pool = '123456789';
                        break;

                        case 'distinct':
                            $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
                        break;

                        case 'hexdec':
                            $pool = '0123456789abcdef';
                        break;
                    }

                    $str = '';
                    for ($i=0; $i < $length; $i++) {
                        $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
                    }

                    return $str;
                break;

            case 'unique':
                return md5(uniqid(mt_rand()));
            break;

            case 'sha1' :
                return sha1(uniqid(mt_rand(), true));
            break;
        }
    }

    /**
     * Add's _1 to a string or increment the ending number to allow _2, _3, etc
     *
     * $str = Text::increment($str);
     *
     * @param  string  $str       String to increment
     * @param  int     $first     Start with
     * @param  string  $separator Separator
     * @return string
     */
    public static function increment(string $str, int $first = 1, string $separator = '_') : string
    {
        preg_match('/(.+)'.$separator.'([0-9]+)$/', $str, $match);

        return isset($match[2]) ? $match[1].$separator.($match[2] + 1) : $str.$separator.$first;
    }

    /**
     * Cut string
     *
     * echo Text::cut('Some text here', 5);
     *
     * @param  string  $str     Input string
     * @param  int     $length  Length after cut
     * @param  string  $cut_msg Message after cut string
     * @return string
     */
    public static function cut(string $str, int $length, string $cut_msg = null) : string
    {
        if (isset($cut_msg)) $msg = $cut_msg; else $msg = '...';
        return function_exists('mb_substr') ? mb_substr($str, 0, $length, 'utf-8') . $msg : substr($str, 0, $length) . $msg;
    }

    /**
     * Lowercase
     *
     * echo Text::lowercase('Some text here');
     *
     * @param  string $str String
     * @return string
     */
    public static function lowercase(string $str) : string
    {
        return function_exists('mb_strtolower') ? mb_strtolower($str, 'utf-8') : strtolower($str);
    }

    /**
     * Uppercase
     *
     * echo Text::uppercase('some text here');
     *
     * @param  string $str String
     * @return string
     */
    public static function uppercase(string $str) : string
    {
        return function_exists('mb_strtoupper') ? mb_strtoupper($str, 'utf-8') : strtoupper($str);
    }

    /**
     * Get length
     *
     * echo Text::length('Some text here');
     *
     * @param  string $str String
     * @return string
     */
    public static function length(string $str) : string
    {
        return function_exists('mb_strlen') ? mb_strlen($str, 'utf-8') : strlen($str);
    }

    /**
     * Create a lorem ipsum text
     *
     * echo Text::lorem(2);
     *
     * @param  int $num Count
     * @return string
     */
    public static function lorem(int $num = 1) : string
    {
        return str_repeat('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', $num);
    }

    /**
     * Extract the last `$num` characters from a string.
     *
     * echo Text::right('Some text here', 4);
     *
     * @param  string  $str The string to extract the characters from.
     * @param  int     $num The number of characters to extract.
     * @return string
     */
    public static function right(string $str, int $num) : string
    {
        return substr($str, Text::length($str)-$num, $num);
    }

    /**
     * Extract the first `$num` characters from a string.
     *
     * echo Text::left('Some text here', 4);
     *
     * @param  string  $str The string to extract the characters from.
     * @param  int     $num The number of characters to extract.
     * @return string
     */
    public static function left(string $str, int $num) : string
    {
        return substr($str, 0, $num);
    }

    /**
     * Replaces newline with <br> or <br />.
     *
     * echo Text::nl2br("Some \n text \n here");
     *
     * @param  string  $str   The input string
     * @param  bool    $xhtml Xhtml or not
     * @return string
     */
    public static function nl2br(string $str, bool $xhtml = true) : string
    {
        return str_replace(array("\r\n", "\n\r", "\n", "\r"), (($xhtml) ? '<br />' : '<br>'), $str);
    }

    /**
     * Replaces <br> and <br /> with newline.
     *
     * echo Text::br2nl("Some <br /> text <br /> here");
     *
     * @param  string $str The input string
     * @return string
     */
    public static function br2nl(string $str) : string
    {
        return str_replace(array('<br>', '<br/>', '<br />'), "\n", $str);
    }

    /**
     * Converts & to &amp;.
     *
     * echo Text::ampEncode("M&CMS");
     *
     * @param  string $str The input string
     * @return string
     */
    public static function ampEncode(string $str) : string
    {
        return str_replace('&', '&amp;', $str);
    }

    /**
     * Converts &amp; to &.
     *
     * echo Text::ampEncode("M&amp;CMS");
     *
     * @param  string $str The input string
     * @return string
     */
    public static function ampDecode(string $str) : string
    {
        return str_replace('&amp;', '&', $str);
    }

    /**
     * Convert plain text to html
     *
     * echo Text::toHtml('test');
     *
     * @param  string $str String
     * @return string
     */
    public static function toHtml(string $str) : string
    {
        return html_entity_decode($str, ENT_QUOTES, 'utf-8');
    }

    /**
     * Create safe string. Use to create safe usernames or filenames.
     *
     * $safe_string = Text::safeString('hello world');
     *
     * @param  string   $str       String
     * @param  string   $delimiter String delimiter
     * @param  boolean  $lowercase String Lowercase
     * @return string
     */
    public static function safeString(string $str, string $delimiter = '-', bool $lowercase = false) : string
    {
        // Remove tags
        $str = filter_var($str, FILTER_SANITIZE_STRING);

        // Decode all entities to their simpler forms
        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');

        // Reserved characters (RFC 3986)
        $reserved_characters = array(
            '/', '?', ':', '@', '#', '[', ']',
            '!', '$', '&', '\'', '(', ')', '*',
            '+', ',', ';', '='
        );

        // Remove reserved characters
        $str = str_replace($reserved_characters, ' ', $str);

        // Set locale to en_US.UTF8
        setlocale(LC_ALL, 'en_US.UTF8');

        // Translit ua,ru => latin
        $str = Text::translitIt($str);

        // Convert string
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        // Remove characters
        $str = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
        if ($delimiter != null) {
            $str = preg_replace("/[\/_|+ -]+/", $delimiter, $str);
            $str = trim($str, $delimiter);
        }

        // Lowercase
        if ($lowercase === true) {
            $str = Text::lowercase($str);
        }

        // Return safe name
        return $str;
    }

    /**
     * Encrypt string
     *
     * $encrypt_string = Text::encryptString('password', 'string_salt');
     *
     * @param string  $str      String to encrypt
     * @param string  $str_salt String salt
     * @return string
     */
    public static function encryptPassword($str, $str_salt = 'string_salt')
    {
        return md5(md5(trim($str) . $str_salt));
    }
}
