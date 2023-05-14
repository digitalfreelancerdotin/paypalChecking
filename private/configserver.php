<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (!defined('DBNAME')) {
  define('DBNAME','dbmpxo4jgunogt');
}
if (!defined('DBUSER')) {
define('DBUSER','uam5enefo0l27');
}
if (!defined('DBPASS')) {
define('DBPASS','jmhplrzxqvgo');
}
if (!defined('DBHOST')) {
define('DBHOST','localhost');
}
try {
  $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Your page is connected with database successfully..";
} catch(PDOException $e) {
  echo "Issue -> Connection failed: " . $e->getMessage();
}
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'dashboardproject';
// $topbar = false;
?>