<?php

class WebsiteOffline extends View {
    protected static $name = "websiteOffline";
    protected $fnex = "php";

    public function show() {
        return <<< HTML_CONTENT
        <h1>Website is currently offline. Please come back later</h1>
        HTML_CONTENT;
    }
}
?>