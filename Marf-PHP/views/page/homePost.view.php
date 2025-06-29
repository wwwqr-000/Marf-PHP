<?php

class HomePost extends View {
    protected static $name = "homePost";
    protected $fnex = "txt";

    public function show() {
        $rName = Security::getCSRFField("name");
        if (!$rName) {
            $_SESSION["test"]["error"] = "No name given";
            Router::to("./");
        }

        $name = Security::sanitizeTxt(Client::getData("post")[$rName]);
        if (empty($name)) {
            $_SESSION["test"]["error"] = "Text field empty";
            Router::to("./");
        }
        $_SESSION["test"]["name"] = $name;
        Router::to("./");
    }
}
?>