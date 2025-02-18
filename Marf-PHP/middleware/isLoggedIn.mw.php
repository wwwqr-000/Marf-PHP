<?php
require_once("../middlewareClass.php");

class IsLoggedIn extends MiddlewareClass {
    private static $name = "isLoggedIn";

    public static function getName() {
        return self::$name;
    }

    public static function check() {
        return true;
    }
}

MiddlewareRegister::register(new IsLoggedIn());
?>