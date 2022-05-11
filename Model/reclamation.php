<?php 
class reclamation
{

    private  $objetrec = null;
    private  $sujet = null;
    private  $contenurec = null ;
    private  $daterec = null;
    private  $etatrec= null ;
    private  $idclient= null ;
   
   


    public function __construct( string $objetrec, string $sujet, string $contenurec , string  $daterec, string $etatrec, string $idclient  )
    {
        $this->objetrec = $objetrec ;
        $this->sujet = $sujet ;
        $this->contenurec = $contenurec;
        $this->daterec = $daterec ;
        $this->etatrec  = $etatrec ;
        $this->idclient  = $idclient ;
       

      
    }

/*
    function getIdVoyage()
    {
        return $this->idvoyage;
    }
*/
function getObjetrec()
{
    return $this->objetrec;
}
    function getSujet()
    {
        return $this->sujet;
    }
   
    function getContenurec()
    {
        return $this->contenurec;
    }
       
    function getDaterec()
    {
        return $this->daterec;
    }
   
    function getEtatrec()
    {
        return $this->etatrec;
    }
    function getIdclient()
    {
        return $this->idclient;
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
function setobjetrec(string $objetrec)
    {
        $this->objetrec=$objetrec;
    }
    function setsujet(string $sujet)
    {
        $this->sujet=$sujet;
    }

    function setcontenurec(string $contenurec)
    {
        $this->contenurec=$contenurec;
    } 

    function setdaterec(string $daterec)
        {
            $this->daterec=$daterec;
        }
    
    function setetatrec(string $etatrec)
        {
            $this->etatrec=$etatrec;
        }
    function setidclient(string $idclient)
        {
            $this->idclient=$idclient;
        }
        
        
/*
   

    function setPrixvoyage(string $prix_voyage)
    {
        $this->prixvoyage=$prix_voyage;
    }

    */
   
}
?>



   