<?PHP
 session_start();

include "../core/PanierC.php";


if (isset($_POST['qte'])){
	$qte= $_POST['qte'];
	if($qte > 0)
	{
		$id_pro=  $_SESSION['id_pro'];
		$cart=$_SESSION['Cart'];
		$ss=$_SESSION['singleShop'];
		
	$idpanier=0;
	$panier1=new Panier($id_pro,$qte,$idpanier);
	$panier1C=new PanierC();
	if($panier1C->ajouterPanier($panier1)== true) 
	{
		

	}
	else {echo"<script> alert('Produit est deja dans votre panier')</script> " ;}

		if($ss==1 and $cart==0 )
		{$link="Location: shop-single.php?id=".$id_pro;}
		else { $link="Location: cart.php"; }
		
		header($link);
	}
	else { echo "Check Quantity";}
	
	
}
	
?>