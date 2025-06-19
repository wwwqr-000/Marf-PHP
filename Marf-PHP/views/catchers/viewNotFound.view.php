<?php

class ViewNotFound extends View {
    private $name = "viewNotFound";
    private $fnex = "php";

    public function __construct() {
        $this->name = "viewNotFound";
        $this->fnex = "php";
    }

    public function show() {
        $html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Not found</title>
        </head>
        <body>
            <h1>View Not Found</h1>
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

ViewRegister::register(new ViewNotFound());
?>