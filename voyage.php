<?php 
class voyage
{

   
    private  $date_depart = null;
    private  $date_arrivee = null ;
    private  $heure_depart = null;
    private  $heure_arrivee = null ;
   


    public function __construct( string $date_depart, string $date_arrivee , string  $heure_depart, string $heure_arrivee   )
    {
 
        $this->date_depart = $date_depart ;
        $this->date_arrivee  = $date_arrivee ;
        $this->heure_depart = $heure_depart ;
        $this->heure_arrivee  = $heure_arrivee ;

      
    }

/*
    function getIdVoyage()
    {
        return $this->idvoyage;
    }
*/
    function getDate_depart()
    {
        return $this->date_depart;
    }
   
    function getDate_arrivee()
    {
        return $this->date_arrivee;
    }
       
    function getHeure_depart()
    {
        return $this->heure_depart;
    }
   
    function getHeure_arrivee()
    {
        return $this->heure_arrivee;
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
    function setDate_depart(string $date_depart)
    {
        $this->date_depart=$date_depart;
    }

    function setDate_arrivee(string $date_arrivee)
    {
        $this->date_arrivee=$date_arrivee;
    } 

    function setHeure_depart(string $heure_depart)
        {
            $this->heure_depart=$date_depart;
        }
    
    function setHeure_arrivee(string $heure_arrivee)
        {
            $this->heure_arrivee=$heure_arrivee;
        }
/*
   

    function setPrixvoyage(string $prix_voyage)
    {
        $this->prixvoyage=$prix_voyage;
    }

    */
   
}
?>



   