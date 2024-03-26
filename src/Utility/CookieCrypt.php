<?php

namespace App\Utility;

class CookieCrypt
{
    public static function encryptCookie($value)
    {
        $key = "cryptage";
        $cipher = "aes-128-gcm"; // You can use a different cipher if you want
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext = openssl_encrypt((string)$value, $cipher, $key, $options=0, $iv, $tag);
        return base64_encode($iv.$ciphertext.$tag);
    }

    public static function decryptCookie($encryptedValue)
    {
        $key = "cryptage";
        $cipher = "aes-128-gcm"; // You can use a different cipher if you want

        $c = base64_decode($encryptedValue);
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($c, 0, $ivlen);
        $ciphertext_raw = substr($c, $ivlen, -16);
        $tag = substr($c, -16);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv, $tag);

        return intval($original_plaintext);
    }
}
