<?php

class Router {
    public static function setIgnore($path) {
        Client::setRoute(str_replace($path, "", Client::getRoute()));
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
}
?>