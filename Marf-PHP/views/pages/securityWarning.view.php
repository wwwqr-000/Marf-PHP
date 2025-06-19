<?php

class SecurityWarning extends View {
    private $name;
    private $fnex;

    public function __construct() {
        $this->name = "securityWarning";
        $this->fnex = "php";
    }

    public function show() {
        $html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Security warning</title>
        </head>
        <body>
            <h1 style="color: red"><u>Security Warning</u></h1>
            <h3>You are currently using HTTP instead of the more secure HTTPS protocol. Using HTTPS might be the best option⚠️</h3>
            <p>(This is a example view for the 'denyView' trigger when one or more middlewares in a route are invalid)</p>
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

ViewRegister::register(new SecurityWarning());
?>