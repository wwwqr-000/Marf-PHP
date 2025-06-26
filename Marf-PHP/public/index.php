<?php
session_start();

function requireFiles($root, $suffix) {
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root)) as $file) {
        if ($file->isFile() && str_ends_with($file->getFilename(), ".$suffix.php")) {
            require $file->getPathname();
        }
    }
}

//Load .env
if (!file_exists("../.env")) {
    throw new Error("environment file not found");
}

$lines = file("../.env", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach($lines as $line) {
    if (str_starts_with(trim($line), "#")) { continue; }

    list($name, $value) = explode("=", $line, 2);
    $name = trim($name);
    $value = trim($value);
    $value = trim($value, "\"'");
    putenv("$name=$value");
}
//

require("../urls.php");

//Entities
require("../entities/security.php");
Security::init();
Security::trySessionRefresh();

require("../entities/client.php");
require("../entities/router.php");
require("../entities/database.php");

if (getenv("DATABASE_ENABLED") == "true") {
    Database::init();
}
//


//Templates
require("../templates/middleware.php");
require("../templates/view.php");
//

//Registers
require("../registers/viewRegister.php");
require("../registers/middlewareRegister.php");
//

//Files
requireFiles("../views", "view");
requireFiles("../middleware", "mw");
//

//Path here get's removed from route: "http://localhost/Marf-PHP/Marf-PHP/public/" -> "/"
Router::setIgnore("/Marf-PHP/Marf-PHP/public");
//

Router::routeHandler(Urls::getUrl());
?>