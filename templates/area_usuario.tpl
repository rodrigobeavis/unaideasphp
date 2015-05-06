<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
        <link rel="stylesheet"  href="./assets/css/estilo_pagina_idealizadores1.css">
        <link rel="stylesheet" type="text/css" href="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.css">
    </head>
    <body>
        <header class="cabecalho_new">
            <nav class="navbar">
                <div class="row container-fluid">
                    <div class="col-md-2 navbar-header">                        
                        <a class="navbar-brand img-responsive" href="index.php"><img class="img-responsive" src="./assets/img/una-ideas-logo.png"></a>
                    </div>
                </div>
                <div class="pull-right">                            
                    <ul class="nav nav-pills">
                        <li><a href="#" onclick="exibeMeusProjetos();">Meus projetos</a></li>
                        <li><a href="#abrirModal" onclick="exibeCadastrarProjeto();">Cadastrar novo projeto</a></li>
                        <li><a href="#">{$user_name}</a></li>
                        <li><a href="logout.php" >Logout</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#fale_conosco">Fale conosco</a></li>               
                    </ul>
                </div>             
            </nav>
        </header>
        <section id="section_projetos">
            <div id="projeto">
                <a href="#">
                    <table id="table_projeto">
                        <tr>
                            <td>
                                <h2>Nome do projeto</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Aqui ficará a descrição do projeto. Esta descrição foi previamente escrita no momento do cadastro do projeto no sistema e vai ser de total responabilidade dos idealizadores.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Aqui ficará o percentual já concluído do projeto.</p>
                            </td>
                        </tr>
                    </table>
                </a>
            </div>
            <div id="projeto">
                <a href="#">
                    <table id="table_projeto">
                        <tr>
                            <td>
                                <h2>Nome do projeto</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Aqui ficará a descrição do projeto. Esta descrição foi previamente escrita no momento do cadastro do projeto no sistema e vai ser de total responabilidade dos idealizadores.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Aqui ficará o percentual já concluído do projeto.</p>
                            </td>
                        </tr>
                    </table>
                </a>
            </div>

        </section>
        <footer>
            <div id="rodape">
                <p>UnaIdeas</p>
            </div>
        </footer>

        <div id="abrirModal" class="modalDialog">
            <div id="modal">	 
                <a class="close" title="Fechar" href="#close">X</a>
                <h2>Cadastro de novo projeto</h2>

                <form id="formulario_cadastro_projeto" method="POST" action="#">
                    <input name="nome_projeto" required type="text" placeholder="Nome do projeto" style="width: 100%;"  maxlength="180">
                    <textarea  name="descricao_projeto" required type="text" placeholder="Descrição do projeto" style="width: 100%;" rows="3" maxlength="1800"></textarea>
                    <input id="palavra_chave" name="palavra_chave" required  type="text" placepalavra_chaveholder="Palavras chave"   maxlength="500" data-role="tagsinput"> <!-- data-role="tagsinput"-->
                    <div id="grupo">
                        <table id="table_grupo" style="width:100%;">
                            <tr>
                                <td style="width:45%;">
                                    <span  class="grupo">Integrantes do grupo</span>
                                    <input type="button" id="botao" value="+ Adicionar" onclick="adicionaIntegrante();"></br>			
                                    <div id="input_integrante">
                                        <select class="select_equipe" name="nome1" id="nome" required></select>
                                        <div id="1"></div>
                                    </div>
                                    <span id="texto_numero_integrantes" value="1" style="font-size:15pt; color:#666"> 1 Integrante(s)</span>
                                </td>
                                <td style="vertical-align: top; width: 30%;">
                                    <span id="estado_projeto">Percentual de conclusão</span>
                                    <input type="text" id="valor_status" size="5" style="color: white; text-align: center;">
                                    </br>						
                                    <input id="status_projeto" name="status_projeto" type="range" value="0" min="0" max="100" step="5" onchange="printValue()" style="width: 100%;"/>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" id="cadastro_projeto" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
        {include file="footer.tpl"}
        <script src="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="./system/funcoes/js/f_user_area.js"></script>
        {literal}
            <script type="text/javascript">
                $(document).ready(function () {
                    user_options();
                });
                function user_options() {
                    var detalhes = [];
                    detalhes = {/literal}{$lista_usuarios_da_mesma_turma|@json_encode}{literal};
                    campo_select = document.forms[0].nome;
                    
                    if (detalhes) {
                        campo_select.options.length = 0;
                        
                        //campo_select.options[] = new Option("Selecione os membros...","");
                        for (var i = 0; i < detalhes.length; i++)
                        {
                            campo_select.options[i] = new Option(detalhes[i]['nome_usuario'] + " = RA - " + detalhes[i]['ra_usuario'], detalhes[i]['id_usuario']);
                        }
                        campo_select.options[i] = (new Option("Selecione os membros...","0"));
                       
                      $('.select_equipe option[value="0"]').attr("selected", "selected");
                    }
                }
                function copiar_option(id) {
                   // alert(id);
                    $('#nome' + id).html($('#nome').html());
                    //alert($('#nome').html());
                }
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
                function adicionaIntegrante() {

                    var quantidadeIntegrantes = document.getElementById("texto_numero_integrantes").getAttribute("value");
                    quantidadeIntegrantes++;
                    var divanterior = quantidadeIntegrantes - 1;
                    var proximadiv = quantidadeIntegrantes + 1;
                    if (quantidadeIntegrantes < 8) {
                    // input = "<input id='nome" + quantidadeIntegrantes + "' type=text required placeholder='Nome do integrante' style='width: 70%;'><input type='button' id='" + divanterior + "'class='botaoremove' value='-'' onclick='removeIntegrante(id)''></br></div><div id='" + quantidadeIntegrantes + "'>";
                    input = "<select id='nome" + quantidadeIntegrantes + "' name='nome" + quantidadeIntegrantes + "'required placeholder='Nome do integrante' class='select_equipe'> </select>\n\<input type='button' id='" + divanterior + "'class='botaoremove' value='-'' onclick='removeIntegrante(id)''></br></div><div id='" + quantidadeIntegrantes + "'>";
                    document.getElementById(divanterior).innerHTML = input;
                    document.getElementById("texto_numero_integrantes").setAttribute("value", quantidadeIntegrantes);
                    document.getElementById("texto_numero_integrantes").innerHTML = quantidadeIntegrantes + " Integrantes";
                    copiar_option(quantidadeIntegrantes);
                    }
                    
                }
                function removeIntegrante(valor) {
                    var remover = valor;
                    document.getElementById(remover).innerHTML = "";
                    var quantidadeIntegrantes = document.getElementById("texto_numero_integrantes").getAttribute("value");
                    quantidadeIntegrantes--;
                    document.getElementById("texto_numero_integrantes").setAttribute("value", quantidadeIntegrantes);
                    document.getElementById("texto_numero_integrantes").innerHTML = quantidadeIntegrantes + " Integrantes";
                }
            </script>
        {/literal} 
    </body>
</html>
