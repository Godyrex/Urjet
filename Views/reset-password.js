function verifreset(){
    var password = document.forms["reset"]["password"].value;
    var passwordc = document.forms["reset"]["passwordc"].value;
    var errorp = 1;
    var errorpc = 1;
    var errorpassword = document.getElementById('errorpassword');
    var errorpasswordc = document.getElementById('errorpasswordc');

    if(password==""){
        errorpassword.innerHTML = "Please type a Password";
        errorp = 1;
    }else if (!(password.match(/[0-9]/g) &&
    password.match(/[A-Z]/g) &&
    password.match(/[a-z]/g) &&
    password.length >= 8)) {
        errorp = 1;
        errorpassword.innerHTML = "The password must contain at least 8 characters, including at least: One uppercase letter, One lowercase letter and a number.";

    }else{
        errorpassword.innerHTML = "";
        errorp = 0;
    }


    if(passwordc==""){
        errorpasswordc.innerHTML = "Please type a Password";
        errorpc = 1;
    }else if (!(passwordc==password)){
        errorpasswordc.innerHTML = "Password doesn't match";
        errorpc = 1;
    }else{
        errorpasswordc.innerHTML = "";
        errorpc = 0;
    }

    if( errorp == 1 || errorpc == 1  ){
        return 1;
    }else{
        return 0;
    }

}

function validateForm(e) {
    if(verifreset()==1)
    {
        e.preventDefault();
    }
}