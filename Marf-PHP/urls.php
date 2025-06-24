<?php
class Urls {
    public static function getUrl() {
        $route = Client::getRoute();
        return match (true) {
            //Define your url-paths here

            //Check if website is online
            getenv("GENERAL_WEBSITE_IS_ONLINE") != "true" => ["allowed" => [

            ]],
            //

            //Home page
            $route == "/" => ["allowed" => [
                    ["type" => "GET", "view" => "home"],
                    ["type" => "POST", "view" => "homePost"],
                ]
            ],
            //

            //HTTPS check page
            $route == "/https" => ["allowed" => [
                ["type" => "GET", "view" => "httpsCheck", "middleware" => [
                    MiddlewareRegister::check("isHttps")
                ]]
            ], "denyView" => "securityWarning"],
            //

            //Assets API
            str_contains($route, "/api/assets/") => ["allowed" => [
                ["type" => "GET", "view" => "assets_api", "middleware" => [
                    MiddlewareRegister::check("isAsset", [
                        "css/self",
                    ])
                ]]
                ], "denyView" => "noAccessAPI"],
            //

            //
            default => ["allowed" => [["type" => "*", "view" => "viewNotFound"]]]
        };
    }
}
?>