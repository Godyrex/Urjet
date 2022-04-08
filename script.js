function verif()
{
    var InputUser = document.forms["AddUser"]["InputUser"].value;
    var InputEmail = document.forms["AddUser"]["InputEmail"].value;
    var InputPassword = document.forms["AddUser"]["InputPassword"].value;
    var InputConfirmPassword = document.forms["AddUser"]["InputConfirmPassword"].value;
    var id = document.forms["AddUser"]["Inputid"].value;

    var errorid = document.getElementById('errorid');
    var errorUN = document.getElementById('errorUN');
    var errorEA = document.getElementById('errorEA');
    var errorP = document.getElementById('errorP');
    var errorCP = document.getElementById('errorCP');


    var letters = /^[A-Za-z]+$/;
    if(InputUser == "")
    {
        errorUN.innerHTML="Please Type a username!";
    }    else if (!(InputUser.match(letters))) {
        errorUN.innerHTML = "Please Type a valid username!";
    } else {
        errorUN.innerHTML = "";

    }
    if (InputEmail == "") {
        errorEA.innerHTML = "Please Type an email";

    }
    else {
        errorEA.innerHTML = "";

    }
    if (InputPassword == "") {
        errorP.innerHTML = "Veuillez entrer votre mot de passe!";

    }
    else if (!(InputPassword.match(/[0-9]/g) &&
    InputPassword.match(/[A-Z]/g) &&
    InputPassword.match(/[a-z]/g) &&
    InputPassword.length >= 8)) {
        errorP.innerHTML = "Le mot de passe doit contenir au moins 8 caractères, dont au moins : Une lettre majuscule, Une lettre minuscule et un nombre.";

    }
    else {
        errorP.innerHTML = "";

    }
    if(InputConfirmPassword == ""){
        errorCP.innerHTML = "Please Confirm your password";
    }else if (!(InputConfirmPassword==InputPassword)){
        errorCP.innerHTML = "Password doesn't match";
    }else{
        errorCP.innerHTML = "";
    }
    if(id==""){
        errorid.innerHTML = "Please type an id";
    }else{
        errorid.innerHTML = "";
    }
}
function verifid(){
    var id = document.forms["idform"]["Inputidr"].value;

    var errorid = document.getElementById('erroridr');
    if(id==""){
        errorid.innerHTML = "Please type an id";
    }else{
        errorid.innerHTML = "";
    }
}
function veriflogin(){
    var email = document.forms["login"]["email"].value;
    var password = document.forms["login"]["password"].value;

    var erroremail = document.getElementById('erroremail');
    var errorpassword = document.getElementById('errorpassword');
    if(email==""){
        erroremail.innerHTML = "Please type an Email";
    }else{
        erroremail.innerHTML = "";
    }
    if(password==""){
        errorpassword.innerHTML = "Please type a Password";
    }else{
        errorpassword.innerHTML = "";
    }
}
function verifsignup(){
    var email = document.forms["signup"]["email"].value;
    var password = document.forms["signup"]["password"].value;
    var passwordc = document.forms["signup"]["passwordc"].value;
    var username = document.forms["signup"]["username"].value;

    var errorusername = document.getElementById('errorusername');
    var errorpasswordc = document.getElementById('errorpasswordc');
    var erroremail = document.getElementById('erroremail');
    var errorpassword = document.getElementById('errorpassword');


    if(email==""){
        erroremail.innerHTML = "Please type an Email";
    }else{
        erroremail.innerHTML = "";
    }


    if(username==""){
        errorusername.innerHTML = "Please type a username";
    }else{
        errorusername.innerHTML = "";
    }


    if(password==""){
        errorpassword.innerHTML = "Please type a Password";
    }else{
        errorpassword.innerHTML = "";
    }


    if(passwordc == ""){
        errorpasswordc.innerHTML = "Please Confirm your password";
    }else if (!(passwordc==password)){
        errorpasswordc.innerHTML = "Password doesn't match";
    }else{
        errorpasswordc.innerHTML = "";
    }
}