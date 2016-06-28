<?php 
require '../model/bean/Endereco.php';
require '../model/bean/Contato.php';
require '../model/bean/Documento.php';
require '../model/bean/Usuario.php';
require_once 'GerenciadorUsuario.php';
require_once 'bd/ServicosBDUsuario.php';
require_once 'bd/BancoPDO.php';
?>

<?php

class Fabrica {
	
	public static function obterInstancia($classe) {

		$objReflexao = new ReflectionClass($classe);
		return $objReflexao->newInstance();
	}

	public static function obterInstanciaServicosBDUsuario() {

		return ServicosBDUsuario::obterInstancia();
	}

	public static function obterInstanciaBancoPDO() {

		return BancoPDO::obterInstanciaBD();
	}
}

?>