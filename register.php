<?php

readfile('headers.php');


$db = new SQLite3('logins') or die('Unable to open database');
$query = <<<EOD
CREATE TABLE IF NOT EXISTS 'users' ('Id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 'username' TEXT NOT NULL, 'password' TEXT NOT NULL) 
EOD;
$db->exec($query) or die('Create db failed');
$user = $_POST['username'];
$pass = $_POST['password'];
$query = <<<EOD
  INSERT INTO users ( username , password )
 VALUES ( '$user', '$pass' )
EOD;
$db->exec($query) or die("Unable to add user $user");
$result = $db->query('SELECT * FROM users') or die('Query failed');
while ($row = $result->fetchArray())
{
  echo "<br>Id: {$row['id']}\nUser: {$row['username']}\nPasswd: {$row['password']}\n";
}

echo"<br> REGISTER SUCCESFULL!!!<br>now you can <a href=\"loginme.php\">login</a>";


?>

</body>
</html>



