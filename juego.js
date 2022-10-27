//console.log(php_var);
let userWord = "";
let line = 1;
const casellesFila = 5;
let rowPoints = 0;
// let points = 0;
// let tries = 0;
//document.getElementById("pointUser").innerHTML = "PUNTS: "+points;
wins = 0;
loses = 0;
tries = 0;
function addLetter(letter){
    flag=false;
	for (i=line;i<7;i++){
        for (j=1;j<6;j++){
            if(userWord.length==5){
                break
            }else{
                if(typeof document.getElementById('' + i + j).value != "string"){
                    // console.log(document.getElementById('' + i + j).value);
                    // console.log(typeof document.getElementById('' + i + j).value)
                    document.getElementById('' + i + j).innerHTML=letter;
                    document.getElementById('' + i + j).value=letter;
                    userWord+=letter;
                    //console.log(userWord);
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
                    //console.log(userWord);
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
            // console.log(document.getElementById('' + i + (j-1)).value);
            // console.log(typeof document.getElementById('' + i + (j-1)).value)
            break
        }
    }
    
}

function jumpLine() {
    let points = document.forms["enviarForm"]["puntuacio"].value;
    let tries = document.forms["enviarForm"]["intents"].value;

    //console.log("mickey");
    //console.log(document.getElementById('rw').value);
    //console.log("mouse");
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
    //console.log(randWord)
    posNonRep = 0;
    countGreen = 0;
    rowPoints = 0;
    for(i=1;i<userWord.length+1;i++){
        let letterPosition = randWord.indexOf(userWord[i-1]);
        //console.log(letterPosition);
        if (letterPosition === -1) {
            document.getElementById('' + line + i).style.background = "grey";
            posNonRep+='' + i;
        } else {
            if(userWord[i-1] === randWord[i-1]){
                document.getElementById('' + line + i).style.background = "green";
                posNonRep+='' + i;
                randWord = randWord.replace(randWord[letterPosition],"#");
                countGreen+=1;
                rowPoints+=((120-20*(line-1))/2)/casellesFila;
                //console.log(randWord);
            }
        }    
    }
    for(i=1;i<userWord.length+1;i++){
        //console.log(posNonRep);
        let letterPosition = randWord.indexOf(userWord[i-1]);
        //console.log(letterPosition);
        //console.log(i);
        //console.log(posNonRep.includes(i));
        if(posNonRep.includes(i)){

        }else{
            if (letterPosition === -1) {
                document.getElementById('' + line + i).style.background = "grey";
            } else {
                document.getElementById('' + line + i).style.background = "yellow";
                randWord = randWord.replace(randWord[letterPosition],"#");
                rowPoints+=((120-20*(line-1))/2)/(casellesFila*2);
                //console.log(randWord);
            }  
        }  
    }
    
    if(countGreen==5){
        //setTimeout(function() { alert("HAS GUANYAT"); }, 100);
        setTimeout(function(){document.location.href="./win.php";},500)
        rowPoints = 120-20*(line-1);
        wins = parseInt(wins) + 1;
        var nodes = document.getElementById("contTeclat").getElementsByTagName('*');
        for(var i = 0; i < nodes.length; i++){
            nodes[i].disabled = true;
        }
        
        
    } else if(line==6){
        //setTimeout(function() { alert("HAS PERDUT"); }, 100);
        setTimeout(function(){document.location.href="./lose.php";},500)
        loses = parseInt(loses) + 1;
        var nodes = document.getElementById("contTeclat").getElementsByTagName('*');
        for(var i = 0; i < nodes.length; i++){
            nodes[i].disabled = true;
        }
        
    }

    points = parseInt(points) + rowPoints;
    tries = parseInt(tries) + 1;

    document.getElementById("puntuacio").setAttribute("value", points);
    document.getElementById("pointUser").innerHTML = "PUNTS: "+points;
    document.getElementById("intents").setAttribute("value", tries);
    document.getElementById("victories").setAttribute("value", wins);
    document.getElementById("derrotes").setAttribute("value", loses);
    document.getElementById("form").setAttribute("onsubmit", "return false");

    //alert("punts: "+points+", intents: "+tries+", victories: "+wins+", derrotes: "+loses)

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