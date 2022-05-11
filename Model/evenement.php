<?php 
class evenement
{

   
    private  $nom = null;
    private  $debut = null ;
    private  $fin = null;
    private  $nbrpart = null;
    private  $prix= null;
    
   


    public function __construct( string $nom, string $debut , string  $fin, string  $nbrpart, string  $prix )
    {
 
        $this->nom = $nom ;
        $this->debut  = $debut;
        $this->fin = $fin ;
        $this->nbrpart = $nbrpart ;
        $this->prix = $prix ;
        


    }

/*
    function getIdres()
    {
        return $this->idres;
    }
*/
    function getNom()
    {
        return $this->nom;
    }
   
    function getDebut()
    {
        return $this->debut;
    }
       
    function getFin()
    {
        return $this->fin;
    }
   
    function getNbrpart()
    {
        return $this->nbrpart;
    }
    function getPrix()
    {
        return $this->prix;
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
    function setNom(string $nom)
    {
        $this->nom=$nom;
    }

    function setDebut(string $debut)
    {
        $this->debut=$debut;
    } 

    function setFin(string $fin)
        {
            $this->fin=$fin;
        }

    function setNbrpart(string $nbrpart)
        {
            $this->nbrpart=$nbrpart;
        }

     function setPrix(string $prix)
        {
            $this->prix=$prix;
        }
    
/*
   

    function setPrixvoyage(string $prix_voyage)
    {
        $this->prixvoyage=$prix_voyage;
    }

    */
   
}
?>



   