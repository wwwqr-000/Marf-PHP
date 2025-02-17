<?php
class ViewClass {
    private static $name;
    private static $html;
    
    public static function show() {
        die(self::$html);
    }

    public static function getName() {
        return self::$name;
    }
}
?>