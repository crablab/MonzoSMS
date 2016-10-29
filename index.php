<?php

echo "This will be a fancy landing page. Visit /api for useful functions";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Monzo SMS</title>
</head>
<body>
	<form method="post" action="api/register.php">
		<input name="name" type="text" placeholder="Your name" required />
		<input name="phone" type="phone" placeholder="Your phone number and country code ie. +44xxxxxxx" required />
		<input name="email" type="email" placeholder="The email you use to login to Monzo" required />
		<input type="submit" value="Sign up and login to Monzo" />
	</form>
</body>
</html>