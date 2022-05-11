<?php 
    require_once "../config.php";
    class reservationC 
	{

        function ajouter_reservation($reservation){
            $sql="INSERT INTO reservation (idclient , ideven , dateres , etatres ) 
			VALUES (:idclient ,:ideven ,:dateres,:etatres)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				  
                   'idclient' =>$reservation->getIdclient(),
                   'ideven' =>$reservation->getIdeven(),
				   'dateres' =>$reservation->getDateres(),
                   'etatres' =>$reservation->getEtatres(),
                 
                  
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}



		function modifier_reservation($reservation, $idres){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservation SET 
                        idclient = :idclient, 
						ideven = :ideven,
						dateres = :dateres,
						etatres = :etatres
	

					/*	id_reservation = :id_reservation, 
						Status_reservation = :Status_reservation*/
			
					WHERE idres  = :idres'	
				);
				$query->execute([

					'idclient' => $reservation->getIdclient(),
					'ideven' => $reservation->getIdeven(),
					'dateres' =>$reservation->getDateres(),
					'etatres' =>$reservation->getEtatres(),
					'idres' => $idres

				/*	
			    'Status_reservation' => $reservation->getStatus(),						 
					'id_reservation' => $id_reservation */
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) 
			{
				$e->getMessage();
			}
		}


        function supprimer_reservation($idres){
			$sql="DELETE FROM reservation WHERE idres=:idres";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idres', $idres);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }


        function afficher_reservation(){
            $sql="SELECT * FROM reservation";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }

		function recuperer_reservation($idres){
			$sql="SELECT * from reservation where idres=$idres";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':idres',$idres);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


		function trier_reservation()
		{
			$db = config::getConnexion();
			$sql = " SELECT * FROM reservation ORDER BY dateres DESC";
			
			
			$db = config::getConnexion();
				try{
					$liste= $db->query($sql);
					return $liste;
				}
				catch(Exception $e){
					die('Erreur:'. $e->getMessage());
				}
		}
			
		}
	
	

?>