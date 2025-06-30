<?php
class Urls {
    public static function getUrl() {
        $route = Router::getRoute();
        return match (true) {
            //Define your url-paths here

            //Check if website is online
            getenv("GENERAL_WEBSITE_IS_ONLINE") != "true" => ["allowed" => [
                ["type" => "*", "view" => "websiteOffline"]
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

            //
            default => ["allowed" => [["type" => "*", "view" => "viewNotFound"]]]
        };
    }
}
?>