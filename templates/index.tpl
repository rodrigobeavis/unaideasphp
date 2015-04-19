<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
        <link rel="stylesheet" type="text/css" href="./assets/css/estilo.css">
    </head>
    <body>
        <!--<div>
            <header>
                <img class="img-responsive" src="./assets/img/barra-superior-home.png" id="barra-superior">
                <img class="img-responsive" src="./assets/img/una-ideas-logo.png" id="logo-una-ideas">
            </header>
            <nav class="navbar navbar-default"><header>
                <img class="img-responsive" src="./assets/img/barra-superior-home.png" id="barra-superior">
                <img class="img-responsive" src="./assets/img/una-ideas-logo.png" id="logo-una-ideas">
            </header>
                <div class="container-fluid">
                    <div class="navbar-header">                        
                        <a class="navbar-brand" href="#">WebSiteName</a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </div>
                </div>
            </nav>-->

            <img class="img-responsive" src="./assets/img/barra-superior-home.png" id="barra-superior">

            <img class="img-responsive" src="./assets/img/una-ideas-logo.png" id="logo-una-ideas">
            
            <nav id="menu">
                <ul>
                    <li>Início</li>
                    <li>Cadastrar</li>
                    <li>Sobre</li>
                    <li style="height: 30px; top:100px;"><span style="font-size:20pt; vertical-align:top">Fale conosco</span></li>
                </ul>
            </nav>
            
           <!-- <article class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="PAGINA1">
                                    <div onmouseover="mostraDescricao('descricao-idealizador', 'descricao-professor', 'descricao-investidor')" onmouseout="esconde('descricao-idealizador')" id="quadro1" class="quadros">
                                        <p>Idealizador</p>
                                        <img  id="icone-aluno" src="./assets/img/icone-aluno.png">
                                        <p id="descricao-idealizador" class="descricao" style="display:none">Você é um aluno? Tem um projeto em mente? Escolha essa opção para cadastrar a sua ideia no nosso sistema!</p>			
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="PAGINA2">
                                    <div onmouseover="mostraDescricao('descricao-professor', 'descricao-investidor', 'descricao-idealizador')" onmouseout="esconde('descricao-professor')" id="quadro2" class="quadros">
                                        <p>Professor</p>
                                        <img  id="icone-professor" src="./assets/img/icone-professor.png">
                                        <p id="descricao-professor" class="descricao" style="display:none">Você é professor? Escolha essa opção para ter acesso ao andamento dos projetos e demais funcionalidades.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="PAGINA3">
                                    <div onmouseover="mostraDescricao('descricao-investidor', 'descricao-idealizador', 'descricao-professor')" onmouseout="esconde('descricao-investidor')" id="quadro3" class="quadros">
                                        <p>Investidor</p>
                                        <img id="icone-investidor" src="./assets/img/icone-investidor.png">
                                        <p id="descricao-investidor" class="descricao" style="display:none">É um investidor? Que tal dar uma olhada nos promissores projetos que a instituição tem preparado?</p>
                                    </div>
                                </a>
                            </div>   
                        </div> 
                    </div>
                </div>
            </article>
            <footer>

            </footer>-->
            <table id="tabela">
                <tr>
                    <td>
                        <a href="PAGINA1">
                            <div onmouseover="mostraDescricao('descricao-idealizador', 'descricao-professor', 'descricao-investidor')" onmouseout="esconde('descricao-idealizador')" id="quadro1" class="quadros">
                                <p>Idealizador</p>
                                <img id="icone-aluno" src="./assets/img/icone-aluno.png">
                                <p id="descricao-idealizador" class="descricao" style="display:none">Você é um aluno? Tem um projeto em mente? Escolha essa opção para cadastrar a sua ideia no nosso sistema!</p>			
                            </div>
                        </a>
                    </td>
    
                    <td>
                        <a href="PAGINA2">
                            <div onmouseover="mostraDescricao('descricao-professor', 'descricao-investidor', 'descricao-idealizador')" onmouseout="esconde('descricao-professor')" id="quadro2" class="quadros">
                                <p>Professor</p>
                                <img id="icone-professor" src="./assets/img/icone-professor.png">
                                <p id="descricao-professor" class="descricao" style="display:none">Você é professor? Escolha essa opção para ter acesso ao andamento dos projetos e demais funcionalidades.</p>
                            </div>
                        </a>
                    </td>
    
                    <td>
                        <a href="PAGINA3">
                            <div onmouseover="mostraDescricao('descricao-investidor', 'descricao-idealizador', 'descricao-professor')" onmouseout="esconde('descricao-investidor')" id="quadro3" class="quadros">
                                <p>Investidor</p>
                                <img id="icone-investidor" src="./assets/img/icone-investidor.png">
                                <p id="descricao-investidor" class="descricao" style="display:none">É um investidor? Que tal dar uma olhada nos promissores projetos que a instituição tem preparado?</p>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        {literal}
            <script>
                function mostraDescricao(exibe, esconde, esconde2) {
                    document.getElementById(exibe).style.display = "block";
                    document.getElementById(esconde).style.display = "none";
                    document.getElementById(esconde2).style.display = "none";
                }
                function esconde(esconder) {
                    document.getElementById(esconder).style.display = "none";
                }
            </script>
        {/literal}   
        {include file="footer.tpl"}
    </body>
</html>
