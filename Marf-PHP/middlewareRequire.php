<?php
foreach (glob("../middleware/" . "*.mw.php") as $middleware) {
    require_once("middleware/" . $middleware);
}
?>