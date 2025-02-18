<?php
class ViewClass {
    private $name = "testPage";
    private $fnex = "html";//File name extention (for MIME type)
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

    public function getName() {
        return $this->name;
    }

    public function getFnex() {
        return $this->fnex;
    }
}

//ViewRegister::register(new ViewClass());//Don't forget to register the view
?>