<?PHP
include "config.php";


class Panier{
	private $id_pro;
	private $id_p;
	private $Qte;
	
	function __construct($id_pro,$Qte,$id_p){
		$this->id_pro=$id_pro;
		$this->id_p=$id_p;
		$this->Qte=$Qte;
	}
	
	function getId_pro(){
		return $this->id_pro;
	}
	function getId_p(){
		return $this->id_p;
	}
	function getQte(){
		return $this->Qte;
	}
	

	function setId_pro($id_pro){
		$this->id_pro=$id_pro;
	}
	function setId_p($id_p){
		$this->id_p;
	}
	function setQte($Qte){
		$this->Qte=$Qte;
	}
	


 function ajouterPanier($Panier){
		$sql="insert into paniers (ID_PRO,QTE) values (:ID_PRO, :QTE)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
       
        $idp=$Panier->getId_p();
        $qte=$Panier->getQte();
		$req->bindValue(':ID_PRO',$idp);
		$req->bindValue(':QTE',$qte);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function afficherProduits(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From paniers ";
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

 