<?php 

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}
	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){

		$sql = new Sql();
		$resultados = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", $parametros = array(
			":ID" =>$id
		));

		$resultado = $resultados[0];
		//echo json_encode($resultado[0]);
		if(isset($resultados)){

			$this->setIdusuario($resultado['idusuario']);
			$this->setDeslogin($resultado['deslogin']);
			$this->setDessenha($resultado['dessenha']);
			$this->setDtcadastro($resultado['dtcadastro']);
			}//Fechando o if

		echo $this->getDeslogin();

	}//Fechando a loadById

	public function insertUsuario($login, $senha){
		$sql = new Sql();
		$this->setDeslogin($login);//Faço tratamento das informações antes de irem para o banco de dados
		$this->setDessenha($senha);

		$sql->insertUser("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (:LOGIN, :SENHA)", $parametros = array(
			":LOGIN" => $this->getDeslogin(),
			":SENHA" => $this->getDessenha()
		));		
	}//Fechando o metodo insertUsuario

	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

	public static function search($login){
		$sql = new Sql();
		
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH' => "%".$login."%"
		));
	}

	public function login($login, $password){
		$sql = new Sql();
		
		$resultados = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", $parametros = array(
			":LOGIN" => $login,
			":PASSWORD" =>$password
		));

		$resultado = $resultados[0];
		if(isset($resultado)){
			$this->setIdusuario($resultado['idusuario']);
			$this->setDeslogin($resultado['deslogin']);
			$this->setDessenha($resultado['dessenha']);
			$this->setDtcadastro($resultado['dtcadastro']);
			}
	
	}//Fechando fumção login

	public function __toString(){
		return json_encode(array(
			"idusuario" =>$this->getIdusuario(),
			"deslogin" =>$this->getDeslogin(),
			"dessenha" =>$this->getDessenha(),
			"dtcadastro" =>$this->getDtcadastro()

		));

	}

}//Fechando classe Usuario


 ?>