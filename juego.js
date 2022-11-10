
let userWord = "";
let line = 1;
const casellesFila = 5;
let rowPoints = 0;
wins = 0;
loses = 0;
tries = 0;
seg = 0;
min = 0;
cronoPoint = 0;
cronoSeg = 59;
cronoMin = 1;
boolGroot = true;
function addLetter(letter){
    flag=false;
	for (i=line;i<7;i++){
        for (j=1;j<6;j++){
            if(userWord.length==5){
                break
            }else{
                if(typeof document.getElementById('' + i + j).value != "string"){
                    document.getElementById('' + i + j).innerHTML=letter;
                    document.getElementById('' + i + j).value=letter;
                    userWord+=letter;
                    flag=true;
                    break
                }
            }
        }
        if (flag==true){
                break
        }
    }
}

function deleteLetter() {
    flag=false;
    flagLine=false;
	for (i=line;i<7;i++){
        for (j=1;j<6;j++){
            if(typeof document.getElementById('' + i + j).value != "string" && (i+j!=2)){
                if(j==1 && line==i-1){
                    document.getElementById('' + (i-1) + 5).value= undefined;
                    document.getElementById('' + (i-1) + 5).innerHTML = "";
                    userWord=userWord.substring(0,userWord.length-1);
                    flag=true;
                }else{
                    document.getElementById('' + i + (j-1)).value= undefined;
                    document.getElementById('' + i + (j-1)).innerHTML = "";
                    userWord=userWord.substring(0,userWord.length-1);
                    flag=true;
                }
                break
            } else if(''+i+j==65){
                document.getElementById('' + i + j).value= undefined;
                document.getElementById('' + i + j).innerHTML = "";
                userWord=userWord.substring(0,userWord.length-1);
                flag=true;
            }
            
        }
        if (flag==true){
            break
        }
    }
    
}

function jumpLine() {
    let points = document.forms["enviarForm"]["puntuacio"].value;
    let tries = document.forms["enviarForm"]["intents"].value;
    if(userWord.length==5){
        checkWord(php_var, points, tries);
        line+=1;
        userWord="";
        soundBadWord();
    }
}

function bloquejarBoton() {
    if(document.getElementById("inpUsuari").value==="") { 
        document.getElementById('botoUsuari').disabled = true; 
    } else { 
           document.getElementById('botoUsuari').disabled = false;  
    }
}

function checkWord(randWord, points, tries) {
    posNonRep = 0;
    countGreen = 0;
    rowPoints = 0;
    if(userWord == "GROOT" && boolGroot){
        boolGroot = false;
        var sonido = document.createElement("iframe");
        sonido.setAttribute("src","grootAudio.mp3");
        document.body.appendChild(sonido);
        document.getElementById("grootVideo").style.display="block";
        document.getElementById("contTeclat").style.display="none";
        setTimeout(function(){
            document.getElementById("grootVideo").style.display="none";
            document.getElementById("contTeclat").style.display="block";},42750);
    }
    for(i=1;i<userWord.length+1;i++){
        let letterPosition = randWord.indexOf(userWord[i-1]);
        if (letterPosition === -1) {
            document.getElementById('' + line + i).style.background = "rgb(117, 117, 117)";
            if(!(["rgb(67, 160, 71)","rgb(228, 168, 29)"].includes(document.getElementById(document.getElementById('' + line + i).value).style.backgroundColor))){
                document.getElementById(document.getElementById('' + line + i).value).style.background = "rgb(117, 117, 117)";
            }
            posNonRep+='' + i;
        } else {
            if(userWord[i-1] === randWord[i-1]){
                document.getElementById('' + line + i).style.background = "rgb(67, 160, 71)";
                document.getElementById(document.getElementById('' + line + i).value).style.background = "rgb(67, 160, 71)";
                posNonRep+='' + i;
                randWord = randWord.replace(randWord[letterPosition],"#");
                countGreen+=1;
                rowPoints+=((120-20*(line-1))/2)/casellesFila;
            }
        }    
    }
    for(i=1;i<userWord.length+1;i++){
        let letterPosition = randWord.indexOf(userWord[i-1]);
        if((posNonRep.toString()).includes(i)){

        }else{
            if (letterPosition === -1) {
                document.getElementById('' + line + i).style.background = "rgb(117, 117, 117)";
                if(!(["rgb(67, 160, 71)","rgb(228, 168, 29)"].includes(document.getElementById(document.getElementById('' + line + i).value).style.backgroundColor))){
                    document.getElementById(document.getElementById('' + line + i).value).style.background = "rgb(117, 117, 117)";
                }
            } else {
                document.getElementById('' + line + i).style.background = "rgb(228, 168, 29)";
                if(!(document.getElementById(document.getElementById('' + line + i).value).style.backgroundColor == "rgb(67, 160, 71)")){
                    document.getElementById(document.getElementById('' + line + i).value).style.background = "rgb(228, 168, 29)";
                }
                randWord = randWord.replace(randWord[letterPosition],"#");
                rowPoints+=((120-20*(line-1))/2)/(casellesFila*2);
            }  
        }  
    }
    
    if(countGreen==5){
        rowPoints = 120-20*(line-1);
        wins = parseInt(wins) + 1;
        points = parseInt(points) + rowPoints;
        tries = parseInt(tries) + 1;
        if (min >= 0 && min <= 1 & seg <= 1) {
            cronoPoint = cronoPoint + 50;
         }else if (min >= 1 && min <= 2 && seg <= 1 ) {
             cronoPoint = cronoPoint + 40;   
         }else if (min >= 2 && seg >= 1 && min <= 3) {
             cronoPoint = cronoPoint + 30;
         }else if (min >= 3 && seg >= 1 && min <= 4) {
             cronoPoint = cronoPoint + 20;
         }else if (min >= 4 && seg >= 1 && min <= 5 && seg <= 1) {
             cronoPoint = cronoPoint + 10;
         }else{
             cronoPoint;
         }
         finalPoints = cronoPoint + points;
        document.getElementById("puntuacio").setAttribute("value", finalPoints);
        document.getElementById("pointUser").innerHTML = "PUNTS: "+finalPoints;
        document.getElementById("intents").setAttribute("value", tries);
        document.getElementById("victories").setAttribute("value", wins);
        document.getElementById("derrotes").setAttribute("value", loses);
        document.getElementById("form").setAttribute("action", "boolean403win.php");
        document.getElementById("form").submit();
        var nodes = document.getElementById("contTeclat").getElementsByTagName('*');
        for(var i = 0; i < nodes.length; i++){
            nodes[i].disabled = true;
        }
        
        
    } else if(line==6){
        loses = parseInt(loses) + 1;
        points = parseInt(points) + rowPoints;
        tries = parseInt(tries) + 1;
        document.getElementById("puntuacio").setAttribute("value", points);
        document.getElementById("pointUser").innerHTML = "PUNTS: "+points;
        document.getElementById("intents").setAttribute("value", tries);
        document.getElementById("victories").setAttribute("value", wins);
        document.getElementById("derrotes").setAttribute("value", loses);
        document.getElementById("form").setAttribute("action", "boolean403lose.php");
        document.getElementById("form").submit();
        var nodes = document.getElementById("contTeclat").getElementsByTagName('*');
        for(var i = 0; i < nodes.length; i++){
            nodes[i].disabled = true;
        }
        
    } else {
        points = parseInt(points) + rowPoints;
        tries = parseInt(tries) + 1;

        document.getElementById("puntuacio").setAttribute("value", points);
        document.getElementById("pointUser").innerHTML = "PUNTS: "+points;
        document.getElementById("intents").setAttribute("value", tries);
        document.getElementById("victories").setAttribute("value", wins);
        document.getElementById("derrotes").setAttribute("value", loses);
        document.getElementById("form").setAttribute("onsubmit", "return false");
    }

}

