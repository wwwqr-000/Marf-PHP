<?php

class IsHttps extends Middleware {
    protected static $name = "isHttps";

    public function check($arg = null) {
        return Client::isHttps();
    }
}
?>