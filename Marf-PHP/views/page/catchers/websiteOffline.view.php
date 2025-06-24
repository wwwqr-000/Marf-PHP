<?php

class WebsiteOffline extends View {
    protected $name = "websiteOffline";
    protected $fnex = "php";

    public function show() {
        return <<< HTML_CONTENT
        <h1>Website is currently offline. Please come back later</h1>
        HTML_CONTENT;
    }
}

ViewRegister::register(new WebsiteOffline());
?>