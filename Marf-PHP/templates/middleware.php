<?php
class Middleware {
    protected static $name;

    public static function getName() {
        return static::$name;
    }

    public function check($arg = null) {
        return false;
    }
}
?>