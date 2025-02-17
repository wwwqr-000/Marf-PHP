<?php
class ViewRegister {
    public static $viewList = [];

    public static function register($viewObj) {
        ViewRegister::$viewList[] = $viewObj;
    }

    public static function show($viewName) {
        foreach (ViewRegister::$viewList as $view) {
            if ($view.getName() == $viewName) {
                $view.show();
            }
        }
    }
}
?>