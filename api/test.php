<?php

$data = "kljhsdlsadlkjsad";

$this->sendgrid = new SendGrid('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');

$email = new SendGrid\Email();
		//ensure content is email saf
		$email
         	->addTo($emails)
         	->setFrom('mail@crablab.xyz')
		->setFromName('TEST')
         	->setSubject("MONZO")
         	->setHtml($out);
		try {
        		$out = $this->sendgrid->send($email);
		} catch(\SendGrid\Exception $e) {
        		echo $e->getCode() . "\n";
        		foreach($e->getErrors() as $er) {
        		echo $er;
        		}
		}
?>