<?php
session_start();

function requireFiles($root, $name) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($root)
    );

    $regex = new RegexIterator($iterator, "/\." . $name . "\.php$/i");

    foreach ($regex as $file) {
        require_once $file->getPathname();
    }
}

require_once("../urls.php");

//Entities
require_once("../entities/security.php");
Security::init();

require_once("../entities/client.php");
require_once("../entities/router.php");
//


//Templates
require_once("../templates/middleware.php");
require_once("../templates/view.php");
//

//Registers
require_once("../registers/viewRegister.php");
require_once("../registers/middlewareRegister.php");
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