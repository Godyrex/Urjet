<?php
class usero
{

    private $id = NULL;
    private $type = NULL;
    private $description = NULL;
    private $ban = NULL;
    function __construct($id, $type, $description, $ban)
    {
        $this->$id = $id;
        $this->$type = $type;
        $this->$description = $description;
        $this->$ban = $ban;
    }
    function getid()
    {
        return $this->id;
    }
    function setid(int $id)
    {
        $this->id = $id;
    }
    function gettype()
    {
        return $this->type;
    }
    function settype(string $type)
    {
        $this->type = $type;
    }
    function getdescription()
    {
        return $this->description;
    }
    function setdescription(string $description)
    {
        $this->description = $description;
    }
    function getban()
    {
        return $this->ban;
    }
    function setban(string $ban)
    {
        $this->ban = $ban;
    }
}
