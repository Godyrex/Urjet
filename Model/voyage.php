<?php 
class voyage
{

   
    private  $date_depart = null;
    private  $date_arrivee = null ;
    private  $depart = null ;
    private  $arrivee = null ;
    private  $prix = null ;
    private  $nbr_places = null ;
    private  $id_aeroport = null ;
   


    public function __construct( string $date_depart, string $date_arrivee  , string $depart, string $arrivee, string $prix , string $nbr_places , int $id_aeroport  )
    {
 
        $this->date_depart = $date_depart ;
        $this->date_arrivee  = $date_arrivee ;
        $this->depart  = $depart ;
        $this->arrivee  = $arrivee ;
        $this->prix  = $prix ;
        $this->nbr_places  = $nbr_places ;
        $this->id_aeroport  = $id_aeroport ;

      
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

    function getDepart()
    {
        return $this->depart;
    }

    function getArrivee()
    {
        return $this->arrivee;
    }

    function getPrix()
    {
        return $this->prix;
    }

    function getNbr_places()
    {
        return $this->nbr_places;
    }

    function getId_aeroport()
    {
        return $this->id_aeroport;
    }
/*
   

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

    
    function setDepart(string $depart)
        {
            $this->depart=$depart;
        }

    function setArrivee(string $arrivee)
        {
            $this->arrivee=$arrivee;
        }

    function setPrix(string $prix)
        {
            $this->prix=$prix;
        }
       

    function setNbr_places(string $nbr_places)
      {
           $this->nbr_places=$nbr_places;
      }

      
    function setId_aeroport(int $id_aeroport)
    {
        $this->id_aeroport=$id_aeroport;
    }



   
}
?>



   