<?php
class Client {
    public static function getIP() {
        return $_SERVER["REMOTE_ADDR"];
    }

    public static function getData($type) {
        return match ($type) {
            "get" => $_GET,
            "server" => $_SERVER,
            "session" => $_SESSION,
            "files" => $_FILES,
            "post" => $_POST
        };
    }

    public static function isHttps() {
        return isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on";
    }

    public static function getRequestMethod() {
        return $_SERVER["REQUEST_METHOD"];
    }
}
?>