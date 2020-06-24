<?php
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
define("DOMAIN", $_SERVER['SERVER_NAME']);
define("HOSTNAME",        "[DatabaseHostname]");
define("DATABASE",        "[DatabaseName]");
define("LOGIN",           "[DatabaseUsername]");
define("PASSWORD",        "[DatabasePassword]");
	
define("PAYPALENDPOINT",        "api.paypal.com");
define("PAYPALCLIENTID",        "[PayPalClientID]");
define("PAYPALSECRET",        "[PayPalSecret]");

define("CONN", mysql_connect(HOSTNAME, LOGIN, PASSWORD));
define("MySQLiCONN", HOSTNAME.', '.LOGIN.', '.PASSWORD.', '.DATABASE);
// UNCOMMENT WHEN NEEDED --> $mysqli = new mysqli(HOSTNAME, LOGIN, PASSWORD, DATABASE);
// UNCOMMENT WHEN NEEDED --> $Db = mysql_select_db(DATABASE, CONN) or die(mysql_error());

define("COPYRIGHT",     "");

require_once dirname(__FILE__).'/class.global.php';
/*
require "class.users.php";
require "PHPExcel/PHPExcel.php";
*/
class MainClass
{
	public function MainClass()
	{
		$this->GlobalClass = new GlobalClass();
        
		return true;
	}
}

$MainClass = new MainClass();
?>