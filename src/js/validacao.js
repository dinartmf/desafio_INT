
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
function validarApenasNumeros(event) {

	validarCaracteres(event, true);
}

function validarNIF(input) {

	if (input.value.length == 9) {

		totalSoma = 0;
		caracteresNIF = input.value.split("");
		controladorRegres = 9;

		for (i = 0; i < caracteresNIF.length; i++) {

			totalSoma += (caracteresNIF[i] * controladorRegres);
			controladorRegres--;
		}

		mod = totalSoma % 11;

		if ((!validaModuloZeroUm(mod) && caracteresNIF[caracteresNIF.length - 1] != 0)
			&& caracteresNIF[caracteresNIF.length - 1] != (11 -mod) ){

			document.getElementById('idErroValidaNIF').style.display = 'block';
		} else {

			document.getElementById('idErroValidaNIF').style.display = 'none';
		}
	}
}

function validaModuloZeroUm(modulo) {

	retorno = false;

	if (modulo == 0 || modulo == 1) {

		retorno = true;
	}

 	return retorno;
}

//------ Validações de pais
function validarSelecaoPais(sgPais) {

	retorno = true;

	if (sgPais == "") {

		retorno = false;
	}

	return retorno;
}

//------ Validações de telefone
function validarTelefone(input) {

	retorno = true;


		selectPais = document.getElementById('idPais');
		indiceSelecionado = selectPais.selectedIndex;
		sgPais = selectPais.options[indiceSelecionado].value;

		if (!validarSelecaoPais(sgPais)) {

			alert('É necessário informar o país.');
			input.focus();

			retorno = false;
		}

		if (sgPais == "351" && input.value.length == 3 && input.value != sgPais) {

			alert('Informe o código do país correto (Portugal: ' + sgPais + ')');
			input.focus();

			retorno = false;
		} else if (sgPais == "55" && input.value.length == 2 && input.value != sgPais) {

			alert('Informe o código do país correto (Brasil: ' + sgPais + ')');
			input.focus();

			retorno = false;
		} else if (sgPais == "52" && input.value.length == 2 && input.value != sgPais) {

			alert('Informe o código do país correto (México: ' + sgPais + ')');
			input.focus();

			retorno = false;
		} else if (sgPais == "61" && input.value.length == 2 && input.value != sgPais) {

			alert('Informe o código do país correto (Austrália: ' + sgPais + ')');
			input.focus();

			retorno = false;
		}

	return retorno;
}

//------ Funções reutilizáveis
function validarCaracteres(caractere, validarNumero) {

	retorno = false;

	codTecla = caractere.keyCode;

	if (codTecla >= 48 && codTecla <= 57) {

		retorno = true;
	}

	return retorno;
}

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