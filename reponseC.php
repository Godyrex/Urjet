<?php 
    include "../config.php";
    class reponseC 
	{

        function ajouterreponse($reponse){
            $sql="INSERT INTO reponse (contenurep , daterep  ) 
			VALUES (:contenurep ,:daterep )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				  
                   
                   'contenurep' =>$reponse->getContenurep(),
				   'daterep' =>$reponse->getDaterep(),
                   
                 
                  
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}



        function modifierreponse($reponse, $idrep){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reponse SET 
                       contenurep = :contenurep, 
						daterep = :daterep
						

					/*	id_aeroport = :id_aeroport, 
						Status_aeroport = :Status_aeroport*/
			
					WHERE idrep  = :idrep'	
				);
				$query->execute([

					'contenurep' => $reponse->getContenurep(),
					'daterep' => $reponse->getDaterep(),
					
					
					'idrep' => $idrep

				/*	
			    'Status_aeroport' => $aeroport->getStatus(),						 
					'id_aeroport' => $id_aeroport */
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function supprimerreponse($idrep){
			$sql="DELETE FROM reponse WHERE idrep=:idrep";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idrep', $idrep);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }


        function afficherreponse(){
            $sql="SELECT * FROM reponse";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }

		function recupererreponse($idrep){
			$sql="SELECT * from reponset where idrep=$idrep";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':idrep',$idrep);
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