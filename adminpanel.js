function verifclient(){
    var client = document.forms["clientform"]["idc"].value;
    var min = 0;
    var errorc = 1;
    var errorclient = document.getElementById('erroridc');
    if(client==""){
        errorclient.innerHTML = "Please type a client ID";
        errorc = 1;
    }else if(client<min){
        errorclient.innerHTML = "Client ID must be bigger than 0 ";
        errorc = 1;
    }
    else{
        errorclient.innerHTML = "";
        errorc = 0;
    }
    if(errorc == 1){
        return 1;
    }else{
        return 0;
    }
    

}

function validateFormclient(e) {
    if(verifclient()==1)
    {
        e.preventDefault();
    }
}
function verifadmin(){
    var admin = document.forms["adminform"]["ida"].value;
    var min = 0;
    var errora = 1;
    var erroradmin = document.getElementById('errorida');
    if(admin==""){
        erroradmin.innerHTML = "Please type a admin ID";
        errora = 1;
    }else if(admin<min){
        erroradmin.innerHTML = "Admin ID must be bigger than 0 ";
        errora = 1;
    }
    else{
        erroradmin.innerHTML = "";
        errora = 0;
    }
    if(errora == 1){
        return 1;
    }else{
        return 0;
    }

}

function validateFormadmin(e) {
    if(verifadmin()==1)
    {
        e.preventDefault();
    }
}
function verifban(){
    var ban = document.forms["banform"]["idb"].value;
    var min = 0;
    var errorb = 1;
    var errorban = document.getElementById('erroridb');
    if(ban==""){
        errorban.innerHTML = "Please type a ban ID";
        errorb = 1;
    }else if(ban<min){
        errorban.innerHTML = "Ban ID must be bigger than 0 ";
        errorb = 1;
    }
    else{
        errorban.innerHTML = "";
        errorb = 0;
    }
    if(errorb == 1){
        return 1;
    }else{
        return 0;
    }

}

function validateFormban(e) {
    if(verifban()==1)
    {
        e.preventDefault();
    }
}
