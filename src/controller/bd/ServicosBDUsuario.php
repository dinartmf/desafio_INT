<?php 

require_once'service/Fabrica.php';
require_once'../interface/ServicosBD.php';

?>

<?php

class ServicosBDUsuario implements ServicosBD {

	private static $instancia;

	private function __construct() {}

	public static function obterInstancia() {

		if (self::$instancia === null) {

			self::$instancia = new ServicosBDUsuario();
		}

		return self::$instancia;
	}

	public function consultar($email) {

		$retorno = false;

		$sql = "SELECT * FROM contato WHERE email = :email";

		$bd = Fabrica::obterInstanciaBancoPDO();
		$consulta = $bd->prepare($sql);
		$consulta->bindValue(":email", $email, PDO::PARAM_STR);
		$consulta->execute();
		
		$retornoConsulta = $consulta->fetchAll();

		if(!empty($retornoConsulta)) {

			$retorno = true; 
		}
		
		return $retorno;
	}

	public function incluir($usuario) {

		$bd = Fabrica::obterInstanciaBancoPDO();

		try {

			$bd->beginTransaction();

			$sql = "INSERT INTO usuario (nome, password, apelido) VALUES (:nome, :password, :apelido)";
			$insert = $bd->prepare($sql);
			$insert->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR);
			$insert->bindValue(":password", sha1($usuario->getPassword()), PDO::PARAM_STR);
			$insert->bindValue(":apelido", $usuario->getApelido(), PDO::PARAM_STR);
			$insert->execute();

			$seqUsuario = $bd->lastInsertId();

			$insert->closeCursor();

			$sql = "INSERT INTO contato (seqUsuario, email, telefone) VALUES (:seqUsuario, 
					:email, :telefone)";
			$insert = $bd->prepare($sql);
			$insert->bindValue(":seqUsuario", $seqUsuario, PDO::PARAM_INT);
			$insert->bindValue(":email", $usuario->getContato()->getEmail(), PDO::PARAM_STR);
			$insert->bindValue(":telefone", $usuario->getContato()->getTelefone(), PDO::PARAM_STR);
			$insert->execute();

			$insert->closeCursor();

			if ($usuario->possuiDocumento()) {

				$sql = "INSERT INTO documento (seqUsuario, tipoDocumento, numDocumento) VALUES (:seqUsuario,
						:tipoDocumento, :numDocumento)";
				$insert = $bd->prepare($sql);
				$insert->bindValue(":seqUsuario", $seqUsuario, PDO::PARAM_INT);
				$insert->bindValue(":tipoDocumento", $usuario->getDocumento()->getTipoDocumento(), PDO::PARAM_INT);
				$insert->bindValue(":numDocumento", $usuario->getDocumento()->getNumDocumento(), PDO::PARAM_STR);
				$insert->execute();
			
				$insert->closeCursor();
			}

			if ($usuario->possuiEndereco()) {

				$sql = "INSERT INTO endereco (seqUsuario, logradouro, codPostal, localidade, pais) 
						VALUES (:seqUsuario, :logradouro, :codPostal, :localidade, :pais)";
				$insert = $bd->prepare($sql);
				$insert->bindValue(":seqUsuario", $seqUsuario, PDO::PARAM_INT);
				$insert->bindValue(":logradouro", $usuario->getEndereco()->getLogradouro(), PDO::PARAM_STR);
				$insert->bindValue(":codPostal", $usuario->getEndereco()->getCodPostal(), PDO::PARAM_STR);
				$insert->bindValue(":localidade", $usuario->getEndereco()->getLocalidade(), PDO::PARAM_STR);
				$insert->bindValue(":pais", $usuario->getEndereco()->getPais(), PDO::PARAM_STR);
				$insert->execute();

				$insert->closeCursor();
			}

			$bd->commit();
		} catch (PDOException $e) {

			$bd->rollBack();
			throw $e;
		}
	}
}

?>