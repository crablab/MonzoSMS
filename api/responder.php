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

$json = file_get_contents(http https://api.monzo.com/balance"
    "Authorization: Bearer " . MONZO_ID . \
    "account_id==$id");
$array = json_decode($json, true);

if($_REQUEST['Body'] == "balace") {
	$balance = abs($array['data']['balance'])/100 . $array['data']['currency']
	$reply = "Your balance is $balance";
} elseif($_REQUEST['Body'] == "today") {
	$today =  abs($array['data']['spend_today'])/100 . $array['data']['currency']
	$reply = "You spent $today today";
} else {
	$reply = "Sorry I may not be able to help with that";
}

 header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Message><?php echo $reply ?></Message>
</Response>