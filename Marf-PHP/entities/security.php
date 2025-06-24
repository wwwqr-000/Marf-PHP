<?php
class Security {
    private static $ivKey;
    private static $aesKey;
    private static $algoName;
    private static $algoType;
    private static $algoHash;

    public static function init() {
        self::$ivKey = random_bytes(16);
        self::$aesKey = getenv("SECURITY_AES_KEY");
        self::$algoName = getenv("SECURITY_AES_ALGO");
        self::$algoType = OPENSSL_RAW_DATA;
        self::$algoHash = getenv("SECURITY_HASH_ALGO");
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

    public static function sanitizeTxt($txt) {
        return htmlentities($txt);
    }

    public static function genCSRFField($fieldName) {
        $token = base64_encode(random_bytes(random_int(30, 35)));
        $_SESSION["Marf-PHP"]["security"]["CSRF"][Security::hashStr($fieldName)] = $token;
        return $token;
    }

    public static function getCSRFField($fieldName) {
        $hashedFName = Security::hashStr($fieldName);
        if (
            empty($_SESSION["Marf-PHP"]["security"]["CSRF"]) ||
            empty($_SESSION["Marf-PHP"]["security"]["CSRF"][$hashedFName])
        ) { return false; }

        return $_SESSION["Marf-PHP"]["security"]["CSRF"][$hashedFName];
    }
}
?>