<?php
require_once("../middlewareClass.php");

class IsHttps extends MiddlewareClass {
    private static $name = "isHttps";

    public static function getName() {
        return self::$name;
    }

    public static function check() {
        return Client::isHttps();
    }
}

MiddlewareRegister::register(new IsHttps());
?>