<?php

class HTTPSCheck extends View {
    protected $name = "httpsCheck";
    protected $fnex = "php";

    public function show() {
        $html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>HTTPS check page</title>
        </head>
        <body>
            <h1>You are using HTTPS! (better than HTTP protocol)</h1>
        </body>
        </html>
        HTML_CONTENT;
        die($html);
    }
}

ViewRegister::register(new HTTPSCheck());
?>