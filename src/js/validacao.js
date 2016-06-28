
/* JS de validação de dados */

// ------ Validações e-mail
function validaConfirmacaoEmail(input) {

	if (input.value != document.getElementById('idEmail').value) {

		input.setCustomValidity('Os emails informados são divergentes.');
	} else {

		input.setCustomValidity('');
	}
}

// ------ Validações password
function validaConfirmacaoPassword(input) {

	if (input.value != document.getElementById('idPassword').value) {

		input.setCustomValidity('Os passwords informados são divergentes.');
	} else {

		input.setCustomValidity('');
	}
}

function validaForcaSenha() {

	senha = document.getElementById('idPassword').value;
	forca = 0;

	if (senha.length < 7) {

		forca += 10;
	} else {

		forca += 25;
	}

	forca += pontuacaoForca(senha);

	return barraForca(forca);
}

function pontuacaoForca(senha) {

	caracteresMin = /[a-z]+/
	caracteresMai = /[A-Z]+/
	caracteresDig = /[0-9]+/
	caracteresEsp = /[!@#$%*()]+/

	retorno = 0;

	if (senha.match(caracteresMin)) {

		retorno += 15;
	}

	if (senha.match(caracteresMai) ) {

		retorno += 15;
	}

	if (senha.match(caracteresDig)) {

		retorno += 10;
	}

	if (senha.match(caracteresEsp)) {

		retorno += 35;
	}

	return retorno;
}

function barraForca(forca) {

	if ( forca < 50) {

		document.getElementById('idBarraPassword').innerHTML = '<td bgcolor="red" width="' + forca + '">Fraca</td>';
	} else if (forca < 100 && forca >= 50) {

		document.getElementById('idBarraPassword').innerHTML = '<td bgcolor="yellow" width="' + forca + '">Razoável</td>';
	} else if (forca == 100) {

		document.getElementById('idBarraPassword').innerHTML = '<td bgcolor="green" width="' + forca + '">Muito forte</td>';
	}
}

// ------ Validações código postal
function mascaraCodigoPostal(valor) {

	posicaoBarra = 4;

	if (valor.length == 4) {

		valor += "-";
	}

	return valor;
}

function limiteDigitosCodigoPostal(valor) {

	return limiteDigitos(valor, 8);
}

//------ Validações NIF
function validarNIF(valor) {

	if (strlen(valor) == 9) {

		verificarDigito(valor);
	}
}

function veriricarDigito(valor) {

	for (i = 0; i <= strlen(valor); i++) {

		
	}
}

function limiteDigitosNIF(valor) {

	return limiteDigitos(valor, 9);
}

//------ Funções reutilizáveis
function limiteDigitos(valor, limite) {

	retorno = true;

	if (valor.length >= limite) {

		retorno = false;
	}

	return retorno;
}

function strlen(valor) {

	return valor.length;
}