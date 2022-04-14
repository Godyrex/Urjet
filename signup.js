function verifsignup(){
    var username = document.forms["signup"]["username"].value;
    var email = document.forms["signup"]["email"].value;
    var password = document.forms["signup"]["password"].value;
    var passwordc = document.forms["signup"]["passwordc"].value;
    var erroru = 1;
    var errorp = 1;
    var errore = 1;
    var errorpc = 1;
    var letters = /[A-Za-z]/;
    var emailletters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var errorusername = document.getElementById('errorusername');
    var errorpassword = document.getElementById('errorpassword');
    var erroremail = document.getElementById('erroremail');
    var errorpasswordc = document.getElementById('errorpasswordc');


    if(username==""){
        errorusername.innerHTML = "Please type a Username";
        erroru = 1;
    }else if (!(username.match(letters))) {
        errorusername.innerHTML = "Please Type a valid username!";
        erroru = 1;
    }else{
        errorusername.innerHTML = "";
        erroru = 0;
    }

    if(email==""){
        erroremail.innerHTML = "Please type an Email";
        errore = 1;
    }else if(!(email.match(emailletters)&& !(email==""))){
        erroremail.innerHTML = "Please type a valid Email";
        errore = 1;
    }
    else{
        erroremail.innerHTML = "";
        errore = 0;
    }



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

    if(erroru == 1 || errorp == 1 || errorpc == 1 || errore == 1 ){
        return 1;
    }else{
        return 0;
    }

}

function validateForm(e) {
    if(verifsignup()==1)
    {
        e.preventDefault();
    }
}