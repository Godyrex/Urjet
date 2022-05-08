
   
function insert() {
    
    var name = document.forms["demande"]["nomavion"].value;
    var diagnostic = document.forms["demande"]["diagnostic"].value;
    var reparation = document.forms["demande"]["reparation"].value;
    var urgence = document.forms["demande"]["urgence"].value;
    var normal = document.forms["demande"]["normal"].value;
    var typepanne = document.forms["demande"]["typepanne"].value;
    var message = document.forms["demande"]["message"].value;
    
  
    var errorn = 1;
    var errord = 1;
    var errorr= 1;
    var erroru = 1;
    var errorno = 1;
    var errort = 1;
    var errorm = 1;
    
   
    var errornom = document.getElementById('errornom');
    var errordiagnostic = document.getElementById('errordiagnostic');
    var errorreparation = document.getElementById('errorreparation');
    var errorurgence = document.getElementById('errorurgence');
    var errornormal = document.getElementById('errornormal');
    var errortypepanne = document.getElementById('errortypepanne');
    var errorpanne = document.getElementById('errorpanne');
   
  

   
    
    if (nomavion == "") {
        errornom.innerHTML = "veuillez entrer le nom ";
        errorn = 1;
    } else {
        errorn = 0;
        errornom.innerHTML = "";
    }
    if (empty(reparation)&&empty(diagnostic))
    {
        errord=1;
        errorr=1;
        errordiagnostic.innerHTML="veuiller choisir au moin une seule";
        errorreparation.innerHTML="veuiller choisir au moin une seule";
    }else{
        errord=0;
        errorr=0;
        errordiagnostic.innerHTML="";
        errorreparation.innerHTML="";

    }
    if (empty(urgence)&&empty(normal))
    {
        errorno=1;
        erroru=1;
        errornormal.innerHTML="veuiller choisir au moin une seule";
        errorurgence.innerHTML="veuiller choisir au moin une seule";
    }else{
        errorno=0;
        erroru=0;
        errornormal.innerHTML="";
        errorurgence.innerHTML="";

    }

    if (typepanne == "") {
        errortype.innerHTML = "choisissez un type valide ";
        errort = 1;
    } else {
        errort = 0;
        errortypepanne.innerHTML = "";
    }
    if (message == "") {
        errorpanne.innerHTML = "veuillez décrire la panne  ";
        errorm = 1;
    } else {
        errorm = 0;
        errorpanne.innerHTML = "";
    }
 
    if(errorn == 1 || errort == 1 || errord == 1|| errorr== 1 || errorno == 1|| erroru == 1 || errorm == 1){
        return 1;
    }else{
        return 0;
    }


}
function validateForm(e) {
    if(insert()==1)
    {
        e.preventDefault();
    }
}
