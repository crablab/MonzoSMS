<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../sitetools.php");
$sitetools = new sitetools();
$db = $sitetools->connect();
use Twilio\Rest\Client;
$user = $db->prepare("SELECT * FROM `Users` WHERE `Phone_Number` = :num");
$user->bindParam(":num", $_POST['phone']);
$user->execute();
$id = $user->fetch(PDO::FETCH_ASSOC)['monzo_id'];

// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'https://api.monzo.com/balance',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        account_id => $id,
		    )
		));
		curl_setopt($curl,CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . MONZO_ID]);

$array = json_decode(curl_exec($curl), true);


var_dump($array);

if($_REQUEST['Body'] == "balance") {
	$balance = abs($array['data']['balance'])/100 . $array['data']['currency'];
	$reply = "Your balance is $balance"; 
} elseif($_REQUEST['Body'] == "today") {
	$today =  abs($array['data']['spend_today'])/100 . $array['data']['currency'];
	$reply = "You spent $today today";
} else {
	$reply = "Sorry I may not be able to help with that";
}

// header("content-type: text/xml");

 echo "<Response>
	<Message>$reply</Message>
</Response>";
?>