window.addEventListener('load', function(e) {

B.onOff('bottompanel');
B.onOff(document.body);




//diceApp.mergeInCustomData();
let srm = B.Id("sramka")

B.onOff("sramka")
B.onOff('optionsContainer');
B.onOff('MGdrpup');
B.onOff('itemsContainer');
diceApp.init({options:{language:"pl"}});
diceApp.createDicesIn(srm,{20:20})

B.onOff('bottompanel');
B.onOff(document.body);

}, false);






