<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../sitetools.php");
$sitetools = new sitetools();
$db = $sitetools->connect();

if(!empty($_GET['code']) && !empty($_GET['state'])){
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'https://api.monzo.com/oauth2/token',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        grant_type => 'authorization_code',
		        client_id => MONZO_ID, 
		        client_secret => MONZO_SECRET, 
		        redirect_uri => 'https://crablab.co.uk/mozno/MonzoSMS/api/add.php',
		        code => $_POST['code']
		    )
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		$up = $db->prepare("UPDATE `users` SET `Authentication_Token` = :at WHERE `ID` = :id");
		$up->bindParam(":at", $resp['access_token']);
		$up->bindParam(":id", $_POST['state']);
		$up->execute();
	};