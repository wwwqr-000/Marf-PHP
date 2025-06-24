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
            getenv("DATABASE_PORT")
        );
    }

    //$searchMap = [["name", "wwwqr", "s"]]

    public static function recordExists($ID, $table, $searchMap) {
        $conn = Database::getConn();
        if (!$conn) { return false; }

        $prepStr = "SELECT $table.$ID AS c FROM $table WHERE 0=0";

        foreach ($searchMap as $search) {
            $prepStr .= " AND";
            $val = null;
            if ($search[2] == "s") {
                $val = "'" . $search[1] . "'";
            }
            $prepStr .= " $table." . $search[0] . " = $val";
        }

        $prepStr .= " LIMIT 1";

        //$conn->prepare("SELECT $table.$ID AS c FROM $table WHERE ")
    }
}


?>