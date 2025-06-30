<?php

class Router {
    private static $originalRoute;
    private static $ignoredPath;

    public function __construct() {
        self::$originalRoute = $_SERVER["REQUEST_URI"];
    }

    public static function setIgnore($path) {
        self::setRoute(str_replace($path, "", self::getRoute()));
        self::$ignoredPath = $path;
    }

    public static function getRootPath() {
        return (isset(self::$ignoredPath) && !empty(self::$ignoredPath))
        ? self::$ignoredPath : "/";
    }

    public static function routeHandler($data) {
        $allowedArr = $data["allowed"];
        $invalidCount = 0;
        foreach ($allowedArr as $allowed) {
            if ($allowed["type"] == "*" || $allowed["type"] == Client::getRequestMethod()) {//Allowed type methods
                $validMiddleware = false;
                if (isset($allowed["middleware"])) {
                    $validMiddleware = true;
                    foreach ($allowed["middleware"] as $middleware) {
                        if (!$middleware) {
                            $validMiddleware = false;
                            break;
                        }
                    }
                }
                else {
                    $validMiddleware = true;
                }

                if ($validMiddleware) {
                    Router::showView($allowed["view"]);
                }
                else {
                    if (!isset($data["denyView"])) {
                        die("<h1>Error: no catch for false middleware in routes for view '" . $allowed["view"] . "'.</h1>");
                    }
                    Router::showView($data["denyView"]);
                }
            }
            else {
                $invalidCount += 1;
            }
        }

        if ($invalidCount == count($allowedArr)) {
            Router::showView("invalidRequestMethod");
        }
    }

    private static function showView($viewName) {
        ViewRegister::show($viewName);
    }

    public static function to($location) {
        header("Location: {$location}");
        die();
    }

    public static function getRoute() {
        return $_SERVER["REQUEST_URI"];
    }

    public static function setRoute($route) {
        $_SERVER["REQUEST_URI"] = $route;
    }

    public static function getOriginalRoute() {
        return self::$originalRoute;
    }
}
?>