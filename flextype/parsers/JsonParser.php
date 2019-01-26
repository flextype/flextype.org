<?php

/**
 * @package Flextype
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

class JsonParser {

    /**
     * Inline
     *
     * The level where you switch to inline YAML
     *
     * @var int
     */
    public static $inline = 5;

    /**
     * Ident
     *
     * The amount of spaces to use for indentation of nested nodes
     *
     * @var int
     */
    public static $indent = 2;

    /**
     * Encode data into a string.
     *
     * @param array $data
     * @return string
     */
    public function encode($data, $encode_options = 0)
    {
        $encoded = @json_encode($data, $encode_options);

        if ($encoded === false) {
            throw new \RuntimeException('Encoding JSON failed');
        }

        return $encoded;
    }

    /**
     * Decode a string into data.
     *
     * @param string $data
     * @return array
     */
    public function decode($data, $decode_assoc = true)
    {
        $decoded = @json_decode($data, $decode_assoc);

        if ($decoded === false) {
            throw new \RuntimeException('Decoding JSON failed');
        }

        return $decoded;
    }
}
