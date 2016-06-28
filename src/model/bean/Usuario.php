<?php 

require_once('Pessoa.php');

class Usuario extends Pessoa {

	private $password;
	private $contato;

	public function getPassword() {
	
		return $this->password;
	}
	
	public function setPassword($password) {
	
		$this->password = $password;
	}

	public function getContato() {
	
		return $this->contato;
	}
	
	public function setContato($contato) {
	
		$this->contato = $contato;
	}
}

?>