<?php 
    include "../config.php";
    class voyageC 
	{

        function ajouter_voyage($voyage){
            $sql="INSERT INTO voyage (date_depart , date_arrivee, heure_depart , heure_arrivee ) 
			VALUES (:date_depart ,:date_arrivee ,:heure_arrivee,:heure_arrivee)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				  
                   'date_depart' =>$voyage->getDate_depart(),
                   'date_arrivee' =>$voyage->getDate_arrivee(),
				   'heure_depart' =>$voyage->getHeure_depart(),
                   'heure_arrivee' =>$voyage->getHeure_arrivee(),
                 
                  
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}



        function modifier_voyage($voyage, $id_voyage){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE voyage SET 
                        date_depart = :date_depart, 
						date_arrivee = :date_arrivee,
						heure_depart = :heure_depart,
						heure_arrivee = :heure_arrivee

					/*	id_voyage = :id_voyage, 
						Status_voyage = :Status_voyage*/
			
					WHERE id_voyage  = :id_voyage'	
				);
				$query->execute([

					'date_depart' => $voyage->getDate_depart(),
					'date_arrivee' => $voyage->getDate_arrivee(),
					'heure_depart' => $voyage->getHeure_depart(),
					'heure_arrivee' => $voyage->getHeure_arrivee(),
					'id_voyage' => $id_voyage

				/*	
			    'Status_voyage' => $voyage->getStatus(),						 
					'id_voyage' => $id_voyage */
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) 
			{
				$e->getMessage();
			}
		}


        function supprimer_voyage($id_voyage){
			$sql="DELETE FROM voyage WHERE id_voyage=:id_voyage";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_voyage', $id_voyage);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }


        function afficher_voyage(){
            $sql="SELECT * FROM voyage";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }

		function recuperer_voyage($id_voyage){
			$sql="SELECT * from voyage where id_voyage=$id_voyage";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':id_voyage',$id_voyage);
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