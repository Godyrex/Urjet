function ajout() {
    var id = document.forms["avion"]["id"].value;
    var nom = document.forms["avion"]["nom"].value;
    var prix = document.forms["avion"]["prix"].value;
    var photo = document.forms["avion"]["photo"].value;
    var errori = 1;
    var errorn = 1;
    var errorp = 1;
    var errorph = 1;
    var errorid = document.getElementById('errorid');
    var errornom = document.getElementById('errornom');
    var errorprix = document.getElementById('errorprix');
    var errorphoto = document.getElementById('errorphoto');
    if (prix < 0 || prix == 0) {
        errorprix.innerHTML = "type a valid price  ";
        errorp = 1;
    } else {
        errorp = 0;
        errorprix.innerHTML = "";
    }

    if (id < 0 || id == 0) {
        errorid.innerHTML = "type a valid id  ";
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

    if (photo == "") {
        errorphoto.innerHTML = "choose a valid image  ";
        errorph = 1;
    } else {
        errorph = 0;
        errorphoto.innerHTML = "";
    }
    if(errori == 1 || errorn == 1 || errorp == 1 || errorph == 1 ){
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
function modifier() {
    var id = document.forms["avionm"]["idm"].value;
    var nom = document.forms["avionm"]["nomm"].value;
    var prix = document.forms["avionm"]["prixm"].value;
    var photo = document.forms["avionm"]["photom"].value;
    var errori = 1;
    var errorn = 1;
    var errorp = 1;
    var errorph = 1;
    var errorid = document.getElementById('erroridm');
    var errornom = document.getElementById('errornomm');
    var errorprix = document.getElementById('errorprixm');
    var errorphoto = document.getElementById('errorphotom');
    if (prix < 0 || prix == 0) {
        errorprix.innerHTML = "type a valid price  ";
        errorp = 1;
    } else {
        errorp = 0;
        errorprix.innerHTML = "";
    }
    
    if (id < 0 || id == 0) {
        errorid.innerHTML = "type a valid id  ";
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

    if (photo == "") {
        errorphoto.innerHTML = "choose a valid image  ";
        errorph = 1;
    } else {
        errorph = 0;
        errorphoto.innerHTML = "";
    }
    if(errori == 1 || errorn == 1 || errorp == 1 || errorph == 1 ){
        return 1;
    }else{
        return 0;
    }


}
function validateFormm(e) {
    if(modifier()==1)
    {
        e.preventDefault();
    }
}