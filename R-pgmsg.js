

//get adventure name from cookie, send ajax to get adventure data before ajax to messages

var msginput = B.Id("msginput");
var msgarea = B.Id("msg-area");
var msgareajustsend = B.Id("msg-area-just-send");


var
charactersArray=['MG','Troll','Goblin','villager1','villager2','Lord Mykkerse'],
lastId=0,
nickMG="MG",
players=["Troll","Goblin","Jorna"];




var
rpgmsg={
mode:'pub',
to:"MG",
};
B.set("log","log");


window.addEventListener('load',function(e){

console.log(JSON.stringify(R));
},false);


var R = {
debug:true,
remote:false,

remoteServerAddr:"http://www.produccio.x10host.com/",
dirs:{
updMsgDir:"update-messages.php",
getMsgDir:"get-messages.php",
getAdvtDir:"",
},



     vw:{
            mds:['pub','prv'],
            
     },
     
     advt:"",
     rcps:[],
     plrs:[],
     chrs:[],
     lastId:0,
     MG:"MG",

init:function(opt){
if (R.remote || opt.remote){pref=R.remoteServerAddr}
else{pref=""};
let dirs=R.dirs;
let keysarr = Object.keys(R.dirs),keyslg=keysarr.length;

for (i=0;i<keyslg;i++){
R[keysarr[i]] = pref+dirs[keysarr[i]];
console.log(R[keysarr[i]]);
}

},




     
checkcookie(){
B.log(document.cookie,"log")
	if (document.cookie.indexOf("messengerUname") == -1) {
         alert("no username");
         outp=false;
		R.showLogin();
//change to username input -it is not login
//,it is only for MG , to quickly create new character on-the-go;

	} else {
		R.hideLogin();
         outp=true;
	}
return outp;
},


setrecipients(){
 if (R.checkcookie()){
R.rcp = 
R.getcookie("messengerUname")==nickMG ?
players:[nickMG];}

},








//To przesuniesz potem do Loginu, do Tworzenia Postaci ale pamietaj , MG tu ma prawo wyboru postaci
inputCharName(charactername) {
    let un =B.Id("cusername").value || charactername;
    if (un.length<2 || un.match(/\s\s+/g)) {alert("invalid name - no blank or subsequent spaces please");
           return;}
	var user = un;
	document.cookie="messengerUname=" + user;
	R.checkcookie();
    R.setrecipients();
},
  
showLogin() {
	B.Id("whitebg").style.display = "inline-block";
	B.Id("loginbox").style.display = "inline-block";
},

hideLogin() {
	B.Id("whitebg").style.display = "none";
	B.Id("loginbox").style.display = "none";
},
  


  scrollDown(){
var objDiv = B.Id("bttm");
objDiv.scrollTop = objDiv.scrollHeight;
window.scrollTo(0,document.body.scrollHeight);
},

  getcookie(cname) {
    var name = cname;
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length+1,c.length);
    }
    return "";
},
  escapehtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
},




  update() {
	var xmlhttp=new XMLHttpRequest();
	var username = R.getcookie("messengerUname");
	var output = "";
		xmlhttp.onreadystatechange= function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                 if (xmlhttp.responseText==="up to date")return;

var response =xmlhttp.responseText

response=R.escapehtml(response);
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
     R.scrollDown();
			}
		}
	      xmlhttp.open("GET", R.getMsgDir + "?username=" + username+"&lastId="+lastId,true);

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
},



  sendmsg(elem) {
	var message = msginput.value || elem.value;
 B.log(message+"\n input","log");
	if (message !== "") {
		//alert(msginput.value)
		//alert(getcookie("messengerUname"))
		var username = R.getcookie("messengerUname");
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange= function() {
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
	      xmlhttp.open("GET", R.updMsgDir + "?username=" + username + "&message=" + message,true);
	      xmlhttp.send();
       elem.blur();   
  	}
},





}









/*
setInterval( (){R.sendmsg({value:"automsg"})}, 4000);*/

setInterval( function(){R.update()}, 2500);





