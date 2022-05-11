<?php 
class reservation
{

   
    private  $idclient = null;
    private  $ideven = null ;
    private  $dateres = null;
    private  $etatres = null ;
   


    public function __construct( string $idclient, string $ideven , string  $dateres, string $etatres   )
    {
 
        $this->idclient = $idclient ;
        $this->ideven = $ideven ;
        $this->dateres = $dateres ;
        $this->etatres  = $etatres ;

      
    }

/*
    function getIdres()
    {
        return $this->idres;
    }
*/
    function getIdclient()
    {
        return $this->idclient;
    }
   
    function getIdeven()
    {
        return $this->ideven;
    }
       
    function getDateres()
    {
        return $this->dateres;
    }
   
    function getEtatres()
    {
        return $this->etatres;
    }
/*
 
    function setIdres(string $idres)
    {
        $this->idres=$idres;
    }

*/
    function setIdclient(string $idclient)
    {
        $this->idclient=$idclient;
    }

    function setIdeven(string $ideven)
    {
        $this->ideven=$ideven;
    } 

    function setDateres(string $dateres)
        {
            $this->dateres=$dateres;
        }
    
    function setEtatres(string $etatres)
        {
            $this->etatres=$etatres;
        }

   
}
?>



   