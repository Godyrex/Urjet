function verifreset(){
    var email = document.forms["reset"]["email"].value;
    var errore = 1;

    var emailletters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var erroremail = document.getElementById('erroremail');



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



    if( errore == 1 ){
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