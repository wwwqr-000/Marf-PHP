<?php
require_once("../ViewClass.php");

function getProtocol() {
    if (Client::isHttps()) {
        return "https";
    }
    return "http";
}

class Home extends ViewClass {
    private $name = "home";
    private $fnex = "php";
    private $html;

    public function __construct() {
        $ip = Client::getIP();
        $protocol = getProtocol();

        $this->html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Home page ({$ip} | {$protocol})</title>
        </head>
        <body>
            <h1>Thanks for using Marf-PHP!</h1>
        </body>
        </html>
        HTML_CONTENT;
    }

    public function show() {
        die($this->html);
    }

    public function getName() {
        return $this->name;
    }

    public function getFnex() {
        return $this->fnex;
    }
}

ViewRegister::register(new Home());
?>