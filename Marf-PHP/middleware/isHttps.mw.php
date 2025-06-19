<?php

class IsHttps extends Middleware {
    private static $name = "isHttps";

    public static function getName() {
        return self::$name;
    }

    public static function check($arg = null) {
        return Client::isHttps();
    }
}

MiddlewareRegister::register(new IsHttps());
?>