<?php

function connect() {
  error_reporting(E_ALL);
  static $db;
  
  $settings = include "config.php";
  $dbHost = $settings["mysqlServer"];
  $dbName = $settings["mysqlDatabase"];
  $dbUser = $settings["mysqlUser"];
  $dbPassword = $settings["mysqlPassword"];
  
  if (!$db) {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName;", "$dbUser", "$dbPassword", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 }
 return $db;
};

?>