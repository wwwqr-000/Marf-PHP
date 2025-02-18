<?php
require_once("viewRegister.php");
require_once("middlewareRegister.php");

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

class Routes {
    private static $ignore;

    public static function setIgnore($path) {
        global $route;
        Routes::$ignore = $path;
        $route = str_replace(Routes::$ignore, "", $route);
    }

    public static function redir() {
        global $route;

        $res = match ($route) {
            "/" => ["allowed" => [["type" => "GET", "view" => "home", "middleware" => [MiddlewareRegister::check("isLocalIP")]]]],
            default => ["allowed" => [["type" => "*", "view" => "viewNotFound"]]]
        };

        Routes::routeHandler($res);
    }

    private static function routeHandler($data) {
        global $method;

        $allowedArr = $data["allowed"];
        foreach ($allowedArr as $allowed) {
            if ($allowed["type"] == "*" || $allowed["type"] == $method) {//Allowed type methods
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
                    Routes::showView($allowed["view"]);
                }
                else {
                    die("<h1>Error: no access (invalid middleware)</h1>");
                }
            }
            else {
                die("<h1>Error: Request method not allowed</h1>");
            }
        }
    }

    private static function showView($viewName) {
        ViewRegister::show($viewName);
    }
}
?>