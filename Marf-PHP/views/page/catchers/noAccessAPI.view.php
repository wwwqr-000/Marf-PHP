<?php

class NoAccessAPI extends View {
    protected $name = "noAccessAPI";
    protected $fnex = "json";

    public function show() {
        return <<< HTML_CONTENT
        Error: no access
        HTML_CONTENT;
    }
}

ViewRegister::register(new NoAccessAPI());
?>