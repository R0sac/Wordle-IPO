// CANVIAR NÚMEROS MIDES PER VARIABLES I ARREGLAR APAÑO IF DELETE I MIRAR SI FORS ANIDATS CALEN
let userWord = "";
let line = 1;
console.log(php_var);
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
                    console.log(userWord);
                    flag=true;
                    break
                }
            }
        }
        if (flag==true){
            // if (j==5){
            //     addEventListener('clickSend', function jumpLine(){

            //     });
            // }else{
                break
            // }
            // console.log(document.getElementById('' + i + j).value);
            // console.log(typeof document.getElementById('' + i + j).value)
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
    //console.log("mickey");
    //console.log(document.getElementById('rw').value);
    //console.log("mouse");
    if(userWord.length==5){
        checkWord("CAIXA");
        line+=1;
        userWord="";
    }
}

function bloquejarBoton() {
    if(document.getElementById("inpUsuari").value==="") { 
        document.getElementById('botoUsuari').disabled = true; 
    } else { 
           document.getElementById('botoUsuari').disabled = false;  
    }
}

function checkWord(randWord) {
    //console.log(randWord)
    posNonRep=0;
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
                //console.log(randWord);
            }  
        }  
    }
}