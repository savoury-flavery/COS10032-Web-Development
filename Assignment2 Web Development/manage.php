<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Home Page">
  <meta name="keywords" content="PHP, Form, Elements">
  <meta name="author" content="Avery Porter">
  <title>Quiz Administration</title>
 <link href="styles/style.css" rel="stylesheet">
</head>
<body class = "bg">

<?php include 'menu.inc';?> <!-- No header.inc file as the menu was the only thing in header -->

<h1>Quiz Administrator</h1> 

<fieldset> 

<?php
session_start();

if (!isset($_SESSION["username"])) { //checks if the correct user details were added before providing access to the page
    header('Location: adminlogin.php');
    exit;
}
?>

<form method="post" action="quizresults.php"> 

		<h2>Please select an option:</h2>
			<input type="radio" name="choice" value="1" checked="checked">
			<label for="admin1">List all attempts - Sort by field:
			<select name="sort_field">
			<option value="attemptid">Attempt ID</option>
			<option value="timestamp">Date and Time</option>
			<option value="studentid">Student ID</option>
			<option value="firstname">First Name</option>
			<option value="lastname">Last Name</option>
			<option value="attemptnum">Attempt Number</option>
			<option value="score">Score</option>
			</select></label> <br><br>
			
			<input type="radio" name="choice" value="2">
			<label for="admin2">List all attempts for student with name/number: <input type="text" name="name_number" size="10" maxlength="30"/></label> <br><br>
			
			<input type="radio" name="choice" value="3">
			<label for="admin3">List all students who got 100% on their first attempt.</label> <br><br>
			
			<input type="radio" name="choice" value="4">
			<label for="admin4">List all students who got less than 50% on their last attempt.</label> <br><br>
			
			<input type="radio" name="choice" value="5">
			<label for="admin5">Delete all students with the student ID: <input type="text" name= "delete" size="10" maxlength="30"/></label> <br><br>
			
			<label> <input type="radio" name="choice" value="6" />Change the score for attempt 
			<select name="attempts"><option value="1">1</option>	<option value="2">2</option></select> 
			for the student with the ID: <input type="text" name= "change" size="10" maxlength="30"/> to the score of: 
			<input type="number" name="adminscore" min="0" max="10"> </label> <br><br>
		
<input type= "submit" value="Enter"/>
</fieldset>

<br><br>

<fieldset>
<button><a class="link" href="logout.php">Log Out of Administrator Portal</a></button>
</fieldset>

	<?php include 'footer.inc';?>
	
</body>	
</html>