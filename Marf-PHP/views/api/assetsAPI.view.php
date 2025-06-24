<?php

class AssetsAPI extends View {
    protected $name = "assets_api";
    protected $fnex = "php";

    public function show() {
        return <<< HTML_CONTENT
        test
        HTML_CONTENT;
    }
}

ViewRegister::register(new AssetsAPI());
?>