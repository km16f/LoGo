<?php

include 'databasefactory.php';
include 'logoauth.php';
include 'usermanagement.php';

$users = new userManagement();

if(!isset($_GET['deviceID'])) {
	echo '<form action="registeruser.php" method="get">
		<input type="text" placeholder="Device ID" name="deviceID" /><input type="submit" value="Register" />
	</form>';
	return;
}

echo $users->registerUser($_GET['deviceID']);