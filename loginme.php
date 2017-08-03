<?php
readfile('headers.php');
$isLog=false;
if (isset($_COOKIE['messengerUname'])) { 

$isLog=true;
$usern=$_COOKIE['messengerUname'];


}



readfile('headers.php');
var_dump($COOKIE['cookie']);
?>

<div class="jumbotron info " style="color:white;background:dimgray;text-align:center;position:relative;width:100%;">


<h1>Log In</h1>
        <form action="login.php" method="POST">

<div style="color:black;">

        <p>Username</p><input type ="text" value="Troll" name="username"/>
        <p>password</p><input type="password" name="password" value="Cave" />
        <br /><br>
        <input type="submit" class="btn btn-danger btn-lg" value="login"/>
</div>

        </form>


</div>


