<?php
require_once("../middlewareClass.php");

class IsLocalIP extends MiddlewareClass {
    private static $name = "isLocalIP";

    public static function getName() {
        return self::$name;
    }

    public static function check() {
        return $_SERVER["REMOTE_ADDR"] == "::1";
    }
}

MiddlewareRegister::register(new IsLocalIP());
?>