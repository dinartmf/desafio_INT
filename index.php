<?php
//require_once 'src/controller/service/Autoload.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="src/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="src/js/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="src/js/validacao.js"></script>
        <script type="text/javascript" src="src/js/requisicoes.js"></script>

        <meta charset="UTF-8">
        <title>Registre-se gratuitamente</title>
    </head>

    <body>
        <div class="background-form-padrao">
            <div class="form-centro">
                <form onSubmit="return enviarFormAjax()">
                    <table>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Email  <font class="cor-campo-obrigatorio">*</font></td>
                            <td class="espacamento-colunas" colspan="2"><input id="idEmail" type="email" size="45" required /></td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Confirmar Email <font class="cor-campo-obrigatorio">*</font></td>
                            <td class="espacamento-colunas" colspan="2"><input id="idConfEmail" type="email" size="45" onInput="validaConfirmacaoEmail(this)" required /><br><br></td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Password <font class="cor-campo-obrigatorio">*</font></td>
                            <td class="espacamento-colunas" ><input id="idPassword" type="password" required onKeyUp="javascript: validaForcaSenha()" /></td>
                            <td id="idBarraPassword"></td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Confirme Password <font class="cor-campo-obrigatorio">*</font></td>
                            <td class="espacamento-colunas" colspan="2"><input id="idConfPassword" type="password" onInput="validaConfirmacaoPassword(this)" required /><br><br></td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Nome <font class="cor-campo-obrigatorio">*</font></td>
                            <td class="espacamento-colunas" ><input id="idNome" type="text" placeholder="Nome" required /></td>
                            <td><input id="idApelido" type="text" placeholder="Apelido" /></td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Rua / Nº</td>
                            <td class="espacamento-colunas" colspan="2"><input id="idEndereco" type="text"/></td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Código Postal / Localidade</td>
                            <td class="espacamento-colunas"><input id="idCodPostal" type="text" placeholder="Ex. 9999-999" onkeypress="this.value = mascaraCodigoPostal(this.value);" maxlength="9" /></td>
                            <td><input id="idLocalidade" type="text" /></td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">País</td>
                            <td class="espacamento-colunas" colspan="2">
                                <select id="idPais">
                                    <option value="">---</option>
                                    <option value="351">Portugal</option>
                                    <option value="55">Brasil</option>
                                    <option value="52">Mexico</option>
                                    <option value="61">Austrália</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">NIF</td>
                            <td class="espacamento-colunas" ><input id="idNIF" type="text" maxlength="9" onkeypress="return validarApenasNumeros(event)" onblur="validarNIF(this)" /></td>
                            <td id="idErroValidaNIF" style="display: none;">NIF inválido!</td>
                        </tr>
                        <tr>
                            <td class="alinhamento-texto-esquerda">Telefone</td>
                            <td class="espacamento-colunas" colspan="2"><input id="idTelefone" type="tel" placeholder="Insira o número aqui" onkeypress="return validarTelefone(this)" /></td>
                        </tr>
                    </table>
                    <input type="submit" id="idRegistro" value="Registro">
                </form>
            </div>
        </div>
        <div class="form-centro" id="idRetorno"></div>
    </body>
</html>