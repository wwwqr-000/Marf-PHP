<?php

class MiddlewareRegister {
    private static $mwList = [];

    public static function register($mwObj) {
        MiddlewareRegister::$mwList[] = $mwObj;
    }

    public static function check($mwName, $arg = null) {
        foreach (MiddlewareRegister::$mwList as $mw) {
            if ($mw->getName() == $mwName) {
                return $mw->check($arg);
            }
        }
        return false;
    }
}
?>