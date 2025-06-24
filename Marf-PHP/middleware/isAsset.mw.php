<?php

class IsAsset extends Middleware {
    protected $name = "isAsset";

    public function check($arg = null) {
        foreach ($arg as $item) {
            if (Client::getRoute() == "/api/assets/" . $item) {
                return true;
            }
        }

        return false;
    }
}

MiddlewareRegister::register(new IsAsset());
?>