function insert() {
    
    var nomavion = document.forms["demande"]["nomavion"].value;
    var typeavion = document.forms["demande"]["typeavion"].value;
    var descriptionpanne = document.forms["demande"]["descriptionpanne"].value;
    
  
    var errorn = 1;
    var errort = 1;
    var errorp = 1;
    
   
    var errornom = document.getElementById('errornom');
    var errortype = document.getElementById('errortype');
    var errorpanne = document.getElementById('errorpanne');
  

   
    
    if (nomavion == "") {
        errornom.innerHTML = "veuillez entrer le nom ";
        errorn = 1;
    } else {
        errorn = 0;
        errornom.innerHTML = "";
    }

    if (typeavion == "") {
        errortype.innerHTML = "choisissez un type valide ";
        errort = 1;
    } else {
        errort = 0;
        errortype.innerHTML = "";
    }
    if (descriptionpanne == "") {
        errorpanne.innerHTML = "veuillez décrire la panne  ";
        errort = 1;
    } else {
        errort = 0;
        errortype.innerHTML = "";
    }
 
    if(errori == 1 || errorn == 1 || errort == 1 || errorp == 1 || errorph == 1 ){
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
/* <script src="insert.js"></script>*/