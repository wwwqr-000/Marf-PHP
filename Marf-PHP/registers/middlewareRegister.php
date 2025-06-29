<?php

class MiddlewareRegister {
    private static $mwMap = [];

    public static function register($mwName, $className) {
        self::$mwMap[$mwName] = $className;
    }

    public static function check($mwName, $arg = null) {
        if (!isset(self::$mwMap[$mwName])) {
            header("Content-Type: application/json");
            http_response_code(500);
            die("Error: middleware '$mwName' not found.");
        }

        $className = self::$mwMap[$mwName];
        $mw = new $className();
        return $mw->check($arg);
    }
}
?>