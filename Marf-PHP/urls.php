<?php
class Urls {
    public static function getUrl() {
        $route = Client::getRoute();
        return match (true) {
            //Define your url-paths here
            $route == "/" => ["allowed" => [//Home page
                    ["type" => "GET", "view" => "home"],
                    ["type" => "POST", "view" => "homePost"],
                ]
            ],
            $route == "/https" => ["allowed" => [//HTTPS check page
                ["type" => "GET", "view" => "httpsCheck", "middleware" => [
                    MiddlewareRegister::check("isHttps")
                ]]
            ], "denyView" => "securityWarning"],
            //
            default => ["allowed" => [["type" => "*", "view" => "viewNotFound"]]]
        };
    }
}
?>