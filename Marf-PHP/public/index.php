<?php
session_start();
require_once("../routes.php");

Routes::setIgnore("/Marf-PHP/Marf-PHP/public");
Routes::redir();
?>