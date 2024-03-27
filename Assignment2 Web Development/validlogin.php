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
	
<br><br>

<fieldset>

<?php
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db); 

$user = trim($_POST["user"]); 
$pass = trim($_POST["pass"]); 

if (!$conn) {
    echo "<p>Database connection failure</p>"; 
} else {
    $maxLoginAttempts = 3; // Maximum number of login attempts before timeout
    $loginTimeout = 3; // The lockout duration in minutes

    // Check the number of login attempts for a specific user
    $checkQuery = "SELECT COUNT(*) AS attempts FROM login_attempts WHERE username = '$user' AND timestamp > DATE_SUB(NOW(), INTERVAL $loginTimeout MINUTE)";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);
        $attempts = $row["attempts"]; // Get the number of login attempts

        if ($attempts >= $maxLoginAttempts) {
            echo "<h3 class=\"wrong\">Too many login attempts. Please try again in 3 minutes.</h3>"; 
            echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>";
            exit;
        }
    }

    // Check if the entered username and password match an administrator in the database
    $query = "SELECT username, password FROM administrators WHERE username = '$user' AND password = '$pass'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $resetQuery = "DELETE FROM login_attempts WHERE username = '$user'"; // Reset the login attempts for the successful user
            mysqli_query($conn, $resetQuery);

            session_start();
            $_SESSION["username"] = $user; // Store the username in a session variable
            header('Location: manage.php'); 
            exit;
        } else {
            $logQuery = "INSERT INTO login_attempts (username) VALUES ('$user')"; // Log the failed login attempt
            mysqli_query($conn, $logQuery);

            echo "<h3 class=\"wrong\"><br>Incorrect username or password. Please try again.</h3>"; 
            echo "<p><a class=\"link\" href=\"manage.php\">Return to Admin Page</a></p>";
        }
    } else {
        echo "Error: " . mysqli_error($conn); 
    }
}

mysqli_close($conn); 
?>
</fieldset>
</body>
</html>