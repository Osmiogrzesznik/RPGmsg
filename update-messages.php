<?php

$db = new SQLite3('msgApp') or die('Unable to open database');

/*
$db = new mysqli("localhost", "", "", "");
if ($db->connect_error) {
	die("Sorry, there was a problem connecting to our database.");
}
*/
echo var_dump($_GET);

$username = stripslashes(htmlspecialchars($_GET['username']));

$message = stripslashes(htmlspecialchars($_GET['message']));
if ($message == "" || $username == "") {
	echo "nic";
}



$query = <<<EOD
  INSERT INTO messages (username, message) VALUES('$username', '$message')
EOD;
$db->exec($query) or die('something wrong');


/*

$result = $db->prepare("INSERT INTO messages VALUES('',?,?)");
$result->bind_param("ss", $username, $message);
$result->execute();
*/


?>