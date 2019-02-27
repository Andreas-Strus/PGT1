<?php
echo '<!DOCTYPE HTML>
	<html lang="en">
	<HEAD>	
		<title>Task 1 Panda Group</title>
		<meta charset="UTF-8"/>
		<meta name="author" content="Andreas Struś"/>
		<meta name="description" content="First recrutation task for Panda Group"/>
		<meta name="keywords" content="HTML,PHP,JavaScript,MySQL"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text\css" href="\task1.css"/>

	</HEAD>
	<BODY>
		<HEADER>
		<H1>First Task</H1>
		</HEADER>';
if(isset($_SESSION["user_ID"])){
	echo '<form method="post" action="index.php?task=login&action=logout" ><input type="submit" class="logout-buttno" value = "Logout"/></form>
	<form method="post" action="index.php?task=news&action=add" ><input type="submit" value = "Add News"/></form>';
}
else{
	echo '<form method="post" action="index.php?task=login&action=login" ><input type="submit"  value = "LOGIN"></form>
		<form method="post" action="index.php?task=login&action=register" ><input type ="submit"  value = "Register"></form>';
}
?>