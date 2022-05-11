<?php 
    require_once "../config.php";
    class reclamationC 
	{

        function ajouterreclamation($reclamation){
            $sql="INSERT INTO reclamation ( objetrec, sujet , contenurec, daterec, etatrec ,idclient) 
			VALUES (:objetrec ,:sujet,:contenurec ,:daterec,:etatrec ,:idclient)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
					'objetrec' =>$reclamation->getObjetrec(),
                   'sujet' =>$reclamation->getSujet(),
                   'contenurec' =>$reclamation->getContenurec(),
				   'daterec' =>$reclamation->getDaterec(),
                   'etatrec' =>$reclamation->getEtatrec(),
				   'idclient' =>$reclamation->getIdclient(),
				   
                 
                  
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreclamation($idrec)
		{
			$sql = "SELECT * from reclamation where idrec=:idrec";
			$db = config::getConnexion();
			try {
				$query = $db->prepare($sql);
				$query->execute([
					'idrec' => $idrec
				]);
	
				$categorie= $query->fetch();
				return $categorie;
			} catch (Exception $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}



        function modifierreclamation($reclamation, $idrec){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
					objetrec = :objetrec,
                        sujet = :sujet, 
						contenurec= :contenurec,
						daterec = :daterec,
						etatrec = :etatrec ,
						idclient = :idclient
						
					/*	id_voyage = :id_voyage, 
						Status_voyage = :Status_voyage*/
			
					WHERE idrec = :idrec'	
				);
				$query->execute([
					
					'objetrec' => $reclamation->getObjetrec(),
					'sujet' => $reclamation->getSujet(),
					'contenurec' => $reclamation->getSujet(),
					'daterec' => $reclamation->getDaterec(),
					'etatrec' => $reclamation->getEtatrec(),
					'idclient' => $reclamation->getIdclient(),
					
					'idrec' => $idrec
					
					
					

				/*	
			    'Status_reclamation' => $reclamation->getStatus(),						 
					'objetrec' => $objetrec */
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) 
			{
				$e->getMessage();
			}
		}


        function supprimerreclamation($idrec){
			$sql="DELETE FROM reclamation WHERE idrec=:idrec";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idrec', $idrec);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }


        function afficherListereclamation(){
            $sql="SELECT * FROM reclamation";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }
		function trierreclamation()
		{
			$db = config::getConnexion();
			$sql = " SELECT * FROM reclamation ORDER BY sujet DESC";
			
			
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

