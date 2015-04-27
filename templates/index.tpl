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
                <li><a class="menu_index" href="index.php">Início</a></li>
                <li><a class="menu_index" href="" data-toggle="modal" data-target="#cadastro">Criar Conta</a></li>
                <li><a href="#" class="menu_index">Sobre</a></li>
                <li style="height: 30px; top:100px;"><span style="font-size:20pt; vertical-align:top"><a class="menu_index" href="" data-toggle="modal" data-target="#fale_conosco">Fale conosco</a></span></li>
            </ul>
        </nav>
        <div class="modal fade" id="cadastro" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Cadastro de usuário</h4>
                        <form id="identifica_tipo" method='POST' action=''>
                            <label>Selecione o tipo de acesso</label>
                            <input class="control-group" type="radio" name="tipo_user" id="tipo_user1" value="1" /> Aluno 
                            <input class="control-group" type="radio" name="tipo_user" id="tipo_user2" value="2" /> Professor 
                            <input class="control-group" type="radio" name="tipo_user" id="tipo_user3" value="3" /> Investidor 
                        </form>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="formulario"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"> </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" id="fale_conosco" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Contato</h4>
                    </div>
                    <div class="modal-body">
                        <form method='POST' action='' class="">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-md-12"><input type="email" name='email_fale_conosco' id="email_fale_conosco" class="form-control" placeholder="Insira seu Email"  required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="textarea"></label>
                                                <div class="controls">                     
                                                    <textarea id="textarea_fale_conosco" class="form-control" rows="5" name="textarea_fale_conosco" placeholder="Texto..." required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Enviar" data-toggle="tooltip" data-placement="left" title="Click Aqui para enviar">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
                    <a href="" data-toggle="modal" data-target="#login">
                        <div onmouseover="mostraDescricao('descricao-idealizador', 'descricao-professor', 'descricao-investidor')" onmouseout="esconde('descricao-idealizador')" id="quadro1" class="quadros">
                            <p>Idealizador</p>
                            <img id="icone-aluno" src="./assets/img/icone-aluno.png">
                            <p id="descricao-idealizador" class="descricao" style="display:none">Você é um aluno? Tem um projeto em mente? Escolha essa opção para cadastrar a sua ideia no nosso sistema!</p>			
                    </a>
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#login">
                        <div onmouseover="mostraDescricao('descricao-professor', 'descricao-investidor', 'descricao-idealizador')" onmouseout="esconde('descricao-professor')" id="quadro2" class="quadros">
                            <p>Professor</p>
                            <img id="icone-professor" src="./assets/img/icone-professor.png">
                            <p id="descricao-professor" class="descricao" style="display:none">Você é professor? Escolha essa opção para ter acesso ao andamento dos projetos e demais funcionalidades.</p>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#login">
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
    <div class="modal fade" id="login" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Login</h4>
                </div>
                <form method='POST' action='login.php'>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <input type="text" name='user_name' id="user_name" class="form-control" placeholder="Insira seu usuário"  required><br>
                                <input placeholder="Senha" name='keyu' id="keyu" class="form-control" type="password"  required><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="validacao"></div>
                        <input class="btn btn-primary" type="submit" value="Entrar" data-toggle="tooltip" data-placement="left" title="Click Aqui para entrar.">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
    <script src="./system/funcoes/js/f_index.js"></script>
</body>
</html>
