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
                <div class="well">
                    <div class="row filtro_turma">
                        <form role="form" method="POST" action="#" id="buscar_tema_form">
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label for="btn_buscar">Localizar</label>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Digite o tema que deseja localizar...">
                                </div>
                                <div class="col-xs-2">
                                    <input type="submit" class="btn btn-default" id="btn_buscar" name="btn_buscar" value="Buscar" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>            
            </div>
        </div>
        <section id="section_projetos">
            {section name="projetos" loop=$projetos_por_tema}
                <div id="projeto{$smarty.section.projetos.index}" class="projeto">
                    <table id="projeto{$smarty.section.table_projeto.index}" class="table_projeto">
                        <tr>
                            <!--<td class="table_left"> </td> -->
                            <td class="table_right" colspan="2">
                                <h2>&nbsp;&nbsp;{$projetos_por_tema[projetos].tema_projeto}&nbsp;&nbsp; <button id="editar_projeto_call" type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#editar_projeto{$smarty.section.projetos.index}">Enviar Mensagem</button></h2>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Editar Equipe</button>-->
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar_projeto{$smarty.section.projetos.index}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content modal_editar">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modal_editar_projeto{$smarty.section.projetos.index}">{$projetos_por_tema[projetos].tema_projeto}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formulario_editar_projeto" method="POST" action="#">

                                            <input id="id_projeto{$smarty.section.projetos.index}" name="editar_id_projeto" type="hidden" value="{$projetos_por_turma[projetos].id_projeto}">
                                            <input id="nome_projeto{$smarty.section.projetos.index}" name="editar_nome_projeto" required type="text" placeholder="Nome do projeto" value="{$projetos_por_tema[projetos].tema_projeto}" style="width: 100%;"  maxlength="180">
                                            <textarea id="nome_projeto{$smarty.section.projetos.index}" name="editar_descricao_projeto" required type="text" placeholder="Descrição do projeto" style="width: 100%;" rows="3" maxlength="1800">{$projetos_por_tema[projetos].descricao_projeto}</textarea>
                                            <input id="palavra_chave{$smarty.section.projetos.index}" name="editar_palavra_chave" required  type="text" placeholder="Palavras chave" value="{$projetos_por_tema[projetos].palavras_chave_projeto}"  maxlength="500" data-role="tagsinput"> <!-- data-role="tagsinput"-->
                                            <span id="estado_projeto{$smarty.section.projetos.index}">Percentual de conclusão</span>
                                            <input type="text" id="valor_status{$smarty.section.projetos.index}" size="5" style="color: white; text-align: center;">
                                            </br>
                                            <input id="status_projeto{$smarty.section.projetos.index}" name="editar_status_projeto" type="range" value="{$projetos_por_tema[projetos].status}" min="0" max="100" step="5" onchange="printValue({$smarty.section.projetos.index});" style="width: 100%;"/>                    
                                            <div class="modal-footer">
                                                <input id="alterar_projeto{$smarty.section.projetos.index}" type="submit" class="btn btn-success" value="Enviar">
                                                <button id="cancelar_editacao{$smarty.section.projetos.index}" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <tr>
                            <td class="table_left"><label>Descrição</label></td>
                            <td>
                                <p>{$projetos_por_tema[projetos].descricao_projeto}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_left"><label>Palavras chave</label></td>
                            <td>
                                <p>{$projetos_por_tema[projetos].palavras_chave_projeto}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_left"><label>Equipe</label></td>
                            <td>
                                {section name="eq" loop=$projetos_por_tema[projetos].membros_equipe}
                            <li class="">{$projetos_por_tema[projetos].membros_equipe[eq].nome_usuario}</li>
                            {/section}
                        </td>
                        </tr>
                        <tr>
                            <td class="table_left"><label>Progresso</label></td>
                            <td>                                
                                <p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" style="width: {$projetos_por_tema[projetos].status}%">{$projetos_por_tema[projetos].status}% Pronto
                                        <span class="sr-only">{$projetos_por_tema[projetos].status}% Complete (success)</span>
                                    </div>
                                    <div class="progress-bar progress-bar-warning" style="width: {100 - $projetos_por_tema[projetos].status}%">{100 - $projetos_por_tema[projetos].status}% A fazer
                                        <span class="sr-only">{100 - $projetos_por_tema[projetos].status}% Complete (warning)</span>
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
        <script src="./system/funcoes/js/f_investidor_area.js"></script>
        {literal}
            <script type="text/javascript">
                $(function() {
                    var availableTags = {/literal}{$lista_temas_projetos|@json_encode}{literal};
                  $( "#pesquisar" ).autocomplete({
                    source: availableTags
                  });
                });
            </script>
        {/literal} 
    </body>
</html>
