<?php
class Middleware {
    private static $name;

    public static function getName() {
        return self::$name;
    }

    public static function check($arg = null) {
        return false;
    }
}
?>