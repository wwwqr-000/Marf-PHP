<?php

class HTTPSCheck extends View {
    private $name;
    private $fnex;

    public function __construct() {
        $this->name = "httpsCheck";
        $this->fnex = "php";
    }

    public function show() {
        $html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>HTTPS check page</title>
        </head>
        <body>
            <h1>You are using HTTPS! (better than HTTP protocol)</h1>
        </body>
        </html>
        HTML_CONTENT;
        die($html);
    }

    public function getName() {
        return $this->name;
    }

    public function getFnex() {
        return $this->fnex;
    }
}

ViewRegister::register(new HTTPSCheck());
?>