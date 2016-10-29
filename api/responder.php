<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../sitetools.php");
$sitetools = new sitetools();
$db = $sitetools->connect();
use Twilio\Rest\Client;


if($_REQUEST['Body'] == "balance") {
	$reply = "Your balance is ";
} elseif($_REQUEST['Body'] == "today") {
	$reply = "You spent "; //. . " today";
} else {
	$reply = "Sorry I may not be able to help with that";
}

 header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Message><?php echo $reply ?></Message>
</Response>