<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../sitetools.php");
$sitetools = new sitetools();
$db = $sitetools->connect();
use Twilio\Rest\Client;


$user = $db->prepare("SELECT * FROM `Users` WHERE `Phone_Number` = :num");
$user->bindParam(":num", $_POST['From']);
$user->execute();
//get rows and data
$rows = $user->rowCount();
$data = $user->fetch(PDO::FETCH_ASSOC);
//ret
$id = $data['monzo_id'];
$num = $data['Phone_Number']
$token = $data['Authentication_Token'];

//if number exists
$from = $_POST('From');
if(1=1) {
	// Get cURL resource
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'https://api.monzo.com/balance',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'account_id' => $id,
			    )
			));
			curl_setopt($curl,CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $token]);

	$array = json_decode(curl_exec($curl), true);
	$body = $_REQUEST['Body'];
	if (stripos($body, 'balance') !== false) {
		$balance = $array['currency'];
		$reply = "Your balance is 45.14 GBP"; 
	} elseif(stripos($body, 'today') !== false) {
		$today =  abs($array['spend_today'])/100 . $array['currency'];
		$reply = "You spent 0.10 GBP today";
	} else {
		$reply = "Sorry I may not be able to help with that";
	}
} else {
	$reply = "Sorry this number is not registered";
}

	//header("content-type: text/xml");

	 echo "<Response>
		<Message>$reply</Message>
	</Response>";
?>