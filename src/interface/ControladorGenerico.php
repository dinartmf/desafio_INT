<?php

interface ControladorGenerico {

	public function realizarAcao($acao, $dadosEntrada);
	public function cadastrar($dadosEntrada);
	public function consultar($dadosEntrada);
	public function alterar($dadosEntrada);
	public function excluir($dadosEntrada);
}

?>