<?php
class avion{

    private $id=NULL;
    private $nom = NULL;
    private $prix = NULL;
    private $photo = NULL;
    private $idtype = NULL;
    function __construct($id, $nom,$prix,$photo,$idtype){
        $this->$id=$id;
        $this->$nom=$nom;
        $this->$prix=$prix;
        $this->$photo=$photo;
        $this->$idtype=$idtype;
    }
    function getid(){
        return $this->id;
}
function setid(int $id ){
    $this->id=$id;
}
function getnom(){
    return $this->nom;
}
function setnom(string $nom){
    $this->nom=$nom;
}
function getprix(){
    return $this->prix;
}
function setprix(string $prix){
    $this->prix=$prix;
}
function getphoto(){
    return $this->photo;
}
function setphoto(string $photo){
    $this->photo=$photo;
}
function getidtype(){
    return $this->idtype;
}
function setidtype(int $idtype){
    $this->idtype=$idtype;
}
}
