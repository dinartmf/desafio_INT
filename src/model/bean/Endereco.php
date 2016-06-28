<?php

class Endereco {

	private $logradouro;
	private $codPostal;
	private $localidade;
	private $pais;

	public function __construct() {
		
	}

	public function getLogradouro() {

		return $this->logradouro;
	}

	public function setLogradouro($logradouro) {

		$this->logradouro = $logradouro;
	}

	public function getCodPostal() {
	
		return $this->codPostal;
	}
	
	public function setCodPostal($codPostal) {
	
		$this->codPostal = $codPostal;
	}

	public function getLocalidade() {

		return $this->localidade;
	}

	public function setLocalidade($localidade) {

		$this->localidade = $localidade;
	}

	public function getPais() {

		return $this->pais;
	}

	public function setPais($pais) {

		$this->pais = $pais;
	}

	public function possuiEndereco() {

		$retorno = (isset($this->logradouro) || isset($this->codPostal) || isset($this->localidade) 
				|| isset($this->pais)) ? true : false;

		return $retorno;
	}
}

?>