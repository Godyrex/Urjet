
<?php
	class Maintenance{
		private $prix=null;
		private $etat=null;
	
		
		
		private $password=null;
		function __construct($prix, $etat){
			/*$this->IDdemande=$IDdemande;*/
			$this->prix=$prix;
			$this->etat=$etat;
	
		}
		/*function getIDdemande(){
			return $this->IDdemande;
		}*/
		function getprix(){
			return $this->prix;
		}
		function getetat(){
			return $this->etat;
		}

		/*function setIDdemande(string $IDdemande){
			$this->IDdemande=$IDdemande;
		}*/
		function setprix(int $prix){
			$this->prix=$prix;
		}
		function setetat(string $etat){
			$this->etat=$etat;
		}
	
	
		
	}


?>