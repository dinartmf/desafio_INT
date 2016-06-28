function enviarFormAjax() {

	acao = document.getElementById('idRegistro').value.toLowerCase();

	email = document.getElementById('idEmail').value;
	password = document.getElementById('idPassword').value;
	nome = document.getElementById('idNome').value;
	apelido = document.getElementById('idApelido').value;
	logradouro = document.getElementById('idEndereco').value;
	codpostal = document.getElementById('idCodPostal').value;
	localidade = document.getElementById('idLocalidade').value;
	pais = document.getElementById('idPais').value;
	nif = document.getElementById('idNIF').value;
	telefone = document.getElementById('idTelefone').value;

	var objetoJson = '{"email" : "' + email + '", "password" : "' + password + '", '
			+ '"nome" : "' + nome + '", "apelido" : "' + apelido + '", '
			+ '"logradouro" : "' + logradouro + '", "codpostal" : "' + codpostal + '", ' 
			+ '"localidade" : "' + localidade + '", "pais" : "' + pais + '", ' 
			+ '"nif" : "' + nif + '", "telefone" : "' + telefone + '"}';

	$.ajax({
        type: "POST",
        url: "src/controller/Controlador.php?acao=" + acao,
        dataType: "json",
        data: JSON.parse(objetoJson),
        success: function (retorno) {
            if (retorno) {

            	document.getElementById('idRetorno').innerHTML = retorno['retorno'];
            } else {

                alert("ERRO! - Ocorreu um erro inesperado, favor contactar o suporte. - (VIEW)");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){

        	alert("ERRO! - Ocorreu um erro inesperado, favor contactar o suporte. - (VIEW)");
        }
    });

	return false;
}