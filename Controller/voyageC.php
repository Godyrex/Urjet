<?php 
    require_once "../config.php";
    class voyageC 
	{

        function ajouter_voyage($voyage){
            $sql="INSERT INTO voyage (date_depart , date_arrivee, depart,arrivee, prix,nbr_places ,id_aeroport ) 
			VALUES (:date_depart ,:date_arrivee ,:depart,:arrivee , :prix , :nbr_places, :id_aeroport)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				  
                   'date_depart'  =>$voyage->getDate_depart(),
                   'date_arrivee' =>$voyage->getDate_arrivee(),
				   'depart'  =>$voyage->getDepart(),
				   'arrivee'  =>$voyage->getArrivee(),
				   'prix'  =>$voyage->getPrix(),
				   'nbr_places'   =>$voyage->getNbr_places(),
				   'id_aeroport'   =>$voyage->getId_aeroport(),
                  
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
						depart = :depart,
						arrivee = :arrivee,
						prix = :prix,
						nbr_places = :nbr_places,
						id_aeroport = :id_aeroport

					/*	id_voyage = :id_voyage, 
						Status_voyage = :Status_voyage*/
			
					WHERE id_voyage  = :id_voyage'	
				);
				$query->execute([

					'date_depart' => $voyage->getDate_depart(),
					'date_arrivee' => $voyage->getDate_arrivee(),
					'depart' =>$voyage->getDepart(),
					'arrivee' =>$voyage->getArrivee(),
					'prix' =>$voyage->getPrix(),
					'nbr_places' => $voyage->getNbr_places(),
					'id_aeroport' => $voyage->getId_aeroport(),
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

		function trier_voyage()
		{
			$sql = "SELECT * from voyage ORDER BY prix ASC";
			$db = config::getConnexion();
			try {
				$req = $db->query($sql);
				return $req;
			} 
			catch (Exception $e)
			 {
				die('Erreur: ' . $e->getMessage());
			}
		}


		function affichage_par_id($id_voyage){
			$sql="SELECT * FROM voyage WHERE id_voyage= :id_voyage";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_voyage',$id_voyage);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		/*function affichage_par_ddepart($date_depart){
			$sql="SELECT * FROM voyage WHERE date_depart= :date_depart";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':date_depart',$date_depart);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}*/

		function rechercher_voyage($search_value)
        {
			//or idC like '$search_value'
			//id_voyage like '$search_value'  or
            $sql="SELECT * FROM voyage where  date_depart like '%$search_value%' or date_arrivee like '%$search_value%' or id_aeroport like '%$search_value%'  ";
    
            //global $db;
            $db =Config::getConnexion();
    
            try{
                $result=$db->query($sql);
    
                return $result;
    
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }



	}

?>