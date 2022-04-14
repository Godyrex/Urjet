function veriflogin(){
    var username = document.forms["login"]["username"].value;
    var password = document.forms["login"]["password"].value;
    var erroru = 1;
    var errorp = 1;
    var errorusername = document.getElementById('errorusername');
    var errorpassword = document.getElementById('errorpassword');
    if(username==""){
        errorusername.innerHTML = "Please type a Username";
        erroru = 1;
    }else{
        errorusername.innerHTML = "";
        erroru = 0;
    }
    if(password==""){
        errorpassword.innerHTML = "Please type a Password";
        errorp = 1;
    }else{
        errorpassword.innerHTML = "";
        errorp = 0;
    }
    if(erroru == 1 || errorp == 1 ){
        return 1;
    }else{
        return 0;
    }

}

function validateForm(e) {
    if(veriflogin()==1)
    {
        e.preventDefault();
    }
}