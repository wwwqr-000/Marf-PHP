<?php
class Middleware {
    protected static $name;

    public static function getName() {//Don't copy method to middleware class when "extends" is used.
        return static::$name;
    }

    public function check($arg = null) {
        return false;
    }
}
?>