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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="bootstrap.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="style.css" type="text/css" media="screen" />




       
<script src="script.js"></script>

<script src="diceApp.js"></script>


	<title>Messenger</title>
	<style type="text/css">

 @font-face { font-family:FontAwesome ; src: url('FontAwesome.ttf'); } 


	html {
        margin:0;
        padding:0;
	}
	body {
		margin: 0px;
        margin-bottom:120px;
		padding: 0px;
		font-family: FontAwesome,Helvetica, Arial, Sans-serif;
		font-size: 14px;
          background-color:#777;
	}
	.msg-container {
		width: 100%;
		height: 100%;
        margin-bottom:120px;
	}
	.header {
		width: 100%;
		height: 200px;
		text-align: center;
		padding: 15px 0px 5px;
		font-size: 20px;
		font-weight: normal;
          background-color:#777;
	}
	.msg-area {
		height: calc(100% - 102px);
		width: 100%;
		background-color:#777;
		overflow-y: scroll;
	}

	.msginput {
          justify-content:space-around;
		padding: 5px;
		font-size: 14px;
		width:95%;
		outline: none;
          border:none;
          margin:0px;
	}

.inputfield{
          margin:5px;
		padding: 5px;
		font-size: 14px;
		outline: none;
          border:1px black;
          flex-shrink:.5;
          flex-basis:60%;
          flex-grow:1;      
}

.bottom{
		width: 100%;
          padding:20px auto;
		z-index: 1000;
		position: fixed;
		bottom: 0px ;
		border-top: 1px solid #CCC;
		background-color: #aaa;
}

.menu{
    display:flex;
padding: 5px;
		width: 100%;
		border: 2px solid #000;
		background-color: #888;
		position: relative;
        top:0px;
		z-index: 900;
justify-content:space-between;
}
   

.flxrow{
display:flex;
flex-direction:row;
align-items:center;
}

.colrev{
padding:4px;
display:flex;
flex-direction:column;
justify-content:flex-start;
}

	
	#whitebg {
		width: 100%;
		height: 10000%;
		background-color: #000;
		overflow-y: scroll;
		opacity: 0.6;
		display: none;
		position: absolute;
		top: 0px;
		z-index: 1000;
	}

	#loginbox {
          display:flex;
          flex-direction:column-reverse;
          justify-content:flex-start;
          text-align:center;
		width: 100%;
          padding:2em;
		border: 1px solid #AAA;
		background-color: #CCC;
		position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
		z-index: 1001;
	}

	h1 {
		padding: 0px;
		margin: 20px 0px 0px 0px;
		text-align: center;
		font-weight: normal;
	}

	button {
		background-color: #43ACEC;
		border: none;
          border-radius:5px;
		color: #FFF;
          margin: 0px auto;
		font-size: 16px;
	}

     .rnd{
     border-radius:5px;
     padding:5px;
     background-color: #4344ac;
     }

     .sml{
     font-size: 20px;
     font-family: FontAwesome;
     margin: 0px ;
     align-self:center;
     padding:5px;
     text-align:center;
     }

	.buttonp {
		width: 150px;
		margin: 0px auto;
        
		
	}
	.msg {
		margin: 15px 10px;
		background-color: #f1f0f0;
		max-width: calc(100% - 20px);
		color: #000;
		padding: 10px;
		font-size: 14px;
         border-radius:10px;
         word-break:normal;
         word-wrap:break-word;
         text-align:left;
         position:relative;
         float:left;
	}


	.msgfrom {
        float:right;
        max-width: calc(100% - 20px);
		background-color: #0084ff;
		color: #FFF;
		//margin: 10px 10px ;
        text-align:right;
	}
	.msg::after {
        content:"";
        display:block;
        position:absolute;
		width: 0;
		height: 0;
		border-left: 8px solid transparent;
		border-right: 8px solid transparent;
		border-bottom: 8px solid #f1f0f0;
		transform: rotate(315deg);
		margin: 8px 0px 0px 5px;
        
	}
	.msgfrom::after {
        content:"";
        display:block;
        position:absolute;
		border-bottom: 8px solid #0084ff;
        transform: rotate(45deg);
		//float: right;
        right:15px
	
	}
	.msgsentby {
		color: #ffffff;
		font-size: 12px;
		margin: -5px 0px 0px 1px;
	}
	.msgsentbyfrom {
		position:absolute;
        right:0px;
		margin: -5px 20px 0px ;
	}
    input{
    margin:0;
    }
   

    .MGstory{
    color:black;
    margin:10px 10px;
    background-color: #777777;
    }
	</style>
</head>
<body onload="checkcookie(); update();scrollDown();setrecipients();">





<div style="width:100%">
<div id="whitebg"></div>
<div id="loginbox">
<h1>Pick a username:</h1>
<p><input type="text" name="pickusername" id="cusername" placeholder="Pick a username" class="inputfield"></p>
<p class="buttonp"><button onclick="chooseusername()" class="buttonp">Choose Username</button></p>
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
<button onclick="B.log('no " class="rnd">⚅req</button>
<button onclick="chooseusername(B.nxtInnTxt('currentCharacter',charactersArray,-1));" class="sml rnd"></button>
<button onclick="chooseusername(B.nxtInnTxt('currentCharacter',charactersArray,charactersArray.length));" class="sml rnd"></button>
<button onclick="chooseusername(B.nxtInnTxt('currentCharacter',charactersArray));" class="sml rnd"></button>
</div>

<div id="currentCharacter" class="colrev MGstory"
>MG</div>



</div>

<div id='sramka'></div>
<div id='itemsContainer' class="colrev MGstory">item1:dhdjsjsns<br>item2:brrndndjdjdjd<br>item1:dhdjsjsns<br>item2:brrndndjdjdjd<br></div>




