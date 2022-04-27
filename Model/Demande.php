
<?php
	class Demande{
		private $IDdemande=null;
		private $diagnostic=null;
		private $urgence=null;
		private $type=null;
		private $descriptionpanne=null;
		
		
		private $password=null;
		function __construct($diagnostic, $urgence, $type, $descriptionpanne){
			/*$this->IDdemande=$IDdemande;*/
			$this->diagnostic=$diagnostic;
			$this->urgence=$urgence;
			$this->type=$type;
			$this->descriptionpanne=$descriptionpanne;
		}
		/*function getIDdemande(){
			return $this->IDdemande;
		}*/
		function getdiagnostic(){
			return $this->diagnostic;
		}
		function geturgence(){
			return $this->urgence;
		}
		function gettype(){
			return $this->type;
		}
		function getdescriptionpanne(){
			return $this->descriptionpanne;
		}
		/*function setIDdemande(string $IDdemande){
			$this->IDdemande=$IDdemande;
		}*/
		function setdiagnostic(string $diagnostic){
			$this->diagnostic=$diagnostic;
		}
		function seturgence(string $urgence){
			$this->urgence=$urgence;
		}
		function settype(string $type){
			$this->type=$type;

		function setdescriptionpanne(string $descriptionpanne){
				$this->descriptionpanne=$descriptionpanne;
			}
		}
	
		
	}


?>