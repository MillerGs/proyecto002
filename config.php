<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'Login System with Google using OAuth PHP and MySQL');

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'mysql3.000webhost.com');
define('DB_SERVER_USERNAME', 'a4873987_metrica');
define('DB_SERVER_PASSWORD', 'metricas123');
define('DB_DATABASE', 'a4873987_metrica');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

/* aseg�rese de que el extremo url con una barra diagonal */
define("SITE_URL", "http://metricas.site40.net/TodoProyecto/login_system_with_google/");
/* la p�gina en la que va a ser redirigido para authorzation */
define("REDIRECT_URL", SITE_URL."login.php");

/* * ***** Google related activities start ** */
define("CLIENT_ID", "971100612158-354o23tpdtk0khb3vqs50pmgtutvu1uo.apps.googleusercontent.com"); 
define("CLIENT_SECRET", "pAlBzNXwovxugQKMPlz84Z43");

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile' );



/* logout tanto desde Google y su sitio **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."logout.php"));
/* * ***** Google related activities end ** */
?>