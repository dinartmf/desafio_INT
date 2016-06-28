<?php

/**
 * @author dinartmf
 *
 */
class Pessoa {

	private $nome;
	private $apelido;
	private $endereco;
	private $documento;

	public function getNome() {

		return $this->nome;
	}

	public function setNome($nome) {

		$this->nome = $nome;
	}

	public function getApelido() {
	
		return $this->apelido;
	}
	
	public function setApelido($apelido) {
	
		$this->apelido = $apelido;
	}

	public function getEndereco() {
	
		return $this->endereco;
	}
	
	public function setEndereco($endereco) {
	
		$this->endereco = $endereco;
	}

	public function getDocumento() {
	
		return $this->documento;
	}
	
	public function setDocumento($documento) {
	
		$this->documento = $documento;
	}

	public function possuiEndereco() {
	
		return $this->getEndereco()->possuiEndereco();
	}

	public function possuiDocumento() {
	
		return $this->getDocumento()->possuiDocumento();
	}
}

?>