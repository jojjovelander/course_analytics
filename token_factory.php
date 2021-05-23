<?php


class token_factory
{
    const TOKEN_TTL = 10;
    const PASSWORD = "{{ password }}";

    static function encrypt($plaintext_token)
    {
        $method = "AES-256-CBC";
        $key = hash('sha256', token_factory::PASSWORD, true);
        $iv = openssl_random_pseudo_bytes(16);

        $ciphertext = openssl_encrypt($plaintext_token, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

        return $iv . $hash . $ciphertext;
    }

    static function generateToken($userId, $courseId)
    {
        $token = "$userId-$courseId-" . time();
        $cipher = token_factory::encrypt($token);
        return urlencode(base64_encode($cipher));
    }
}