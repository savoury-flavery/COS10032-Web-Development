<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Home Page">
  <meta name="keywords" content="PHP, Form, Elements">
  <meta name="author" content="Avery Porter">
  <title>Quiz Admin</title>
 <link href="styles/style.css" rel="stylesheet">
</head>
<body class = "bg">

<?php include 'menu.inc';?> <!-- No header.inc file as the menu was the only thing in header -->

<h1>Administrator Login</h1> 

<fieldset> 

	<form method="post" action="validlogin.php">
	
		<p class="row">	<label for="user">Username:</label>
			<input type="text" name="user"/></p>
		<p class="row">	<label for="pass">Password:</label>
			<input type="text" name="pass"/></p>

		<p>	<input type="submit" value="Log In" /></p>
	</form>
		
</fieldset>

	<?php include 'footer.inc';?>
	
</body>	
</html>