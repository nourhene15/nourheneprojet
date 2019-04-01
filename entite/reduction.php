<?PHP
class Reduction{
	private $idProduit;
	private $tauxReduction;
	private $dateDeb;
	private $dateFin;

	function __construct($idProduit,$tauxReduction,$dateDeb,$dateFin){
		$this->idProduit=$idProduit;
		$this->tauxReduction=$tauxReduction;
		$this->dateDeb=$dateDeb;
		$this->dateFin=$dateFin;

	}
	
	function getidProduit(){
		return $this->idProduit;
	}
	function gettauxReduction(){
		return $this->tauxReduction;
	}
	function getdateDeb(){
		return $this->dateDeb;
	}
	function getdateFin(){
		return $this->dateFin;
	}
	

	function setidProduit($idProduit){
		$this->idProduit=$idProduit;
	}
	function settauxReduction($tauxReduction){
		$this->tauxReduction=$tauxReduction;
	}
	function setdateDeb($dateDeb){
		$this->dateDeb=$dateDeb;
	}
	function setdateFin($dateFin){
		$this->dateFin=$dateFin;
	}
	
}

?>