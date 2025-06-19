<?php

class HomePost extends View {
    private $name;
    private $fnex;

    public function __construct() {
        $this->name = "homePost";
        $this->fnex = "json";
    }

    public function show() {
        die("This is a post request!");
    }

    public function getName() {
        return $this->name;
    }

    public function getFnex() {
        return $this->fnex;
    }
}

ViewRegister::register(new HomePost());
?>