<?php
class Security {
    private static $ivKey;
    private static $aesKey;
    private static $algoName;
    private static $algoType;
    private static $algoHash;

    public static function init() {
        self::$ivKey = random_bytes(16);
        self::$aesKey = "12345678901234567890123456789012";//32 chars (This is an example aes-key! Replace!)
        self::$algoName = "aes-256-cbc";
        self::$algoType = OPENSSL_RAW_DATA;
        self::$algoHash = "sha256";
    }

    public static function encryptStr($string) {
        return base64_encode(openssl_encrypt($string, Security::$algoName, Security::$aesKey, Security::$algoType, Security::$ivKey));
    }

    public static function decryptStr($string) {
        return openssl_decrypt(base64_decode($string), Security::$algoName, Security::$aesKey, Security::$algoType, Security::$ivKey);
    }

    public static function hashStr($string) {
        return hash(Security::$algoHash, $string, false);
    }
}
?>