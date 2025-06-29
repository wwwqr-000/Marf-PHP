<?php
class View {
    protected static $name;
    protected $fnex;

    public function show() {
        return "";
    }

    public static function getName() {
        return static::$name;
    }

    public function getFnex() {
        return $this->fnex;
    }
}
?>