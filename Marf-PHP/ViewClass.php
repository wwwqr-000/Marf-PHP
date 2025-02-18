<?php
class ViewClass {
    private static $name;
    private $html;

    public function __construct() {
        $this->html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Test page</title>
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
?>