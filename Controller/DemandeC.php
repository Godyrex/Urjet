<?php
	include '../config.php';
	include_once '../Model/Demande.php';
	class DemandeC {
		function afficherdemandes(){
			$sql="SELECT * FROM demande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerdemande($IDdemande){
			$sql="DELETE FROM demande WHERE IDdemande=:IDdemande";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IDdemande', $IDdemande);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterdemande($demande){
			$sql="INSERT INTO demande ( diagnostic, urgence, type, descriptionpanne) 
			VALUES (:diagnostic,:urgence, :type, :descriptionpanne)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					'diagnostic' => $demande->getdiagnostic(),
					'urgence' => $demande->geturgence(),
					'type' => $demande->gettype (),
					'descriptionpanne' => $demande->getdescriptionpanne(),
				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererdemande($IDdemande){
			$sql="SELECT * from demande where IDdemande=$IDdemande";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$demande=$query->fetch();
				return $demande;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierdemande($demande, $IDdemande){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE demande SET 
						diagnostic= :diagnotic, 
						urgence= :urgence, 
						type= :type, 
						descriptionpanne= :descriptionpanne, 
					WHERE IDdemande= :IDdemande'
				);
				$query->execute([
					'diagnostic' => $demande->getdiagnostic(),
					'urgence' => $demande->geturgence(),
					'type' => $demande->gettype (),
					'descriptionpanne' => $demande->getdescriptionpanne(),
					'IDdemande' => $IDdemande
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>