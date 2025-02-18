<?php
session_start();
require_once("../client.php");
require_once("../routes.php");

Routes::setIgnore("/Marf-PHP/Marf-PHP/public");//Path here get's removed from route: "http://localhost/Marf-PHP/Marf-PHP/public/" -> "/"
Routes::redir();
?>