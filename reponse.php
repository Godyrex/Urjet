<?php 
class reponse
{

   
    private  $contenurep = null;
    private  $daterep = null ;
    
    
   


    public function __construct(  string $contenurep , string  $daterep )
    {
 
        $this->contenurep = $contenurep ;
        $this->daterep  = $daterep ;
        
        


    }

/*
    function getIdVoyage()
    {
        return $this->idvoyage;
    }
*/
    function getContenurep()
    {
        return $this->contenurep;
    }
   
    function getDaterep()
    {
        return $this->daterep;
    }
       
    
   
    
/*
   
    function getPrix_voyage()
    {
        return $this->prix_voyage;
    }

    function setIdvoyage(string $idvoyage)
    {
        $this->idvoyage=$idvoyage;
    }

*/
    function setcontenurep(string $contenurep)
    {
        $this->contenurep=$contenurep;
    }

    function setdaterep(string $daterep)
    {
        $this->daterep=$daterep;
    } 

    
    
    
/*
   

    function setPrixvoyage(string $prix_voyage)
    {
        $this->prixvoyage=$prix_voyage;
    }

    */
   
}
?>



   