<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
        <link rel="stylesheet" type="text/css" href="./assets/css/estilo_pagina_idealizadores1.css">
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
                        <li><a href="#" data-toggle="modal" data-target="#fale_conosco">Fale conosco</a></li>               
                    </ul>
                </div>             
            </nav>
        </header>


        <footer>
            <div id="rodape">
                <p>UnaIdeas</p>
            </div>
        </footer>
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

                function adicionaIntegrante() {

                    var quantidadeIntegrantes = document.getElementById("texto_numero_integrantes").getAttribute("value");
                    quantidadeIntegrantes++;
                    var divanterior = quantidadeIntegrantes - 1;
                    var proximadiv = quantidadeIntegrantes + 1;
                    input = "<input id='nome" + quantidadeIntegrantes + "' type=text required placeholder='Nome do integrante' style='width: 70%;'><input type='button' id='" + divanterior + "'class='botaoremove' value='-'' onclick='removeIntegrante(id)''></br></div><div id='" + quantidadeIntegrantes + "'>";
                    document.getElementById(divanterior).innerHTML = input;
                    document.getElementById("texto_numero_integrantes").setAttribute("value", quantidadeIntegrantes);
                    document.getElementById("texto_numero_integrantes").innerHTML = quantidadeIntegrantes + " Integrantes";
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
        {include file="footer.tpl"}
    </body>
</html>
