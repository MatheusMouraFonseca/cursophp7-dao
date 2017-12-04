<?php 

//Esse método faz o carregamento automático das classes. Estamos utilizando uma função anônima que recebe o nome da classe e concatena o nome php. 
spl_autoload_register(function($class_name){

	$filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";
	//É feita uma pergunta para saber se existe arquivo com esse nome específico no diretório. Se sim o arquivo é carregado.
	if(file_exists($filename)){
		require_once($filename);
	}

});

 ?>