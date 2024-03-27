<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Home Page">
  <meta name="keywords" content="HTML, Form, Elements">
  <meta name="author" content="Avery Porter">
  <title>Home Page</title>
 <link href="styles/style.css" rel="stylesheet">
</head>
<body class = "bg">

<?php include 'menu.inc';?> <!-- No header.inc file as the menu was the only thing in header -->

<h1>Welcome to DNS</h1> 

<fieldset> <!--Fieldsets are used as a design choice-->
<h2>Computer Systems Project</h2>
<p>
This website has been created to showcase HTML, CSS, PHP and MYSQL practical skills.
</p>

<h3>Assignment 2 Video - PHP and SQL</h3>
<a href="https://www.youtube.com/watch?v=Rp1qrmFL4Ak"> <img src="images/youtube.png" alt="Youtube Video" height="200" width="275"> </a>
<!--The youtube video is represented by a clickable image that will take you to youtube -->

<br><br>

<h3>Assignment 1 Video - DNS</h3>
<a href="https://www.youtube.com/watch?v=8yOr68XBZLw&list=PL-Z3RafkEnJWhXTkUczrbPACzBykTgVfD"> <img src="images/youtube.png" alt="Youtube Video" height="150" width="200"> </a>
<!--The youtube video is represented by a clickable image that will take you to youtube -->

</fieldset>

	<?php include 'footer.inc';?>
	
</body>	
</html>