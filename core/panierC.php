<?php
include "panier.php";

class PanierC{
	
	function __construct(){
		if(isset($_GET['del']))
		{
			$this->supprimerPanier($_GET['del']);
		}

		if(isset($_POST['qteC']))
		{
			$this->supprimerPanier($_GET['del']);
		}

		if(!isset($_SESSION['panier']))
		{
			$_SESSION['panier'] = array();
		}

		if(isset($_POST['panier']['qte']))
		{
			$this->updateQte();
		}
	}
	

 function updateQte($id,$qte)
{

	
	$sql="update  paniers set QTE =:qte where ID_PRO =:id ";
		
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$req->bindValue(':id',$id);
		$req->bindValue(':qte',$qte);
		
         $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        
    }

}

 function ajouterPanier($Panier){
		$sql="insert into paniers (ID_PRO,QTE) values (:ID_PRO, :QTE)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
       
        $idp=$Panier->getId_pro();
        $qte=$Panier->getQte();
		$req->bindValue(':ID_PRO',$idp);
		$req->bindValue(':QTE',$qte);
		
           return $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function afficherProduits(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT p.ID_PRO ,nom , prix , QTE From paniers p inner join produits pr on p.ID_PRO= pr.ID_PRO where ID_P= 0";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	
    }

    function supprimerPanier($id){
		$sql="DELETE FROM paniers where id_pro= :id and ID_P=0";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

    function Total(){
		$sql="select  sum(produits.prix*paniers.QTE) prix from produits right join paniers on produits.id_PRO= paniers.id_pro where ID_P= 0 ";
		$db = config::getConnexion();
		
		try{
            $liste=$db->query($sql);
            $l=$liste->fetch(0);
		return $l[0];
           
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function Count(){
		$sql="SELECT COUNT(*) FROM paniers where ID_P= 0";

		$db = config::getConnexion();
		
		try{
            $liste=$db->query($sql);
            $l=$liste->fetch(0);
		return $l[0];
           
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	

}
?>

 