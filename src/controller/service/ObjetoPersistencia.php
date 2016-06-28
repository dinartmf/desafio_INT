<?php 
include_once('Fabrica.php');
include_once('../util/EnumDOC.php');
?>

<?php

function montarUsuarioInclusao($objetoPersistencia) {

	$endereco = Fabrica::obterInstancia('Endereco');
	$endereco->setLogradouro($objetoPersistencia['logradouro']);
	$endereco->setCodPostal($objetoPersistencia['codPostal']);
	$endereco->setLocalidade($objetoPersistencia['localidade']);
	$endereco->setPais($objetoPersistencia['pais']);

	$contato = Fabrica::obterInstancia('Contato');
	$contato->setEmail($objetoPersistencia['email']);
	$contato->setTelefone($objetoPersistencia['telefone']);

	$documento = Fabrica::obterInstancia('Documento');
	$documento->setTipoDocumento(EnumDOC::TIPO_DOC_NIF);
	$documento->setNumDocumento($objetoPersistencia['nif']);

	$usuario = Fabrica::obterInstancia('Usuario');
	$usuario->setNome($objetoPersistencia['nome']);
	$usuario->setApelido($objetoPersistencia['apelido']);
	$usuario->setPassword($objetoPersistencia['password']);
	$usuario->setEndereco($endereco);
	$usuario->setContato($contato);
	$usuario->setDocumento($documento);

	return $usuario;
}

?>