<div class='flxrow'>
<div>
<button onclick="rpgmsg.to=B.nxtInnTxt('sendmsg',rpgmsg.rcp,-1,'prv');rpgmsg.mode='prv'" class="rnd"><</button>

<button id="privsel" onclick="rpgmsg.mode=B.nxtInnTxt(['sendmsg',this],['prv','pub']);[0]" class="rnd">prv</button>

<button onclick="rpgmsg.to=B.nxtInnTxt('sendmsg',rpgmsg.rcp,1,'prv');" class="rnd">></button>
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
<button id="sendmsg" onclick="sendmsg(B.Id('msginput'));B.log('send param:'+[rpgmsg.mode,rpgmsg.to],'log');" class="sml"></button>


</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
var
charactersArray=['MG','Troll','Goblin','villager1','villager2','Lord Mykkerse'],
lastId=0,
nickMG="MG",
players=["Troll","Goblin","Jorna"],
rpgmsg={
mode:'pub',
to:"MG",
};
B.set("log","log")



function setrecipients(){
 if (checkcookie()){
rpgmsg.rcp = 
getcookie("messengerUname")==nickMG ?
players:[nickMG];}

}


var msginput = B.Id("msginput");
var msgarea = B.Id("msg-area");
var msgareajustsend = B.Id("msg-area-just-send");






//To przesuniesz potem do Loginu, do Tworzenia Postaci ale pamietaj , MG tu ma prawo wyboru postaci
function chooseusername(charactername) {
    let un =B.Id("cusername").value || charactername;
    if (un.length<2 || un.match(/\s\s+/g)) {alert("invalid name - no blank or subsequent spaces please");
           return;}
	var user = un;
	document.cookie="messengerUname=" + user;
	checkcookie();
    setrecipients();
}
function showlogin() {
	B.Id("whitebg").style.display = "inline-block";
	B.Id("loginbox").style.display = "inline-block";
}
function hideLogin() {
	B.Id("whitebg").style.display = "none";
	B.Id("loginbox").style.display = "none";
}

function checkcookie() {
B.log(document.cookie,"log")
	if (document.cookie.indexOf("messengerUname") == -1) {
         alert("no username");
         outp=false;
		showlogin();
	} else {
         
		hideLogin();
         outp=true;
	}
return outp;
}

function scrollDown(){


var objDiv = B.Id("bttm");
objDiv.scrollTop = objDiv.scrollHeight;
      
window.scrollTo(0,document.body.scrollHeight);
}

function getcookie(cname) {
    var name = cname;
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length+1,c.length);
    }
    return "";
}
function escapehtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}
function update() {
	var xmlhttp=new XMLHttpRequest();
	var username = getcookie("messengerUname");
	var output = "";
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                 if (xmlhttp.responseText==="up to date")return;

var response =xmlhttp.responseText

response=escapehtml(response);
response = response.replace(/!n!/g, '<br>' ).split("`^");


let headInfo= response.shift().split(",");

window.lastId=headInfo[0]=="" ? 0:headInfo[0];
B.log(lastId,"log");

B.log(headInfo,"log",true);


if (headInfo[2]!="1")return;

 
      
				var rl = response.length
				var item = "";
				for (var i = 0; i < rl; i++) {
					item = response[i].split("|:|")
	if (item[1] != undefined) {


if (item[0] == nickMG){
output += "<div class=\"MGcontainer\"><div class=\"msgc\" style=\"margin-bottom: 0px;\"> <div class=\"MGstory\">" + item[1] + "</div></div> " + item[0] + "</div>";

} else if (item[0] == username) {
							output += "<div class=\"colrev\"><div class=\"msgc\" style=\"margin-bottom: 0px;\"> <div class=\"msg msgfrom\">" + item[1] + "</div></div><div class=\"msgsentby msgsentbyfrom\">Says " + item[0] + "</div></div>";
} else {
							output += "<div class=\"colrev\"><div class=\"msgc\"> <div class=\"msg\">" + item[1] + "</div></div> <div class=\"msgsentby\">Says " + item[0] + "</div> </div>";
						}
					}
				}
    msgareajustsend.innerHTML="";
	msgarea.innerHTML += output;
	msgarea.scrollTop = msgarea.scrollHeight;
scrollDown();
			}
		}
	      xmlhttp.open("GET","get-messages.php?username=" + username+"&lastId="+lastId,true);

/*xmlhttp.open("GET","get-messages.php?username=" + username,true); OLD
*
*
*
*first you have to modify php
*
*to send last message id of messages table back
*
*/

	      xmlhttp.send();
}
function sendmsg(elem) {
	var message = msginput.value || elem.value;
 B.log(message+"\n input","log");
	if (message !== "") {
		//alert(msginput.value)
		//alert(getcookie("messengerUname"))
		var username = getcookie("messengerUname");
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
var response = xmlhttp.responseText
alert(response);


  message = escapehtml(message);
  messagedispl = message.replace(/!n!/g,' <br>');

 B.log(messagedispl+"\n displaying",log);

				msgareajustsend.innerHTML +=  "<div class=\"colrev\"><div class=\"msgc\" style=\"margin-bottom: 30px;\"> <div class=\"msg msgfrom\">" + messagedispl + "</div></div><div class=\"msgsentby msgsentbyfrom\">Says " + username + "</div></div>";
				msginput.value = "";
			}
		}
		message = message.replace(/\n/g,'!n!');
         B.log(message+"\n sending","log");
	      xmlhttp.open("GET","update-messages.php?username=" + username + "&message=" + message,true);
	      xmlhttp.send();
       elem.blur();   
  	}
}



/*
setInterval(function(){sendmsg({value:"automsg"})}, 4000);*/

setInterval(function(){update()}, 2500);
</script>
</body>
</html>
