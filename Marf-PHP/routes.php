<?php
require_once("viewRegister.php");
$route = $_SERVER["REQUEST_URI"];

class Routes {
    private static $ignore = "";

    public static function setIgnore($path) {
        global $route;
        Routes::$ignore = $path;
        $route = str_replace(Routes::$ignore, "", $route);
    }

    public static function redir() {
        global $route;

        $res = match ($route) {
            "/" => Routes::showView("home"),
            "/test" => Routes::showView("test"),
            default => Routes::showView("notfound" . $route)
        };
    }

    private static function showView($viewName) {
        ViewRegister::show($viewName);
    }
}
?>