<?php
	include '../config.php';
	include_once '../Model/Demande.php';
	
	class DemandeC {
		function afficherdemandes(){
			$con = config::getConnexion();
			$sql = "SELECT count(*) FROM `demande`";
			$count = $con->query($sql)->fetchColumn();
		
			// Initialize a Data Pagination with previous count number
			$pagination = new \yidas\data\Pagination([
			  'totalCount' => $count,
			]);
			$sql="SELECT demande.IDdemande,avion.nom,demande.urgence,typeavion.categorie,demande.diagnostic,demande.type,demande.descriptionpanne
			From demande 
			INNER JOIN avion
			ON demande.id_avion = avion.id INNER JOIN typeavion
    on avion.idtype = typeavion.id ORDER BY demande.IDdemande LIMIT {$pagination->offset}, {$pagination->limit}";
			  
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function afficherdemandesuser(){
			$con = config::getConnexion();
			$sql="SELECT demande.IDdemande,demande.urgence,demande.diagnostic,demande.type,demande.descriptionpanne
			From demande 
		 INNER JOIN user
    on demande.id_user = user.id where user.id = ".$_SESSION["id"]." ORDER BY demande.IDdemande ";
			  
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function numero()
		{
		  $con = config::getConnexion();
		  $sql = "SELECT count(*) FROM `demande`";
		  $count = $con->query($sql)->fetchColumn();
	  
		  // Initialize a Data Pagination with previous count number
		  $pagination = new \yidas\data\Pagination([
			'totalCount' => $count,
		  ]);
		  ?>
		  <ul class="pagination pagination-sm m-0 float-right">
			<div>
	  
			  <?= \yidas\widgets\Pagination::widget([
				'pagination' => $pagination
			  ]) ?>
			</div>
		  </ul>
		<?php
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
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterdemande($demande){
			$sql="INSERT INTO demande ( diagnostic, urgence, type, descriptionpanne,id_user) 
			VALUES (:diagnostic,:urgence, :type, :descriptionpanne,:id_user)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					'diagnostic' => $demande->getdiagnostic(),
					'urgence' => $demande->geturgence(),
					'type' => $demande->gettype (),
					'descriptionpanne' => $demande->getdescriptionpanne(),
					'id_user' => $_SESSION["id"],

					
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
		function excel()
  {
    $con = config::getConnexion();
    $fileName = "Demande_list" . date('d-m-Y') . ".csv";
    @header("Content-Disposition: attachment; filename=" . $fileName);
    @header("Content-Type: application/csv");
    @header("Pragma: no-cache");
    @header("Expires: 0");

    $select = "SELECT * From demande";
     
    $stmt = $con->prepare($select);
    $stmt->execute();
    $data = "";
    $data .= "IDdemande" . ",";
    $data .= "diagnostic" . ",";
    $data .= "urgence" . ",";
    $data .= "type de panne" . ",";
    $data .= "Description" . "\n";
   
   

    while ($row = $stmt->fetch()) {
      $data .= $row['IDdemande'] . ",";
      $data .= $row['diagnostic'] . ",";
      $data .= $row['urgence'] . ",";
      $data .= $row['type'] . ",";
      $data .= $row['descriptionpanne'] . "\n";

    }

    echo $data;
    exit();
  }
  function total(){
	$prix=500;
	$tva=(10*$prix)/100;
	$total=$prix + $tva;
	try{
		return $total;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMessage());
	}
}
function prix(){
	$prix=500;
	$tva=(10*$prix)/100;
	$total=$prix + $tva;
	try{
		return $prix;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMessage());
	}
}
function tva(){
	$prix=500;
	$tva=(10*$prix)/100;
	$total=$prix + $tva;
	try{
		return $tva;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMessage());
	}
}

	}
?>