function soundBadWord(){
	var sonido = document.createElement("iframe");
	sonido.setAttribute("src","bad_word.mp3");
	document.body.appendChild(sonido);
}
function soundYouLose(){
	var sonido = document.createElement("iframe");
	sonido.setAttribute("src","lose.mp3");
	document.body.appendChild(sonido);
}
function soundYouWin(){
	var sonido = document.createElement("iframe");
	sonido.setAttribute("src","win.mp3");
	document.body.appendChild(sonido);
}

function showReset() {
    document.getElementById('contReset').style.display = "block";
}

if ('true' === localStorage.isDark) {
    document.documentElement.classList.add('dark');
    
}
function toggleTheme() {
    document.documentElement.classList.toggle('dark');
    localStorage.isDark = ('true' !== localStorage.isDark);
}

function inicioCronometro() {
    control = setInterval(cronometro, 1000);
}

function cronometro() {
    seg += 1;
  
    if (seg == 60) {
        seg = 0;
      min += 1;
    }
  
    if (seg < 10 && min < 10) {
        document.getElementById('time').innerHTML = ("0" + min + ":" + "0" + seg);
      } else if (seg >= 10 && min < 10) {
        document.getElementById('time').innerHTML = ("0" + min + ":" + seg);
      } else if (seg < 10 && min > 10) {
        document.getElementById('time').innerHTML = (+min + ":" + "0" + seg);
      } else {
        document.getElementById('time').innerHTML = (min + ":" + seg);
      }
      
}

function iniciModoContra() {
    control = setInterval(modoCrono, 50);
}

function modoCrono() {
    cronoSeg -= 1;

    if (cronoSeg == 0){
        cronoSeg = 60;
        cronoMin -= 1;
    }

    if (cronoMin === -1) {
        clearInterval(control)
    }


    if (seg < 10 && min < 10) {
        document.getElementBy('cronoTime').innerHTML = ("0" + cronoMin + ":" + cronoSeg);
      } else if (cronoSeg >= 10 && cronoMin < 10) {
        document.getElementById('cronoTime').innerHTML = ("0" + cronoMin + ":" + cronoSeg);
      } else if (cronoSeg < 10 && cronoMin > 10) {
        document.getElementById('cronoTime').innerHTML = (+cronoMin + ":" + cronoSeg);
      } else {
        document.getElementById('cronoTime').innerHTML = (cronoMin + ":" + cronoSeg);
      }
}