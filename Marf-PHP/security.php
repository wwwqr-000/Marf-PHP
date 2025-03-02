<?php
class Security {
    private static $ivKey;
    private static $aesKey;
    private static $algoName;
    private static $algoType;

    public static function init() {
        self::$ivKey = "1234567890123456";//16 chars (This is an example iv-key! Replace!)
        self::$aesKey = "12345678901234567890123456789012";//32 chars (This is an example aes-key! Replace!)
        self::$algoName = "aes-256-cbc";
        self::$algoType = OPENSSL_RAW_DATA;
    }

    public static function encrypt($string) {
        return base64_encode(openssl_encrypt($string, Security::$algoName, Security::$aesKey, Security::$algoType, Security::$ivKey));
    }

    public static function decrypt($string) {
        return openssl_decrypt(base64_decode($string), Security::$algoName, Security::$aesKey, Security::$algoType, Security::$ivKey);
    }
}
?>