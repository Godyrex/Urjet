<?php
	include '../config.php';
	include_once '../Model/Maintenance.php';
	class MaintenanceC {
		function affichermaintenances(){
			$sql="SELECT * FROM maintenance";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimermaintenance($IDM){
			$sql="DELETE FROM maintenance WHERE IDM=:IDM";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IDM', $IDM);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajoutermaintenance($maintenance){
			$sql="INSERT INTO maintenance ( prix,etat) 
			VALUES (:prix,:etat)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					'prix' => $maintenance->getprix(),
					'etat' => $maintenance->getetat()
				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperermaintenance($IDM){
			$sql="SELECT * from maintenance where IDM=$IDM";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$maintenance=$query->fetch();
				return $maintenance;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiermaintenance($maintenance, $IDM){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE maintenance SET 
						prix= :prix, 
						etat= :etat 
						
					WHERE IDM= :IDM'
				);
				$query->execute([
					'prix' => $maintenance->getprix(),
					'etat' => $maintenance->getetat()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>