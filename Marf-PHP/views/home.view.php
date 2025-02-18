<?php
require_once("../viewClass.php");

class Home extends ViewClass {
    private static $name = "home";
    private static $html = <<< HTML_CONTENT
    <!DOCTYPE html>
    <html>
    <head>
        <title>Home page</title>
    </head>
    <body>
    </body>
    </html>
    HTML_CONTENT;

    public static function show() {
        die(self::$html);
    }

    public static function getName() {
        return self::$name;
    }
    
}

ViewRegister::register(new Home());
?>