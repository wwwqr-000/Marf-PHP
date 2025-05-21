<?php
require_once("viewRegister.php");
require_once("middlewareRegister.php");

class Routes {
    public static function setIgnore($path) {
        Client::setRoute(str_replace($path, "", Client::getRoute()));
    }

    public static function redir() {

        $res = match (true) {
            //Your routes here
            Client::getRoute() == "/" => ["allowed" => [//Home page
                ["type" => "GET", "view" => "home"]]
            ],
            Client::getRoute() == "/https" => ["allowed" => [//HTTPS check page
                ["type" => "GET", "view" => "httpsCheck", "middleware" => [
                    MiddlewareRegister::check("isHttps")
                ]]
            ], "denyView" => "securityWarning"],
            //
            default => ["allowed" => [["type" => "*", "view" => "viewNotFound"]]]
        };

        Routes::routeHandler($res);
    }

    private static function routeHandler($data) {

        $allowedArr = $data["allowed"];
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
                    Routes::showView($allowed["view"]);
                }
                else {
                    if (!isset($data["denyView"])) {
                        die("<h1>Error: no catch for false middleware in routes for view '" . $allowed["view"] . "'.</h1>");
                    }
                    Routes::showView($data["denyView"]);
                }
            }
            else {
                Routes::showView("invalidRequestMethod");
            }
        }
    }

    private static function showView($viewName) {
        ViewRegister::show($viewName);
    }
}
?>