<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../sitetools.php");
$data = file_get_contents('php://input');

$sendgrid = new SendGrid('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');

$email = new SendGrid\Email();
		//ensure content is email saf
		$email
         	->addTo("winxp0922@gmail.com")
         	->setFrom('mail@crablab.xyz')
		->setFromName('TEST')
         	->setSubject("MONZO")
         	->setHtml($data);
		try {
        		$out = $sendgrid->send($email);
		} catch(\SendGrid\Exception $e) {
        		echo $e->getCode() . "\n";
        		foreach($e->getErrors() as $er) {
        		echo $er;
        		}
		}
?>