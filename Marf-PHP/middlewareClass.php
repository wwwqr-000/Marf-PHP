<?php
class MiddlewareClass {
    private static $name;

    public static function getName() {
        return self::$name;
    }

    public static function check() {
        return false;
    }
}
?>