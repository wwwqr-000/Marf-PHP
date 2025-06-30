<?php

class InvalidRequestMethod extends View {
    protected static $name = "invalidRequestMethod";
    protected $fnex = "php";

    public function show() {
        $method = Client::getRequestMethod();
        $home = Router::getRootPath();
        return <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Invalid request method</title>
        </head>
        <body>
            <h1>Wrong request method. (Error: invalid request method "{$method}")</h1>
            <a href="{$home}">Back to home</a>
        </body>
        </html>
        HTML_CONTENT;
    }
}
?>