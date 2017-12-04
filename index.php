<?php 

require_once("config.php");//Importamos o config.php com o autoload

//$sql = new Sql();
//$sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :id", array(":id" => 1));

$usuario = new Usuario();
$usuario->insertUsuario("MatheusMouraTeste2", "testedesenhanova2");
 ?>