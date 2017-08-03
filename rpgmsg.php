<?php



readfile('headers.php');

if (isset($_COOKIE['messengerUname'])){

$user = $_COOKIE['messengerUname'];
$adventure = $COOKIE['adventure'];
/*
setcookie('messengerUname',$user,false,"/","http:/127.0.0.1");
*/

//print_r($_COOKIE);

echo "<script>document.cookie='messengerUname=".$user."'+';adventure=".$adventure."'</script>";
}


?>

<link rel="stylesheet" href="msgstyle1.css" />







    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        


<script src="R-pgmsg.js"></script>


       
<script src="script.js"></script>

<script src="diceApp.js"></script>


	<title>Messenger</title>
	<style type="text/css">
	</style>
</head>
<body onload="R.checkcookie(); R.update();R.scrollDown();R.setrecipients();R.init();">





<div style="width:100%">
<div id="whitebg"></div>
<div id="loginbox">
<h1>Pick a username:</h1>
<p><input type="text" name="pickusername" id="cusername" placeholder="input character name" class="inputfield"></p>
<p class="buttonp"><button onclick="R.inputCharName()" class="buttonp">Choose Character Name</button></p>
</div>









<div class="msg-container">
	<div class="msg-area" id="msg-area">
</div>
	<div class="msg-area" id="msg-area-just-send">
</div>





    <div class="header" id="bttm"></div>



	<div id="bottompanel" class="bottom">

<div class="colrev">


<div id='MGdrpup' class='menu colrev'>

<div id='optionsContainer' class="colrev">
<div id='log' style="font-size:9"></div>
<div class='flxrow'>
<button onclick="B.log('roll then')" class="rnd">⚅req</button>
<button onclick="R.inputCharName(B.nxtInnTxt('currentCharacter',R.chrs,-1));" class="sml rnd"></button>
<button onclick="R.inputCharName(B.nxtInnTxt('currentCharacter',charactersArray,charactersArray.length));" class="sml rnd"></button>
<button onclick="R.inputCharName(B.nxtInnTxt('currentCharacter',charactersArray));" class="sml rnd"></button>
</div>

<div id="currentCharacter" class="colrev MGstory"
>MG</div>



</div>

<div id='sramka'></div>
<div id='itemsContainer' class="colrev MGstory">item1:dhdjsjsns<br>item2:brrndndjdjdjd<br>item1:dhdjsjsns<br>item2:brrndndjdjdjd<br></div>




<div class='flxrow'>
<div>
<button onclick="R.to=B.nxtInnTxt('sendmsg',R.rcps,-1,'prv');" class="rnd"><</button>

<button id="privsel" onclick="R.mode=B.nxtInnTxt(['sendmsg',this],['prv','pub']);" class="rnd">prv</button>

<button onclick="R.to=B.nxtInnTxt('sendmsg',R.rcps,1,'prv');" class="rnd">></button>
</div>

<button onclick="B.nxtInnTxt(this,['✕⚅','≡⚅']);B.toggle(diceApp.diceContainer)" class="rnd">≡⚅</button>


<button onclick="B.log(this.innerText+'\n\ngetting your character sheet from database...','log')" class="rnd">stats</button>
<button onclick="B.nxtInnTxt(this,['✕','≡']);B.toggle('itemsContainer');B.log(this.innerText+'\n\ngetting your items from database...','log');" class="rnd">≡</button>

<button id="optionsbtn" onclick="B.nxtInnTxt(this,['✕','']);B.toggle('optionsContainer')" class="sml"></button>
</div>
</div>



<div>


</div>
<div class="msginput flxrow" style="justify-content:space-around;">

<button id="mainbtn" onclick="B.nxtInnTxt(this,['✕','≡']);B.toggle('MGdrpup')" class="sml">≡</button>

<textarea 
type="text" 
name="msginput" 
class="inputfield" 
id="msginput" 
value="" 
placeholder="Enter your message here ...">
</textarea>
<button id="sendmsg" onclick="R.sendmsg(B.Id('msginput'));B.log('send param:'+[R.mode,R.to],'log');" class="sml"></button>


</div>
</div>
</div>
</div>
</div>
</body>
<script src="script.js"></script>
</html>
