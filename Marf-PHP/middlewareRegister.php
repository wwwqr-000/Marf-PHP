<?php
require("middlewareRequire.php");

class MiddlewareRegister {
    private static $mwList = [];

    public static function register($mwObj) {
        MiddlewareRegister::$mwList[] = $mwObj;
    }

    public static function check($mwName) {
        foreach (MiddlewareRegister::$mwList as $mw) {
            if ($mw::getName() == $mwName) {
                return $mw::check();
            }
        }
        return false;
    }
}
?>