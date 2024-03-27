<!DOCTYPE html>
<html lang="en">
<head>
<meta chatset="utf-8"/>
<meta name="description" content="Quiz Results">
<meta name="keywords" content="PHP, MySQL">
  <meta name="author" content="Avery Porter">

<title>Quiz Results Page</title>
<link href="styles/style.css" rel="stylesheet">
</head>
<body class = "bg">

<?php include 'menu.inc';?> <!-- No header.inc file as the menu was the only thing in header -->

<h1>Quiz Results</h1>

<fieldset>
<?php
require_once("settings.php");

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn = mysqli_connect(
	$host, 
	$user, 
	$pwd, 
	$sql_db
);

if (!$conn) {
    die("<p>Database connection failure</p>");
}

$query = "CREATE TABLE IF NOT EXISTS quiz_table (
    attemptid INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    studentid INT NOT NULL,
    attemptnum INT NOT NULL,
    score FLOAT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	)";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("<p class=\"wrong\">Something is wrong with the query: " . mysqli_error($conn) . "</p>");
}

$correctAnswers = [
    'Question1' => 'Correct',
    'Question2' => 'Correct',
    'Question5' => 'Correct'
];

$score = 0;

foreach ($correctAnswers as $question => $correctAnswer) {
    if (isset($_POST[$question]) && $_POST[$question] === $correctAnswer) {
        $score++;
    }
}

$Question3 = trim($_POST["Question3"]);
$Question4 = trim($_POST["Question4"]);
$Question6 = trim($_POST["Question6"]);

if ($Question3 == 'The main function of DNS is a process in which a DNS Server is sent a domain name which is then converted into an IP address that is machine readable') {
    $score += 4;
} elseif ($Question3 == '') {
    $errors[] = "Please enter an answer for Question 3";
}

if ($Question4 == 'Correct') {
    $score += 2;
}

if ($Question6 == "53") {
    $score += 1;
}

$firstname = trim($_POST["firstname"]);
$lastname = trim($_POST["lastname"]);
$studentid = trim($_POST["studentid"]);
$attemptnum = 0;

$firstname = sanitizeInput($firstname);
$lastname = sanitizeInput($lastname);
$studentid = sanitizeInput($studentid);

$errors = [];

if ($score == 0) {
    $errors[] = "You got a Score of 0. Please try again";
}

if (empty($firstname) || empty($lastname) || empty($studentid)) {
    $errors[] = "Please fill in all the required fields.";
}

if (!preg_match('/^[A-Za-z\s\-]{1,30}$/', $firstname)) {
    $errors[] = "Invalid format for first name.";
}

if (!preg_match('/^[A-Za-z\s\-]{1,30}$/', $lastname)) {
    $errors[] = "Invalid format for last name.";
}

if (!preg_match('/^\d{7,10}$/', $studentid)) {
    $errors[] = "Invalid format for student ID. It should be 7 or 10 digits.";
}

if (count($errors) > 0) {
    echo "<p class=\"wrong\">Quiz submission invalid:</p>";
    echo "<ul class=\"wrong\">";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    exit;
}

$quiz_table = 'quiz_table';

$query = "SELECT studentid FROM quiz_table WHERE studentid = '$studentid'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("<p class=\"wrong\">Something is wrong with the query: " . mysqli_error($conn) . "</p>");
}

if (mysqli_num_rows($result) == 0) {
    $attemptnum = 1;

    $query = "INSERT INTO $quiz_table (firstname, lastname, studentid, attemptnum, score, timestamp) VALUES ('$firstname', '$lastname', '$studentid', '$attemptnum', '$score', NOW())";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("<p class=\"wrong\">Something is wrong with the query: " . mysqli_error($conn) . "</p>");
    }

    echo "<p class=\"ok\"><br>Your First Attempt has been recorded.<br></p>";

    $query = "SELECT attemptid, studentid, firstname, lastname, attemptnum, score, timestamp FROM quiz_table WHERE studentid = '$studentid' AND firstname = '$firstname' AND lastname = '$lastname' AND score = '$score' AND attemptnum = '$attemptnum'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("<p class=\"wrong\">Something is wrong with the query: " . mysqli_error($conn) . "</p>");
    }

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

    while ($row = mysqli_fetch_assoc($result)) {
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

    echo "</table>\n";
} elseif (mysqli_num_rows($result) == 1) {
    $attemptnum = 2;

    $query = "INSERT INTO $quiz_table (firstname, lastname, studentid, attemptnum, score, timestamp) VALUES ('$firstname', '$lastname', '$studentid', '$attemptnum', '$score', NOW())";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("<p class=\"wrong\">Something is wrong with the query: " . mysqli_error($conn) . "</p>");
    }

    echo "<p class=\"ok\"><br>Your Second Attempt has been recorded.</p>";

    $query = "SELECT attemptid, studentid, firstname, lastname, attemptnum, score, timestamp FROM quiz_table WHERE studentid = '$studentid' AND firstname = '$firstname' AND lastname = '$lastname' AND score = '$score' AND attemptnum = '$attemptnum'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("<p class=\"wrong\">Something is wrong with the query: " . mysqli_error($conn) . "</p>");
    }

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

    while ($row = mysqli_fetch_assoc($result)) {
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

    echo "</table>\n";
} elseif (mysqli_num_rows($result) == 2) {
    die("<p class=\"wrong\">User has already used two attempts.</p>");
}

if (count($errors) > 0) {
    echo "<p class=\"wrong\">Quiz submission invalid:</p>";
    echo "<ul class=\"wrong\">";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    exit;
}

if ($attemptnum == 1) {
    echo "<p class=\"ok\"><a href=\"quiz.php\">Click here</a> to have another attempt at the quiz.</p>";
}

mysqli_close($conn);
?>
</fieldset>

</body>
</html>