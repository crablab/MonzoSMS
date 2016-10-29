<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("sitetools.php");

$_POST = array_map("htmlspecialchars", $_POST);

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])){

} else {
	throw new exception("You have not entered all the required information");
}

?>