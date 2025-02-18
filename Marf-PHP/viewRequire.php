<?php
foreach (glob("../views/" . "*.view.php") as $view) {
    require_once("views/" . $view);
}
?>