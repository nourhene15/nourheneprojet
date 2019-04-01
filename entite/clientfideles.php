<?PHP
class clientfideles{
	private $idClient;

	private $PointsFidelite;

	function __construct($idClient,$PointsFidelite){
		$this->idClient=$idClient;
	
		$this->PointsFidelite=$PointsFidelite;

	}
	
	function getidClient(){
		return $this->idClient;
	}
	
	function getPointsFidelite(){
		return $this->PointsFidelite;
	}
	

	function setidClient($idClient){
		$this->idClient=$idClient;
	}
	
	function setPointsFidelite($PointsFidelite){
		$this->PointsFidelite=$PointsFidelite;
	}
	
}

?>