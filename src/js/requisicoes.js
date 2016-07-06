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

	var objetoEnvio = "email=" + email + "&password=" + password + "&nome=" + nome
                    + "&apelido=" + apelido + "&logradouro=" + logradouro + "&codpostal=" + codpostal
                    + "&localidade=" + localidade + "&pais=" + pais + "&nif=" + nif + "&telefone=" + telefone ;

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    var retorno = JSON.parse(xmlhttp.responseText);

                    document.getElementById('idRetorno').innerHTML = retorno['retorno'];
                }
            };

            xmlhttp.open("POST", "src/controller/Controlador.php?acao=" + acao);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.setRequestHeader("Connection", "close");
            xmlhttp.send(objetoEnvio);

            return false;
}