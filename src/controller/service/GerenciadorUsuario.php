<?php
require_once'../interface/GerenciadorPersistencia.php';
?>

<?php

class GerenciadorUsuario implements GerenciadorPersistencia {

	private $conexao;

	public function __construct(){

		$this->conexao = Fabrica::obterInstanciaServicosBDUsuario();
	}

	public function incluir($usuario) {

		try {
			if (!$this->consultar($usuario->getContato()->getEmail())) {

				$this->conexao->incluir($usuario);

				return array("retorno" => "Cadastro realizado com sucesso!");
			} else {

				return array("retorno" => "Usuário já cadastrado para este email.");
			}
		} catch (Exception $e) {

			return array("retorno" => "ERRO - Entre em contato com o suporte.");
		}
	}

	public function consultar($email) {

		return $this->conexao->consultar($email);
	}
}

?>