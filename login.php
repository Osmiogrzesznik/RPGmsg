<?php
include('helperfuncs.php');


if (isset($_COOKIE['cookie'])) {
        
        $cookArr = decookify($COOKIE['cookie']);
        var_dump($cookArr);

readfile('headers.php');
readfile('SUCCES.html');

    }




$db = new SQLite3('logins') or die('Unable to open database');
$query = <<<EOD
CREATE TABLE IF NOT EXISTS 'users' ('Id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 'username' TEXT NOT NULL, 'password' TEXT NOT NULL) 
EOD;
$db->exec($query) or die('Create db failed');
$user = $_POST['username'];//'Troll';
$pass = $_POST['password'];// 'Cave' ;
$query = <<<EOD
  SELECT * FROM users WHERE username = '$user'
EOD;

$result = $db->query($query) or die("Unable to find username $user");

$lpass=$result->fetchArray();



if ($lpass['password'] === $pass && $pass!= NULL)
{
$recipe = 
array ('id' => $lpass['Id'], 
       'messengerUname' => $user);
$cookified = cookify($recipe);
setcookie('cookie[cookie]','hej');
       
setcookie('cookie[cookie]',$cookified) or die("cookie not created");

//session_start();
//$_SESSION['nickname'] = $user;

readfile('headers.php');
/*echo"<script>window.addEventListener(\"load\",function(){sessionStorage.setItem('status','loggedIn') 
},false);</script>";*/
readfile('SUCCES.html');

}
else
{
readfile('headers.php');
readfile('FAILURE.html');
}

echo "you try to log in as :".$user."<br>";
echo $lpass['password']." stored <br>".$pass." yours <br>";
echo $lpass['Id']." your Id<br>"."<br>";
 $cookArr = decookify($COOKIE['cookie']);
        var_dump($cookArr);
var_dump($COOKIE['cookie']);

?>

</body>
</html>