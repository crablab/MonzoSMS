
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<title>Monzo SMS</title>
<style>
body { 
background-color: grey;
}

	#wrapper {    
    margin: 0 auto;
    width:1200px;
    height: 1150px;
    background-color:#f2f2f2;
    position: relative;
}
</style>
</head>
<body>
	<div id="wrapper">

<div class="container">
<h4>This will be a fancy landing page. Visit /api for useful functions</h4>
  <h2>Monzo SMS</h2>
  <p>Enter your details below</p>
  <form method="post" action="api/register.php">
    <div class="form-group">
      <label for="usr">Name:</label>
	<input name="name" type="text" class="form-control" placeholder="Your name" required id="usr">
    </div>
    <div class="form-group">
      <label for="abc">"Your phone number and country coide ie. +44xxxxxxxx":</label>
      <input name="phone" type="phone" class="form-control" placeholder="Phone number" required id="abc">
    </div>
    <div class="form-group">
      <label for="abc">"The email you use to login to Monzo":</label>
      <input name="email" type="email" class="form-control" placeholder="Email" required id="abc">
    </div>
    <div class="form-group">
      <input name="submit" type="submit" value="Sign up and login to Monzo!" class="form-control" id="pwd">
    </div>  
  </form>
</div>

</div>


</body>
</html>
