<?php

class HomePost extends View {
    protected $name = "homePost";
    protected $fnex = "txt";

    public function show() {
        $rName = Security::getCSRFField("name");
        if (!$rName) {
            return "Error: CSRF prevention invalid";
        }
        $name = Client::getData("post")[$rName];
        return "This is a post request! {$name}";
    }
}

ViewRegister::register(new HomePost());
?>