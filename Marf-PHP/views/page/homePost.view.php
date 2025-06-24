<?php

class HomePost extends View {
    protected $name = "homePost";
    protected $fnex = "txt";

    public function show() {
        $rName = Security::getCSRFField("name");
        if (!$rName) {
            $_SESSION["test"]["error"] = "No name given";
            Router::to("./");
        }

        $name = Security::sanitizeTxt(Client::getData("post")[$rName]);
        $_SESSION["test"]["name"] = $name;
        Router::to("./");
    }
}

ViewRegister::register(new HomePost());
?>