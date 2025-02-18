<?php
foreach (glob("../middleware/" . "*.mw.php") as $middleware) {
    $f = basename($middleware);
    require_once(__DIR__ . "/middleware/" . $f);
}
?>