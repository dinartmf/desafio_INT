<?php

require_once'service/ObjetoPersistencia.php';
require_once'../interface/ControladorGenerico.php';

?>

<?php

class Controlador implements ControladorGenerico {

	private $dadosRequest;

	public function __construct() {	}

	public function realizarAcao($acao, $dadosEntrada) {

		$retorno;

		if ($acao === 'registro') {

			$retorno = $this->cadastrar($dadosEntrada);
		} else {

			$retorno = array("retorno" => "A função acessada ainda não possui implementação.");
		}

		return $retorno;
	}

	public function cadastrar($dadosEntrada) {

		$objetoPersistencia = $this->tratarObjetoPersistencia($dadosEntrada);

		$usuario = montarUsuarioInclusao($objetoPersistencia);

		$gerenciador = Fabrica::obterInstancia('GerenciadorUsuario');
		return $gerenciador->incluir($usuario);
	}

	public function consultar($dadosEntrada){ /* Realizar implementação */ }
	
	public function alterar($dadosEntrada){ /* Realizar implementação */ }
	
	public function excluir($dadosEntrada){ /* Realizar implementação */ }

	private function tratarObjetoPersistencia($array) {

		return array("email" => $array['email'], "password" => $array['password'],
				"nome" => $array['nome'], "apelido" => $array['apelido'],
				"logradouro" => $array['logradouro'], "codPostal" => $array['codpostal'],
				"localidade" => $array['localidade'], "pais" => $array['pais'],
				"nif" => $array['nif'], "telefone" => $array['telefone']);
	}
}

if (!empty($_GET) && !empty($_POST)) {

	$controlador = Fabrica::obterInstancia('Controlador');
	$retorno = $controlador->realizarAcao($_GET['acao'], $_POST);

	echo json_encode($retorno);
}

?>