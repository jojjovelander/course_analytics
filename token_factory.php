<?php


class token_factory
{
    const TOKEN_TTL = 10;
    const PASSWORD = "jkoa9u0dja3mp1!as0diADNHD$";

    static function encrypt($plaintext, $password)
    {
        $method = "AES-256-CBC";
        $key = hash('sha256', $password, true);
        $iv = openssl_random_pseudo_bytes(16);

        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

        return $iv . $hash . $ciphertext;
    }

    static function generateToken($userId, $courseId)
    {
        $token = "$userId-$courseId-" . time();
        $cipher = token_factory::encrypt($token, token_factory::PASSWORD);
        return urlencode(base64_encode($cipher));
    }
}