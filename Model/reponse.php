<?php 
class reponse
{

   
    private  $contenurep = null;
    private  $daterep = null ;
    private  $idRec = null ;
    
    
   


    public function __construct(  string $contenurep , string  $daterep , string $idRec )
    {
 
        $this->contenurep = $contenurep ;
        $this->daterep  = $daterep ;
        $this->idRec  = $idRec ;
        
        


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
    function getIdRec()
    {
        return $this->idRec;
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
    function setidRec(string $idRec)
    {
        $this->idRec=$idRec;
    } 

    
    
    
/*
   

    function setPrixvoyage(string $prix_voyage)
    {
        $this->prixvoyage=$prix_voyage;
    }

    */
   
}
?>



   