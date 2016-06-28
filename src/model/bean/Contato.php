<?php

class Contato {

	private $email;
	private $telefone;

	public function getEmail() {

		return $this->email;
	}

	public function setEmail($email) {

		$this->email = $email;
	}

	public function getTelefone() {
	
		return $this->telefone;
	}
	
	public function setTelefone($telefone) {
	
		$this->telefone = $telefone;
	}
}

?>