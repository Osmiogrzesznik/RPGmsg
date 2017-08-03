<?php


/*

function getHighestID($dbname,) {
final String MY_QUERY = "SELECT MAX(_id) FROM " + $dbname;
Cursor cur = mDb.rawQuery(MY_QUERY, null);
cur.moveToFirst();
int ID = cur.getInt(0);
cur.close();
return ID;
}   */


$db = new SQLite3('msgApp') or die('Unable to open database');




$username = stripslashes(htmlspecialchars($_GET['username']));
//while($userLastId<100){
//$userLastId++;

$userLastId = $_GET['lastId'];








$dbLastId = $db->query('SELECT MAX(id) FROM messages');
$dbLastId = $dbLastId->fetchArray();



$isit= boolval(((int)$dbLastId[0] > (int)$userLastId));
//var_dump($dbLastId);

    echo $dbLastId[0];
    echo ",".$userLastId;
    echo ",".$isit.",";
    
    
if ($isit){




echo "updated`^";

$result = $db->query("SELECT * FROM messages WHERE id > '$userLastId'") or die('Query failed');
while ($r = $result->fetchArray()) {
	echo $r[1];
	echo "|:|";
	echo $r[2];
    echo " Id:(";
    echo $r[0];
    echo ")";
	echo "`^";
} //endof While loop
} //endof if isit

//echo"<br> <br> <br> ";
//} //endof while test loop


?>