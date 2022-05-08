<?php
class user{

    private $id=NULL;
    private $username = NULL;
    private $email = NULL;
    private $password = NULL;
    private $name = NULL;
    private $lastname = NULL;
    private $image = NULL;
    private $id_o = NULL;
    private $reset_link_token = NULL;
    private $exp_date = NULL;
    private $email_verification_link = NULL;
    private $verified = NULL;
    function __construct($id, $username, $email, $password, $name,$lastname,$image,$id_o,$reset_link_token,$exp_date,$email_verification_link,$verified){
        $this->$id=$id;
        $this->$username=$username;
        $this->$email=$email;
        $this->$password=$password;
        $this->$name=$name;
        $this->$lastname=$lastname;
        $this->$image=$image;
        $this->$id_o=$id_o;
        $this->$reset_link_token=$reset_link_token;
        $this->$exp_date=$exp_date;
        $this->$email_verification_link=$email_verification_link;
        $this->$verified=$verified;
    }
    function getid(){
        return $this->id;
}
function setid(int $id ){
    $this->id=$id;
}
function getusername(){
    return $this->username;
}
function setusername(string $username){
    $this->username=$username;
}
function getemail(){
    return $this->email;

}
function setemail(string $email){
    $this->email=$email;
}
function getpassword(){
    return $this->password;
}
function setpassword(string $password){
    $this->password=$password;
}
function getname(){
    return $this->name;
}
function setname(string $name){
    $this->name=$name;
}
function getlastname(){
    return $this->lastname;
}
function setlastname(string $lastname){
    $this->lastname=$lastname;
}
function getimage(){
    return $this->image;
}
function setimage(string $image){
    $this->image=$image;
}
function getid_o(){
    return $this->id_o;
}
function setid_o(int $id_o){
    $this->id_o=$id_o;
}
function getreset_link_token(){
    return $this->reset_link_token;
}
function setreset_link_token(string $reset_link_token){
    $this->reset_link_token=$reset_link_token;
}
function getexp_date(){
    return $this->exp_date;
}
function setexp_date(string $exp_date){
    $this->exp_date=$exp_date;
}
function getemail_verification_link(){
    return $this->email_verification_link;
}
function setemail_verification_link(string $email_verification_link){
    $this->email_verification_link=$email_verification_link;
}
function getverified()
{
    return $this->verified;
}
function setverified(string $verified)
{
    $this->verified = $verified;
}
}
