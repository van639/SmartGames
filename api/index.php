<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,DELETE OPTIONS');
header('Access-Control-Allow-Header: Content-Type');
header('Content-Type: application/json');

    $url = (string) null;

    $url = explode('/',$_GET['url']);

require_once ('produtosAPI/index.php');
    
?>