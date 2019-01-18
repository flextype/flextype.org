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

namespace Flextype\Component\Token;

use Flextype\Component\Session\Session;

class Token
{
    /**
     * Key name for token storage
     *
     * @var  string
     */
    public static $token_name = 'security_token';

    /**
     * Generate and store a unique token which can be used to help prevent
     * [CSRF](http://wikipedia.org/wiki/Cross_Site_Request_Forgery) attacks.
     *
     * $token = Token::generate();
     *
     * You can insert this token into your forms as a hidden field:
     *
     * <input type="hidden" name="csrf" value="<?php echo Token::generate(); ?>">
     *
     * This provides a basic, but effective, method of preventing CSRF attacks.
     *
     * @param  bool $new force a new token to be generated?. Default is false
     * @return string
     */
    public static function generate(bool $new = false) : string
    {
        // Get the current token
        $token = Session::get(Token::$token_name);

        // Create a new unique token
        if ($new === true OR ! $token) {

            // Generate a new unique token
            $token = sha1(uniqid(mt_rand(), true));

            // Store the new token
            Session::set(Token::$token_name, $token);
        }

        // Return token
        return $token;
    }

    /**
     * Check that the given token matches the currently stored security token.
     *
     * if (Token::check($token)) {
     *     // Pass
     * }
     *
     * @param  string  $token token to check
     * @return bool
     */
    public static function check(string $token) : bool
    {
        return Token::slowEquals(Token::generate(), $token);
    }

    /**
     * Compare two hashes in a time-invariant manner.
     * Prevents cryptographic side-channel attacks (timing attacks, specifically)
     *
     * @param string $a cryptographic hash
     * @param string $b cryptographic hash
     * @return bool
     */
    public static function slowEquals(string $a, string $b) : bool
    {
        $diff = strlen($a) ^ strlen($b);

        for($i = 0; $i < strlen($a) AND $i < strlen($b); $i++) {
            $diff |= ord($a[$i]) ^ ord($b[$i]);
        }

        return $diff === 0;
    }
}
