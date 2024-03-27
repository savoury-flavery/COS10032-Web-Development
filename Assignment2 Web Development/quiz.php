<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Quiz Page">
  <meta name="keywords" content="HTML, Form, Elements, Radio, Text, Option">
  <meta name="author" content="Avery Porter">
  <title>Quiz Page</title>
  <link href="styles/style.css" rel="stylesheet">
  <link href="styles/timer.css" rel="stylesheet"> <!-- Individual style sheet used for the timer enhancement-->
  
</head>

<body class = "bg">

<?php include 'menu.inc';?> <!-- No header.inc file as the menu was the only thing in header -->

<h1>Pop Quiz!</h1> 

<form id="quiz" method="post" action="markquiz.php"> <!--Allows us to check the submission works/eventual backend work-->

	<fieldset>
		<legend>Your Details</legend> <br>
			<label for="studentid"><strong>Student ID:*</strong></label>
			<input type="text" id="studentid" name="studentid" size="10" maxlength="10" required="required"><br><br>
			<label for="firstname"><strong>First Name:*</strong></label>
			<input type="text" id="firstname" name="firstname" size="15" maxlength="30" required="required">
			<label for="lastname"><strong>Last Name:*</strong></label>
			<input type="text" id="lastname" name="lastname" size="15" maxlength="30" required="required"><br>
			<p>*Required Details</p>
	</fieldset>
	<br>
	<fieldset>
		<legend>What You've Learnt</legend>
		
		<p><label for="DNSName"><strong>What does DNS stand for? (1 point)</strong></label> 
			<select name="Question1" id="DNSName" required="required">
			<option value="">Please Select</option>	
			<option value="Correct">Domain Name System</option>			
			<option value="Correct">Domain Name Server</option>
			<option value="Incorrect">Dynamic Naming System</option>
			<option value="Incorrect">Do Not Select</option>
			</select>
		</p>
			
		<p><strong>Who created DNS and when? (1 point)</strong></p>
			<input type="radio" id="PaulMockapetris" name="Question2" value="Correct" required="required">
			<label for="PaulMockapetris">Paul Mockapetris in the 1980s</label>
			<input type="radio" id="PaulMockingbird" name="Question2" value="Incorrect">
			<label for="PaulMockingbird">Paul Mockingbird in the 1980s</label>
			<input type="radio" id="PaulMockapettis" name="Question2" value="Incorrect">
			<label for="PaulMockapettis">Paul Mockapettis in the 1990s</label>
		
			
			<p><label for="describe"><strong>Describe the main function of DNS (4 points):</strong></label><br>
					<textarea id="describe" name="Question3" rows="4" cols="40" placeholder="Please enter your answer here..." required="required"></textarea>
			</p>
			
			<p><strong>Who are the main organisations for protecting and maintaining DNS?(2 points)</strong> </p>
			
				<input type="checkbox" id="IANA" name="Question4" value="Incorrect">
				<label for="IANA">IANA</label>
				<input type="checkbox" id="ICANN" name="Question4" value="Correct">
				<label for="ICANN">ICANN</label>
				<input type="checkbox" id="ARIN" name="Question4" value="Incorrect">
				<label for="ARIN">ARIN</label>
				<input type="checkbox" id="RIPENCC" name="Question4" value="Incorrect">
				<label for="RIPENCC">RIPE NCC</label>
				<input type="checkbox" id="IETF" name="Question4" value="Correct">
				<label for="IETF">IETF</label> <br>
			
			<p><strong>Which server is used as a backup DNS server? (1 point)</strong></p>
			<input type="radio" id="prim" name="Question5" value="Incorrect" required="required">
			<label for="prim">Primary Server</label>
			<input type="radio" id="sec" name="Question5" value="Correct">
			<label for="sec">Secondary Server</label>
			<input type="radio" id="cache" name="Question5" value="Incorrect">
			<label for="cache">Cache Server</label>
			<input type="radio" id="no" name="Question5" value="Incorrect">
			<label for="no">None of the Above</label> <br><br>
			
			<label for="portnumber"><strong>Which port is DNS implemented through? (1 point)</strong> (between 50-59)</label>
			<input type="number" id="portnumber" name="Question6" min="50" max="59" required="required">
			<br><br>

			<input type="button" id="button" onclick="alert('The main function of DNS is a process in which a DNS Server is sent a domain name which is then converted into an IP address that is machine readable')" value="Press for Hint!">
			<!--This button is to showcase more html input types in a fun way-->
		
	<p class="timer">Try to beat the timer! 
	<br>*refresh the page to restart the timer*</p>
	<div></div> <!--This div allows the timer to function (timer.css)-->
	
	</fieldset>
	<br>
	<input type="submit" id="submit" value="Submit Answers">
	<input type="reset" id="reset" value="Clear Answers">
	</form>
	<br><br>
	
	<?php include 'footer.inc';?>
	
</body>	
</html>