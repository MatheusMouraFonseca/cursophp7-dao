<?php 

require_once("config.php");//Importamos o config.php com o autoload

//$sql = new Sql();
//$sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :id", array(":id" => 1));

//$usuario = new Usuario();
//$usuario->insertUsuario("MatheusMouraTeste2", "testedesenhanova2"); 


//$resultado = Usuario::getList(); #Como o método é estatico pode ser chamado sem instanciar objeto

//echo json_encode($resultado);
//Carrega uma lista de usuarios buscando pelo login

//$search = Usuario::search("jo");

//echo json_encode($search);

//carrega um usuario usando o login e a senha

$usuario = new Usuario();
echo $usuario->login("jose", "1234567890");
 ?>