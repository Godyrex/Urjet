<?php 
    include "../config.php";
    class aeroportC 
	{

        function ajouter_aeroport($aeroport){
            $sql="INSERT INTO aeroport (nom , ville, pays  ) 
			VALUES (:nom ,:ville ,:pays)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				  
                   'nom' =>$aeroport->getNom(),
                   'ville' =>$aeroport->getVille(),
				   'pays' =>$aeroport->getPays(),
                   
                 
                  
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}



        function modifier_aeroport($aeroport, $id_aeroport){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE aeroport SET 
                        nom = :nom, 
						ville = :ville,
						pays = :pays

					/*	id_aeroport = :id_aeroport, 
						Status_aeroport = :Status_aeroport*/
			
					WHERE id_aeroport  = :id_aeroport'	
				);
				$query->execute([

					'nom' => $aeroport->getNom(),
					'ville' => $aeroport->getVille(),
					'pays' => $aeroport->getPays(),
					
					'id_aeroport' => $id_aeroport

				/*	
			    'Status_aeroport' => $aeroport->getStatus(),						 
					'id_aeroport' => $id_aeroport */
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function supprimer_aeroport($id_aeroport){
			$sql="DELETE FROM aeroport WHERE id_aeroport=:id_aeroport";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_aeroport', $id_aeroport);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }


        function afficher_aeroport(){
            $sql="SELECT * FROM aeroport";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }

		function recuperer_aeroport($id_aeroport){
			$sql="SELECT * from aeroport where id_aeroport=$id_aeroport";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':id_aeroport',$id_aeroport);
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