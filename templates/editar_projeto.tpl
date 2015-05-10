<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
        <link rel="stylesheet"  href="./assets/css/estilo_pagina_idealizadores1.css">
        <link rel="stylesheet" type="text/css" href="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.css">
        <link href="./assets/js/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
            <div id="modal modalDialog">	 
                <a class="close" title="Fechar" href="#close">X</a>
                <h2>Cadastro de novo projeto</h2>
                <form id="formulario_cadastro_projeto" method="POST" action="#">
                    <input name="nome_projeto" required type="text" placeholder="Nome do projeto" value="" style="width: 100%;"   maxlength="180">
                    <textarea  name="descricao_projeto" required type="text" placeholder="Descrição do projeto" value="" style="width: 100%;" rows="3" maxlength="1800"></textarea>
                    <input id="palavra_chave" name="palavra_chave" required  type="text" placeholder="Palavras chave" value=""   maxlength="500" data-role="tagsinput"> <!-- data-role="tagsinput"-->
                    <div id="grupo">
                        <table id="table_grupo" style="width:100%;">
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <span id="estado_projeto">Percentual de conclusão</span>
                                    <input type="text" id="valor_status" size="5" style="color: white; text-align: center;">
                                    </br>						
                                    <input id="status_projeto" name="status_projeto" type="range" value="0" min="0" max="100" step="5" onchange="printValue();" style="width: 100%;"/>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" id="cadastro_projeto" value="Cadastrar">
                    </div>
                </form>
            </div>
        {include file="footer.tpl"}        
        <script src="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="./assets/js/bootstrap-multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
        <script src="./system/funcoes/js/f_user_area.js"></script>
        {literal}
            <script type="text/javascript">
                function printValue() {
                    var origem = document.getElementById("status_projeto").value;
                    if (origem < 20)
                        document.getElementById("valor_status").style.background = "#800000";
                    if (origem >= 20 && origem < 40)
                        document.getElementById("valor_status").style.background = "#ff4500";
                    if (origem >= 40 && origem < 60)
                        document.getElementById("valor_status").style.background = "#ffff00";
                    if (origem >= 60 && origem < 80)
                        document.getElementById("valor_status").style.background = "#7cfc00";
                    if (origem >= 80)
                        document.getElementById("valor_status").style.background = "#00ff00";
                    if (origem == 100)
                        document.getElementById("valor_status").style.background = "#4682B4";
                    document.getElementById("valor_status").value = origem + "%";
                }
            </script>
        {/literal} 
    </body>
