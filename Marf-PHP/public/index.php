<?php
session_start();

function requireFiles($root, $suffix) {
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root)) as $file) {
        if ($file->isFile() && str_ends_with($file->getFilename(), ".$suffix.php")) {
            require $file->getPathname();
        }
    }
}

require("../urls.php");

//Entities
require("../entities/security.php");
Security::init();

require("../entities/client.php");
require("../entities/router.php");
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