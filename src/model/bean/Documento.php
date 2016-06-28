<?php

class Documento {

	private $tipoDocumento;
	private $numDocumento;

	public function getTipoDocumento() {

		return $this->tipoDocumento;
	}

	public function setTipoDocumento($tipoDocumento) {

		$this->tipoDocumento = $tipoDocumento;
	}

	public function getNumDocumento() {
	
		return $this->numDocumento;
	}
	
	public function setNumDocumento($numDocumento) {
	
		$this->numDocumento = $numDocumento;
	}

	public function possuiDocumento() {

		$retorno = (isset($this->numDocumento)) ? true : false;

		return $retorno;
	}
}

?>