function bloquejarBoton() {
    if(document.getElementById("inpUsuari").value==="") { 
           document.getElementById('botoUsuari').disabled = true; 
       } else { 
           document.getElementById('botoUsuari').disabled = false;
       }
   }
function guardadNom() {
    let nom;
    nom = document.getElementById("inpUsuari").value;
    document.getElementById('nomUsuari').innerHTML="Nom de l'usuari: "+nom;
}




