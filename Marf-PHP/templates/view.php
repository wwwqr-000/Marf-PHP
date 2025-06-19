<?php
class View {
    private $name;
    private $fnex;

    public function __construct() {
        $this->name = "";
        $this->fnex = "";
    }

    public function show() {
        die();
    }

    public function getName() {
        return $this->name;
    }

    public function getFnex() {
        return $this->fnex;
    }
}
?>