<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Quiz Page">
  <meta name="keywords" content="HTML, Form, Elements, Radio, Text, Option">
  <meta name="author" content="Avery Porter">
  <title>Quiz Page</title>
  <link href="styles/style.css" rel="stylesheet">
</head>

<body class = "bg">

<?php include 'menu.inc';?> <!-- No header.inc file as the menu was the only thing in header -->

<h1>Quiz Results (Admin View)</h1> 

<fieldset>
<?php

	require_once ("settings.php");

	$conn = @mysqli_connect ($host,
	$user,
	$pwd,
	$sql_db
	);

	// Retrieve the input from the POST request
	$choice = trim($_POST["choice"]);
	$name_number = trim($_POST["name_number"]);
	$delete = trim($_POST["delete"]);
	$attempts = trim($_POST["attempts"]);
	$change = trim($_POST["change"]);
	$adminscore= trim($_POST["adminscore"]);
	$sort_field = trim($_POST["sort_field"]);

	if(!$conn) {
		echo "<p>Database connection failure</p>";
	} else {


		switch($choice) {
			case 1: 
				$query = "SELECT attemptid, firstname, lastname, studentid, attemptnum, score, timestamp FROM quiz_table ORDER BY $sort_field";
				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
					if(mysqli_num_rows($result)<=0){
						echo "<p>No results found.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}else{
						echo "<table border=\"1\">\n";
						echo "<tr>\n "
						. "<th scope=\"col\">Attempt ID</th>\n"
						. "<th scope=\"col\">Date and Time</th>\n"
						. "<th scope=\"col\">Student ID</th>\n"
						. "<th scope=\"col\">First Name</th>\n"
						. "<th scope=\"col\">Last Name</th>\n"
						. "<th scope=\"col\">Attempt Number</th>\n"
						. "<th scope=\"col\">Score</th>\n"
						. "</tr>\n ";
						while($row = mysqli_fetch_assoc($result))
						{
						    echo "<tr>\n";
							echo "<td>", $row["attemptid"], "</td>\n ";
							echo "<td>", $row["timestamp"], "</td>\n ";
							echo "<td>", $row["studentid"], "</td>\n ";
							echo "<td>", $row["firstname"], "</td>\n ";
							echo "<td>", $row["lastname"], "</td>\n ";
							echo "<td>", $row["attemptnum"], "</td>\n ";
							echo "<td>", $row["score"], "</td>\n ";
							echo "</tr>\n ";
							
							}
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
						}
						}
			break;

			case 2:
				$query = "SELECT attemptid, firstname, lastname, studentid, attemptnum, score, timestamp FROM quiz_table WHERE (firstname LIKE '$name_number' OR studentid LIKE '$name_number' )";
				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
					if(mysqli_num_rows($result)<=0){
						echo "<p>No results found.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}else{
						echo "<table border=\"1\">\n";
						echo "<tr>\n "
						. "<th scope=\"col\">Attempt ID</th>\n"
						. "<th scope=\"col\">Date and Time</th>\n"
						. "<th scope=\"col\">Student ID</th>\n"
						. "<th scope=\"col\">First Name</th>\n"
						. "<th scope=\"col\">Last Name</th>\n"
						. "<th scope=\"col\">Attempt Number</th>\n"
						. "<th scope=\"col\">Score</th>\n"
						. "</tr>\n ";
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>\n ";
							echo "<td>", $row["attemptid"], "</td>\n ";
							echo "<td>", $row["timestamp"], "</td>\n ";
							echo "<td>", $row["studentid"], "</td>\n ";
							echo "<td>", $row["firstname"], "</td>\n ";
							echo "<td>", $row["lastname"], "</td>\n ";
							echo "<td>", $row["attemptnum"], "</td>\n ";
							echo "<td>", $row["score"], "</td>\n ";
							echo "</tr>\n ";
							
							}
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
						}
					}

			break;

			case 3:
				$query = "SELECT attemptid, firstname, lastname, studentid, attemptnum, score, timestamp FROM quiz_table WHERE (score = 10 AND attemptnum = 1)";
				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
					if(mysqli_num_rows($result)<=0){
						echo "<p>No results found.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}else{
						echo "<table border=\"1\">\n";
						echo "<tr>\n "
						. "<th scope=\"col\">Attempt ID</th>\n"
						. "<th scope=\"col\">Date and Time</th>\n"
						. "<th scope=\"col\">Student ID</th>\n"
						. "<th scope=\"col\">First Name</th>\n"
						. "<th scope=\"col\">Last Name</th>\n"
						. "<th scope=\"col\">Attempt Number</th>\n"
						. "<th scope=\"col\">Score</th>\n"
						. "</tr>\n ";
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>\n ";
							echo "<td>", $row["attemptid"], "</td>\n ";
							echo "<td>", $row["timestamp"], "</td>\n ";
							echo "<td>", $row["studentid"], "</td>\n ";
							echo "<td>", $row["firstname"], "</td>\n ";
							echo "<td>", $row["lastname"], "</td>\n ";
							echo "<td>", $row["attemptnum"], "</td>\n ";
							echo "<td>", $row["score"], "</td>\n ";
							echo "</tr>\n ";
							
							}
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
						}
						}
			break;

			case 4:
				$query = "SELECT attemptid, firstname, lastname, studentid, attemptnum, score, timestamp FROM quiz_table WHERE (score < 5 AND attemptnum = 2)";
				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
					if(mysqli_num_rows($result)<=0){
						echo "<p>No results found.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}else{
						echo "<table border=\"1\">\n";
						echo "<tr>\n "
						. "<th scope=\"col\">Attempt ID</th>\n"
						. "<th scope=\"col\">Date and Time</th>\n"
						. "<th scope=\"col\">Student ID</th>\n"
						. "<th scope=\"col\">First Name</th>\n"
						. "<th scope=\"col\">Last Name</th>\n"
						. "<th scope=\"col\">Attempt Number</th>\n"
						. "<th scope=\"col\">Score</th>\n"
						. "</tr>\n ";

						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>\n ";
							echo "<td>", $row["attemptid"], "</td>\n ";
							echo "<td>", $row["timestamp"], "</td>\n ";
							echo "<td>", $row["studentid"], "</td>\n ";
							echo "<td>", $row["firstname"], "</td>\n ";
							echo "<td>", $row["lastname"], "</td>\n ";
							echo "<td>", $row["attemptnum"], "</td>\n ";
							echo "<td>", $row["score"], "</td>\n ";
							echo "</tr>\n ";
							
							}
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
						}
						}
			break;

			case 5:
				$query = "SELECT attemptid, firstname, lastname, studentid, attemptnum, score, timestamp FROM quiz_table WHERE (studentid = '$delete' )";
				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
					if(mysqli_num_rows($result)<=0){
						echo "<p>No results found.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}else{

				$query = "Delete FROM quiz_table WHERE (studentid = '$delete' )";

				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
						echo "<p>Student successfully removed.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}
				}
			}
					
			break;

			case 6:
				$query = "SELECT attemptid, firstname, lastname, studentid, attemptnum, score, timestamp FROM quiz_table WHERE (studentid = '$change' && attemptnum = '$attempts')";
				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
					if(mysqli_num_rows($result)<=0){
						echo "<p>No results found.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}else{
				$query = "Update quiz_table SET score = '$adminscore' WHERE (studentid = '$change' && attemptnum = '$attempts')";

				$result = mysqli_query($conn, $query);
	
				if(!$result) {
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else {
						echo "<p>Student score successfully changed.</p>";
						echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
					}
				}
			}

			break;
			
			default:
			echo "<p>ERROR</p>";
			echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>"; 
		  }
		}

		mysqli_close($conn);
		

?>
</fieldset>
	
	
</body>	
</html>