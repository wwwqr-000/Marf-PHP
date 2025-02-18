<?php
require_once("../viewClass.php");

class Home extends ViewClass {
    private static $name = "home";
    private $html;

    public function __construct() {
        $this->html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Home page ({$_SERVER["REMOTE_ADDR"]})</title>
        </head>
        <body>
        </body>
        </html>
        HTML_CONTENT;
    }

    public function show() {
        die($this->html);
    }

    public static function getName() {
        return self::$name;
    }
    
}

ViewRegister::register(new Home());
?>