<?php
class View {
    protected static $name;
    protected $fnex;

    public function show() {
        return "";
    }

    public static function getName() {//Don't copy method to view class when "extends" is used.
        return static::$name;
    }

    public function getFnex() {//Don't copy method to view class when "extends" is used.
        return $this->fnex;
    }
}
?>