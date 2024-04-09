<?php

namespace App\Utility;

use Cake\Log\Log;

class CookieCrypt
{
    private static $key = "cryptage";
    private static $cipher = "aes-256-cbc";

    public static function encryptCookie($value)
    {
        Log::debug('entree cookie: ' . $value);
        $ivlen = openssl_cipher_iv_length(static::$cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext = openssl_encrypt($value, static::$cipher, static::$key, OPENSSL_RAW_DATA, $iv);
        $result = base64_encode($iv . $ciphertext);
        Log::debug('crypto counter: ' . $result);
        return $result;
    }

    public static function decryptCookie($encryptedValue)
    {
        if (empty($encryptedValue)) {
            Log::debug('entree cookie: ' . $encryptedValue);
            Log::debug('crypto counter: <valeur vide>');
            return null;
        }

        Log::debug('entree cookie: ' . $encryptedValue);
        $data = base64_decode($encryptedValue, true);

        if ($data === false) {
            Log::notice('Impossible de décoder la valeur du cookie chiffré');
            return null;
        }

        $ivlen = openssl_cipher_iv_length(static::$cipher);
        $iv = substr($data, 0, $ivlen);
        $ciphertext = substr($data, $ivlen);
        $original_plaintext = openssl_decrypt($ciphertext, static::$cipher, static::$key, OPENSSL_RAW_DATA, $iv);

        if ($original_plaintext === false) {
            Log::notice('Impossible de déchiffrer la valeur du cookie');
            return null;
        }

        Log::debug('crypto counter: ' . $original_plaintext);
        return $original_plaintext;
    }
}
