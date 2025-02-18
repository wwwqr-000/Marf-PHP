<?php
foreach (glob("../views/" . "*.view.php") as $view) {
    $f = basename($view);
    require_once(__DIR__ . "/views/" . $f);
}
?>