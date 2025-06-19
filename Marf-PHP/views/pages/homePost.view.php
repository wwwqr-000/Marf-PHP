<?php

class HomePost extends View {
    protected $name = "homePost";
    protected $fnex = "txt";

    public function show() {
        die("This is a post request!");
    }
}

ViewRegister::register(new HomePost());
?>