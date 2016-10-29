<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../sitetools.php");
$sitetools = new sitetools();
$db = $sitetools->connect();

$_POST = array_map("htmlspecialchars", $_POST);

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])){
	$in = $db->prepare("INSERT INTO `Users` (`ID`, `Email`, `IP_address`, `Name`, `Phone_Number`, `Authentication_Token`) VALUES (:id, :e, :ip, :ph, :nm, null)");
	$id = uniqid();
	$ip = $_SERVER['REMOTE_ADDR'];
	$in->bindParam(":id", $id);
	$in->bindParam(":e", $_POST['email']);
	$in->bindParam(":ip", $ip);
	$in->bindParam(":ph", $_POST['phone']);
	$in->bindParam(":nm", $_POST['name']);
	$in->execute();
	
	$redirect_uri = "https://crablab.co.uk/mozno/MonzoSMS/api/add.php";
	header("location: https://auth.getmondo.co.uk/?client_id=" . MONZO_ID . "&redirect_uri=$redirect_uri&response_type=code&state=$id");
} else {
	throw new exception("You have not entered all the required information");
}

?>