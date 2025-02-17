<?php
require_once("../viewRegister.php");
require_once("../viewClass.php");

class Home extends ViewClass {
    private $name = "home";
    private $html = <<< HTML_CONTENT
    <!DOCTYPE html>
    <html>
    <head>
        <title>Home page</title>
    </head>
    <body>
    </body>
    </html>
    HTML_CONTENT;

    public function show() {
        die(self::$html);
    }

    public function getName() {
        return self::$name;
    }
    
}

ViewRegister::register(new Home());
?>