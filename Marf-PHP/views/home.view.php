<?php
require_once("../ViewClass.php");

function getProtocol() {
    if (Client::isHttps()) {
        return "https";
    }
    return "http";
}

class Home extends ViewClass {
    private $name;
    private $fnex;

    public function __construct() {
        $this->name = "home";
        $this->fnex = "php";
    }

    public function show() {
        $ip = Client::getIP();
        $protocol = getProtocol();
        $encStr = Security::encryptStr("Marf-PHP");
        $decStr = Security::decryptStr($encStr);
        $hashStr = Security::hashStr($decStr);
        $html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Home page ({$ip} | {$protocol})</title>
        </head>
        <body>
            <h1>Thanks for using Marf-PHP!</h1>
            <br>
            <p>This is a encrypted string: {$encStr}</p>
            <p>This is that string, but decrypted: {$decStr}</p>
            <p>This is the hash of {$decStr}: {$hashStr}</p>
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

ViewRegister::register(new Home());
?>