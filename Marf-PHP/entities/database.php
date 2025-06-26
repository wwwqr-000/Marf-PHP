<?php
class Database {
    private static $conn;

    public static function getConn() {
        return (
            self::$conn &&
            self::$conn instanceof mysqli &&
            !self::$conn->connect_error &&
            self::$conn->ping()
        ) ? self::$conn : false;
    }

    public static function init() {
        self::$conn = new mysqli(
            getenv("DATABASE_HOST"),
            getenv("DATABASE_USER_NAME"),
            getenv("DATABASE_USER_PASSWORD"),
            getenv("DATABASE_NAME"),
            intval(getenv("DATABASE_PORT"))
        );
    }
}


?>