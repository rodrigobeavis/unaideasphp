<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header_geral.tpl" title=$title}
        <link href="./assets/css/estilo_pagina_professor.css" rel="stylesheet" type="text/css"/>
        <!-- <link rel="stylesheet" type="text/css" href="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.css"> -->
        <link href="./assets/js/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
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
                        <li><a href="#">{$user_name}</a></li>
                        <li><a href="logout.php" >Logout</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#fale_conosco">Fale conosco</a></li>               
                    </ul>
                </div>             
            </nav>
        </header>
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12"> 
                    <div class="well">
                        <div class="row filtro_turma">
                            <form method="POST" action="#" id="selecionar_turma">
                                <div class="col-md-5">
                                    <label class="">Selecione a turma</label>
                                    <select id="turma" name="turma" required>
                                        <option disabled selected>Turma...</option>
                                        {section name=turma loop=$lista_turmas}
                                            <option value="{$lista_turmas[turma].id_turma}">{$lista_turmas[turma].curso_turma}</option>
                                        {/section}
                                    </select>
                                    <input type="submit" class="btn btn-default" id="filtrar_turma" name="filtrar_turma" value="Filtrar" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="section_projetos">
        {section name="projetos" loop=$projetos_por_turma}
            <div id="projeto{$smarty.section.projetos.index}" class="projeto">
                <table id="projeto{$smarty.section.table_projeto.index}" class="table_projeto">
                    <tr>
                        <td class=""><h2>&nbsp;&nbsp;{$projetos_por_turma[projetos].tema_projeto}&nbsp;&nbsp;</h2> </td> 
                        <td class="">
                            <div id="qualificacao_value" class=""> </div>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="editar_projeto{$smarty.section.projetos.index}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modal_editar">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="modal_editar_projeto{$smarty.section.projetos.index}">{$projetos_por_turma[projetos].tema_projeto}</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="qualificacao_trabalho" method="POST" action="#">
                                      <input id="id_projeto{$smarty.section.projetos.index}" name="qualificacao_id_projeto" type="hidden" value="{$projetos_por_turma[projetos].id_projeto}">
                                      <input  id="qualificacao_value2{$smarty.section.projetos.index}" type="text" name="qualificacao_value" value="" />
                                        <div class="modal-footer">
                                            <input id="alterar_projeto{$smarty.section.projetos.index}" type="submit" class="btn btn-warning" value="Salvar alterações">
                                            <button id="cancelar_editacao{$smarty.section.projetos.index}" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td class="table_left"><label>Descri&ccedil;&atilde;o</label></td>
                        <td>
                            <p>{$projetos_por_turma[projetos].descricao_projeto}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_left"><label>Palavras chave</label></td>
                        <td>
                            <p>{$projetos_por_turma[projetos].palavras_chave_projeto}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_left"><label>Equipe</label></td>
                        <td>
                            {section name="eq" loop=$projetos_por_turma[projetos].membros_equipe}
                        <li class="">{$projetos_por_turma[projetos].membros_equipe[eq].nome_usuario}</li>
                        {/section}
                    </td>
                    </tr>
                    <tr>
                        <td class="table_left"><label>Progresso</label></td>
                        <td>                                
                            <p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" style="width: {$projetos_por_turma[projetos].status}%">{$projetos_por_turma[projetos].status}% Pronto
                                    <span class="sr-only">{$projetos_por_turma[projetos].status}% Complete (success)</span>
                                </div>
                                <div class="progress-bar progress-bar-warning" style="width: {100 - $projetos_por_turma[projetos].status}%">{100 - $projetos_por_turma[projetos].status}% A fazer
                                    <span class="sr-only">{100 - $projetos_por_turma[projetos].status}% Complete (warning)</span>
                                </div>
                            </div>
                            </p>
                        </td>
                    </tr>                       
                </table>
            </div>
        {/section}
    </section>
    <footer>
       <div id="rodape">
                <div> UnaIdeas <span class="rodape_email col-md-offset-8"><span class="glyphicon glyphicon-envelope"> </span> contato@unaideas.com.br</span></div>           
            </div>
    </footer>
    {include file="footer_geral.tpl"}        
    <!--<script src="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script> -->
    <script src="./assets/js/bootstrap-multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script src="./system/funcoes/js/f_professor_area.js"></script>
    
</body>
</html>
