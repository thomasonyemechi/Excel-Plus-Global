<?php
session_start(); ob_start();  
require_once('includes/headerquery.php');
$pro->processWallet(1,1,1,1,'Test',1);

?>