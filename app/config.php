<?php
session_start();
require_once('database/config.php');
require_once('router.php');



$url_param= isset($_GET['url']) ? $_GET['url'] : "";

$router=new Router;

$router->parseUrl($url_param);

?>