<?PHP
include "../config.php";
class clientfidelesF {
function afficherclientfideles ($clientfideles){
		echo "idClient: ".$clientfideles->getidClient()."<br>";
		echo "PointsFidelite: ".$clientfideles->getPointsFidelite()."<br>";
		
		
	}
	
	function ajouterclientfideles($clientfideles){
		$sql="insert into clientfideles (idClient,PointsFidelite) values (:idClient,:PointsFidelite)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idClient=$clientfideles->getidClient();
        $PointsFidelite=$clientfideles->getPointsFidelite();
        
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':PointsFidelite',$PointsFidelite);
	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherclientfideless(){
		//$sql="SElECT * From clientfideles e inner join formationphp.clientfideles a on e.idClient= a.idClient";
		$sql="SElECT * From clientfideles";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerclientfideles($id){
		$sql="DELETE FROM clientfideles where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierclientfideles($clientfideles,$id){
		$sql="UPDATE clientfideles SET idClient=:idClient, PointsFidelite=:PointsFidelite WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idClientn=$clientfideles->getidClient();
        $PointsFidelite=$clientfideles->getPointsFidelite();
       
        
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':PointsFidelite',$PointsFidelite);
	
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	
	
	function rechercherListeclientfideless($idClient){
		$sql="SELECT * from clientfideles where idClient=$idClient";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>