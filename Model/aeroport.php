<?php 
class aeroport
{

   
    private  $nom = null;
    private  $ville = null ;
    private  $pays = null;
    
   


    public function __construct( string $nom, string $ville , string  $pays )
    {
 
        $this->nom = $nom ;
        $this->ville  = $ville ;
        $this->pays = $pays ;
        


    }


    function getNom()
    {
        return $this->nom;
    }
   
    function getVille()
    {
        return $this->ville;
    }
       
    function getPays()
    {
        return $this->pays;
    }
   
    

    function setNom(string $nom)
    {
        $this->nom=$nom;
    }

    function setVille(string $ville)
    {
        $this->ville=$ville;
    } 

    function setPays(string $pays)
        {
            $this->pays=$pays;
        }
    
    

   
}
?>