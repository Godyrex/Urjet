function ajout() {
    var id = document.forms["avion"]["id"].value;
    var nom = document.forms["avion"]["nom"].value;
    var type = document.forms["avion"]["type"].value;
    var prix = document.forms["avion"]["prix"].value;
    var photo = document.forms["avion"]["photo"].value;
    var errori = 1;
    var errorn = 1;
    var errort = 1;
    var errorp = 1;
    var errorph = 1;
    var errorid = document.getElementById('errorid');
    var errornom = document.getElementById('errornom');
    var errortype = document.getElementById('errortype');
    var errorprix = document.getElementById('errorprix');
    var errorphoto = document.getElementById('errorphoto');
    if (prix < 0 || prix == 0) {
        errorprix.innerHTML = "type a valid id  ";
        errorp = 1;
    } else {
        errorp = 0;
        errorprix.innerHTML = "";
    }
    if (id < 0 ) {
        errorid.innerHTML = "type a validaaaa id  ";
        errori = 1;
    } else {
        errori = 0;
        errorid.innerHTML = "";
    }
    
    if (nom == "") {
        errornom.innerHTML = "type a valid name  ";
        errorn = 1;
    } else {
        errorn = 0;
        errornom.innerHTML = "";
    }

    if (type == "") {
        errortype.innerHTML = "choose a valid type ";
        errort = 1;
    } else {
        errort = 0;
        errortype.innerHTML = "";
    }
    if (photo == "") {
        errorphoto.innerHTML = "choose a valid image  ";
        errorph = 1;
    } else {
        errorph = 0;
        errorphoto.innerHTML = "";
    }
    if(errori == 1 || errorn == 1 || errort == 1 || errorp == 1 || errorph == 1 ){
        return 1;
    }else{
        return 0;
    }


}
function validateForm(e) {
    if(ajout()==1)
    {
        e.preventDefault();
    }
}
