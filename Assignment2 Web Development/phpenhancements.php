<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Quiz form page">
  <meta name="keywords" content="HTML, Form, Elements">
  <meta name="author" content="Avery Porter">
  <title>PHP Enhancements</title>
  <link href="styles/style.css" rel="stylesheet">

</head>
<body class = "bg">

<?php include 'menu.inc';?> 

<h1 id="top">PHP Enhancements used</h1> 


<fieldset>
<h2>The Enhancements Used</h2>
<p>There have been 3 Enhancements implemented using PHP and MySQL: <br>
<a href="#admins">Set Administrators</a><br>
<a href="#security">Log In Security</a><br>
<a href="#field">Field Selection</a><br>
</p>
</fieldset>

<br>

<fieldset>
<h2 id="admins">Set Administrators</h2>
<p>
There has been a MySQL database called Administrators set up to store a set of Administrators for Administrative access.
This code compares the Usernames and Passwords stored in the database to the ones entered by the user in the Administrator Login page.
If the username and password match to one stored in the database then the user will be logged in and redirected to manage.php.
</p>
<strong>What was needed to implement this enhacement includes:</strong>
<ul>
<li>adminlogin.php</li>
<li>validlogin.php</li>
<li>username</li>
<li>password</li>
</ul>
</fieldset>

<br>

<fieldset>
<h2 id="security">Log In Security</h2>
<p>This enhancement is placed so that if someone enters an incorrect username or password to log in to the Administrator screen
they will be given 3 chances to get it correct under the username entered before it locks the user out for 3 minute.
The lockout is set to reset after 3 minutes where the user will then get 3 more attempts. </p>

<strong>What was needed to implement this enhacement includes:</strong>
<ul>
<li>session_start</li>
<li>session_destroy</li>
<li>session_unset</li>
<li>adminlogin.php</li>
<li>logout.php</li>
<li>validlogin.php</li>
<li>login_attempts database</li>
<li>username</li>
<li>password</li>
<li>timestamp</li>
</ul>
</fieldset>

<br>

<fieldset>
<h2 id="field">Field Selection</h2>
<p>
There is a field selection option when the Administrator chooses to list all quiz attempts. By default it is set to Attempt ID,
however the user can select any of the fields of the table and it will then produce the table in ascending order according to that selection.

</p>
<strong>What was needed to implement this enhacement includes:</strong>
<ul>
<li>option</li>
<li>switch/case</li>
<li>sort_field</li>
<li>ORDER</li>
</ul>
<br>
<a href="#top">Back to Top</a>
</fieldset>

<br>

	<?php include 'footer.inc';?>
	
</body>	
</html>