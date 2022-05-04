<?php
class categorieavion
{

    private $id = NULL;
    private $categorie = NULL;
    function __construct($id, $categorie)
    {
        $this->$id = $id;
        $this->$categorie = $categorie;
    }
    function getid()
    {
        return $this->id;
    }
    function setid(int $id)
    {
        $this->id = $id;
    }
    function getcategorie()
    {
        return $this->categorie;
    }
    function setcategorie(string $categorie)
    {
        $this->categorie = $categorie;
    }
}
