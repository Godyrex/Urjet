<?php 
    require_once "../config.php";
    class evenementC 
	{

        function ajouter_evenement($evenement){
            $sql="INSERT INTO evenement ( nom , debut, fin,nbrpart,prix ) 
			VALUES (:nom ,:debut ,:fin,:nbrpart,:prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
					
                   'nom' =>$evenement->getNom(),
                   'debut' =>$evenement->getDebut(),
				   'fin' =>$evenement->getFin(),
				   'nbrpart' =>$evenement->getNbrpart(),
				   'prix' =>$evenement->getPrix(),
                   
                 
                  
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}



        function modifier_evenement($evenement, $ideven){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(                
					'UPDATE evenement SET 
                        nom = :nom,
						

						debut = :debut,
						fin = :fin,
						nbrpart = :nbrpart,
						prix= :prix

					/*	ideven = :ideven, 
						Status_evenement = :Status_evenement*/
			
					WHERE ideven  = :ideven'	
				);
				$query->execute([

					'nom' => $evenement->getNom(),
					'debut' => $evenement->getDebut(),
					'fin' => $evenement->getFin(),
					'nbrpart' => $evenement->getNbrpart(),
					'prix' => $evenement->getPrix(),
					
					'ideven' => $ideven

				/*	
			    'Status_evenementt' => $evenement->getStatus(),						 
					'ideven' => $ideven */
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


		function supprimer_evenement($ideven){
			$sql="DELETE FROM evenement WHERE ideven=:ideven";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':ideven', $ideven);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }


        function afficher_evenement(){
            $sql="SELECT * FROM evenement";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }
		function list(){
			$con = config::getConnexion();
			$result = $con->prepare("SELECT nom,debut,fin,nbrpart,prix
			From evenement ");
			$result->execute();
			while ($row= $result->fetch()) {
				//echo $row['FirstName'] . " " . $row['LastName']; //these are the fields that you have stored in your database table employee
				echo "<br />";
				?>
				<section class="spotlight">
				<div class="content">
					<h2>Name: <?php echo $row['nom'] ?><br />
					</h2>
					<h2>Participants: <?php echo $row['nbrpart'] ?><br />
					</h2>
					<h2>Price: <?php echo $row['prix'] ?>DT<br />
					</h2>
					<h2>Start: <?php echo $row['debut'] ?><br />
					</h2>
					<h2>End: <?php echo $row['fin'] ?><br />
					</h2>
					<a href="ajouter_reservation.php" class="button primary">Reserve</a>
				</div>
			</section>
			<?php
			}
		}

		function recuperer_evenement($ideven){
			$sql="SELECT * from evenement where ideven=$ideven";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':ideven',$ideven);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

	}


	

?>