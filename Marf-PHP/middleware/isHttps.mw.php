<?php

class IsHttps extends Middleware {
    protected $name = "isHttps";

    public function check($arg = null) {
        return Client::isHttps();
    }
}

MiddlewareRegister::register(new IsHttps());
?>