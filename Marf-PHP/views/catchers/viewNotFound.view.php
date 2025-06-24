<?php

class ViewNotFound extends View {
    protected $name = "viewNotFound";
    protected $fnex = "php";

    public function show() {
        $html = <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Not found</title>
        </head>
        <body>
            <h1>View / Page Not Found</h1>
            <a href="./">Back to home</a>
        </body>
        </html>
        HTML_CONTENT;
        return $html;
    }
}

ViewRegister::register(new ViewNotFound());
?>