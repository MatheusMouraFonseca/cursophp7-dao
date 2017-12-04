<?php 

class Sql extends PDO{

	private $conn;

	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
	}

	private function setParametros($statment, $parametros = array()){
		
		foreach ($parametros as $key => $value) {
			$this->setParametro($statment, $key, $value);
		}
	}

	private function setParametro($statment, $key, $value){

		$statment->bindParam($key, $value);
	}


	public function query($queryBruta, $parametros = array()){
		$stmt = $this->conn->prepare($queryBruta);
		$this->setParametros($stmt, $parametros);
		$stmt->execute();
		return $stmt;

	}

	public function select($queryBruta, $parametros = array()){
		$resultados = $this->query($queryBruta, $parametros);
		return $resultados->fetchAll(PDO::FETCH_ASSOC);
	}

	public function insertUser($queryBruta, $parametros = array()){
		$this->query($queryBruta, $parametros);

	}


}#Fecha a classe Sql

?>