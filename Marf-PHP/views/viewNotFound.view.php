<?php
require_once("../viewClass.php");

class ViewNotFound extends ViewClass {
    private static $name = "viewNotFound";
    private $html;

    public function __construct() {

        $this->html = <<< HTML_CONTENT
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
    }

    public function show() {
        die($this->html);
    }

    public static function getName() {
        return self::$name;
    }
    
}

ViewRegister::register(new ViewNotFound());
?>