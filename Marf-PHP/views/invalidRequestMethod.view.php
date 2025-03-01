<?php
require_once("../ViewClass.php");

class InvalidRequestMethod extends ViewClass {
    private $name;
    private $fnex;

    public function __construct() {
        $this->name = "invalidRequestMethod";
        $this->fnex = "php";
    }

    public function show() {
        $method = Client::getRequestMethod();
        $html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Invalid request method</title>
        </head>
        <body>
            <h1>Wrong request method. (Error: invalid request method "{$method}")</h1>
            <a href="./">Back to home</a>
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

ViewRegister::register(new InvalidRequestMethod());
?>