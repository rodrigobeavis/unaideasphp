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
                        <li><a href="ranking.php" >Ranking</a></li>
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
                                    <input type="text" class="form-control" id="pesquisar" name="pesquisar" pattern="[^'\x22]+" title="O texto não é válido!" placeholder="Digite o tema que deseja localizar...">
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
                                <h2>&nbsp;&nbsp;{$projetos_por_tema[projetos].tema_projeto}&nbsp;&nbsp; <button id="editar_projeto_call" type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#enviar_email{$smarty.section.projetos.index}">Enviar Mensagem</button></h2>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="enviar_email{$smarty.section.projetos.index}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method='POST' action="#" class="">
                                    <div class="modal-content modal_editar">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal_editar_projeto{$smarty.section.projetos.index}">{$projetos_por_tema[projetos].tema_projeto}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <!-- <div class="row">
                                                         <div class="col-md-12"><input type="email" name='email_fale_conosco' id="email_fale_conosco" class="form-control" placeholder="Insira seu Email"  required></div>
                                                     </div> -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!-- Textarea -->
                                                            <div class="control-group">
                                                                <label class="control-label" for="textarea"></label>
                                                                <div class="controls">                     
                                                                    <textarea id="body_email{$smarty.section.projetos.index}" class="form-control" rows="5" name="body_email" placeholder="Texto..." required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" id="tema_email_projeto{$smarty.section.projetos.index}" name="tema_projeto" value="{$projetos_por_tema[projetos].tema_projeto}">
                                            <input type="hidden" id="id_email_projeto{$smarty.section.projetos.index}" name="id_projeto" value="{$projetos_por_tema[projetos].id_projeto}">
                                            <input class="btn btn-success" type="submit" value="Enviar" data-toggle="tooltip" data-placement="left" title="Click Aqui para enviar">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </form> 
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
            {sectionelse}
                {if $teste_pesquisa}
                    <div class="row">
                        <div id="" class="col-md-6 col-md-offset-3">
                            <div id="" class="alert alert-danger"> 
                                <h4>Pesquise por outro terma...</h4>
                            </div>
                        </div>
                    </div>
                {/if}
            {/section}
            {if $verificacao_email}
                    <div class="row">
                        <div id="" class="col-md-6 col-md-offset-3">
                            <div id="" class="alert alert-success"> 
                                <h4>Email enviado com sucesso...</h4>
                            </div>
                        </div>
                </div>
            {/if}
                <input type="hidden" id="teste_email" value="{$verificacao_email}"/>
            </section>
            <div class="modal fade" id="fale_conosco" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method='POST' action='' class="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel">Contato</h4>
                            </div>
                            <div class="modal-body">
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
                            <input class="btn btn-success" type="submit" value="Enviar" data-toggle="tooltip" data-placement="left" title="Click Aqui para enviar">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <footer>
                <div id="rodape">
                    <div> UNAIDEAS <span class="rodape_email col-md-offset-8"><span class="glyphicon glyphicon-envelope"> </span> contato@unaideas.com.br</span></div>           
                </div>
            </footer>
            {include file="footer_geral.tpl"}        
            <!--<script src="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script> -->
            <script src="./assets/js/bootstrap-multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
            <script src="./system/funcoes/js/f_investidor_area.js"></script>
            {literal}
                <script type="text/javascript">
                    $(function () {
                        var availableTags = {/literal}{$lista_temas_projetos|@json_encode}{literal};
                        $("#pesquisar").autocomplete({
                            source: availableTags
                        });
                    });
                </script>
            {/literal} 
        </body>
    </html>
