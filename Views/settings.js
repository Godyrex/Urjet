function verifchange(){
    var name = document.forms["UpdateUser"]["name"].value;
    var lastname = document.forms["UpdateUser"]["lastname"].value;
    var email = document.forms["UpdateUser"]["email"].value;
    var password = document.forms["UpdateUser"]["password"].value;
    var passwordc = document.forms["UpdateUser"]["passwordc"].value;
    var description = document.forms["UpdateUser"]["description"].value;
    var errorn = 0;
    var errorln = 0;
    var errordes = 0;
    var errorp = 0;
    var errore = 0;
    var errorpc = 0;
    var letters = /[A-Za-z]/;
    var emailletters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var errorname = document.getElementById('errorname');
    var errorlastname = document.getElementById('errorlastname');
    var errorpassword = document.getElementById('errorpassword');
    var erroremail = document.getElementById('erroremail');
    var errorpasswordc = document.getElementById('errorpasswordc');
    var errordescription = document.getElementById('errordescription');


    if(name==""){
        errorname.innerHTML = "";
        errorn = 0;
    }else if (!(name.match(letters) && !(name==""))) {
        errorname.innerHTML = "Please Type a valid name!";
        errorn = 1;
    }else{
        errorname.innerHTML = "";
        errorn = 0;
    }

    if(description==""){
        errordescription.innerHTML = "";
        errordes = 0;
    }else if (!(description.length > 10) && !(description=="")) {
        errordescription.innerHTML = "The Description must contain at least 10 characters";
        errordes = 1;
    }else{
        errordescription.innerHTML = "";
        errordes = 0;
    }

    if(lastname==""){
        errorlastname.innerHTML = "";
        errorln = 0;
    }else if (!(lastname.match(letters)&& !(lastname==""))) {
        errorlastname.innerHTML = "Please Type a valid lastname!";
        errorln = 1;
    }else{
        errorlastname.innerHTML = "";
        errorln = 0;
    }


    if(email==""){
        erroremail.innerHTML = "";
        errore = 0;
    }else if(!(email.match(emailletters)&& !(email==""))){
        erroremail.innerHTML = "Please type an Email";
        errore = 1;
    }else{
        erroremail.innerHTML = "";
        errore = 0;
    }



    if(password==""){
        errorpassword.innerHTML = "";
        errorp = 0;
    }else if (!(password.match(/[0-9]/g) &&
    password.match(/[A-Z]/g) &&
    password.match(/[a-z]/g) &&
    password.length >= 8 && !(password==""))) {
        errorp = 1;
        errorpassword.innerHTML = "The password must contain at least 8 characters, including at least: One uppercase letter, One lowercase letter and a number.";
    }else{
        errorpassword.innerHTML = "";
        errorp = 0;
    }


    if(passwordc=="" && password==""){
        errorpasswordc.innerHTML = "";
        errorpc = 0;
    }else if (!(passwordc==password)){
        errorpasswordc.innerHTML = "Password doesn't match";
        errorpc = 1;
    }else{
        errorpasswordc.innerHTML = "";
        errorpc = 0;
    }

    if(errorn == 1 || errorln == 1 ||errordes == 1 || errorp == 1 || errorpc == 1 || errore == 1 ){
        return 1;
    }else{
        return 0;
    }

}

function validateForm(e) {
    if(verifchange()==1)
    {
        e.preventDefault();
    }
}
function verifimage(){
    var image = document.forms["upload"]["image"].value;

    var errori = 0;
    var errorimage = document.getElementById('errorimage');
    var errorimage1 = document.getElementById('imagelabel');
    var jpg="jpg"
    var jpeg="jpeg";
    var png="png";

    if(image==""){
        errorimage.innerHTML = "";
        errori = 0;
    }else if (image.substr(image.length - 3) != jpg && image.substr(image.length - 3) != jpeg && image.substr(image.length - 3) != png ) {
        errorimage.innerHTML = "Only JPGgg, JPEG & PNG files are allowed.";
        errori = 1;
    }else if (!(image.length <50) ) {
        errorimage.innerHTML = "Image name must be less than 50 characters";
        errori = 1;
    }else{
        errorimage.innerHTML = "";
        errori = 0;
    }
if(image==""){
    errorimage1.innerHTML = "Choose an image";
}else{
    errorimage1.innerHTML = image;
}
    if(errori == 1 ){
        return 1;
    }else{
        return 0;
    }

}

function validateFormimage(e) {
    if(verifimage()==1)
    {
        e.preventDefault();
    }
}
