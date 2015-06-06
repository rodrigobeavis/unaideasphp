<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header_geral.tpl" title=$title}
        <link href="./assets/css/estilo_pagina_ranking.css" rel="stylesheet" type="text/css"/>
        <link href="./assets/js/morris.js/morris.css" rel="stylesheet" type="text/css"/>
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
                            {if $area_user == 1}
                            <li><a href="area_usuario.php">Home Usuário</a></li>
                            {elseif $area_user == 2}
                            <li><a href="area_professor.php">Home Professor</a></li>
                            {else}
                            <li><a href="area_investidor.php">Home Investidor</a></li>
                            {/if}
                        <li><a href="logout.php" >Logout</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#fale_conosco">Fale conosco</a></li>               
                    </ul>
                </div>             
            </nav>
        </header>
        <article>
            <div class="container titulo_pagina"> 
                <div class="row ">
                    <div class="col-md-12">
                        <div class="well">
                            <span class="fa fa-bar-chart-o"></span> Ranking dos Projetos
                        </div>
                    </div>            
                </div> 
                <div id="" class="row">
                    <div id="" class="col-md-9"> 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Top 10</h3>
                            </div>
                            <div class="panel-body">
                                <div id="chart_top_10" class=""> </div>
                            </div>
                        </div>
                    </div>
                    <div id="" class="col-md-3"> 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Top 10</h3>
                            </div>
                            <div class="panel-body">
                                <table border="0" class="top10 table table-condensed table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Tema</th>
                                            <th>Nota</th>
                                        </tr>
                                    </thead>                                    
                                        <tbody>
                                            {section name="top_geral" loop=$lista_top10_geral}
                                            <tr>
                                                <td>{$smarty.section.top_geral.iteration}</td>
                                                <td id="tema{$smarty.section.top_geral.index}">{$lista_top10_geral[top_geral].tema_projeto}</td>
                                                <td id="nota{$smarty.section.top_geral.index}">{$lista_top10_geral[top_geral].media_notas}</td>
                                            </tr>
                                            {/section}
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="" class="row">
                    <div id="" class="col-md-9"> 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Classificação por Turma</h3>
                            </div>
                            <div class="panel-body">
                                <div id="chart_top_10_turma" class=""> </div>
                            </div>
                        </div>
                    </div>
                    <div id="" class="col-md-3"> 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <form method="POST" action="#" id="selecionar_turma">
                                       <select id="turma" name="turma" required class="input-sm">
                                            <option disabled selected>Selecione a Turma...</option>
                                            {section name=turma loop=$lista_turmas}
                                                <option value="{$lista_turmas[turma].id_turma}">{$lista_turmas[turma].curso_turma}</option>
                                            {/section}
                                        </select>
                                         <input type="submit" class="btn btn-circle btn-default" id="filtrar_turma" name="filtrar_turma" value="OK" > 
                                    </form>
                                </h5>
                            </div>
                            <div class="panel-body">
                               <table border="0" class="top10 table table-condensed table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Tema</th>
                                            <th>Nota</th>
                                        </tr>
                                    </thead>                                    
                                        <tbody>
                                            {section name="top_turma" loop=$lista_top10_turma}
                                            <tr>
                                                <td>{$smarty.section.top_turma.iteration}</td>
                                                <td id="tema_turma{$smarty.section.top_turma.index}">{$lista_top10_turma[top_turma].tema_projeto}</td>
                                                <td id="nota_turma{$smarty.section.top_turma.index}">{$lista_top10_turma[top_turma].media_notas}</td>
                                            </tr>
                                            {/section}
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <footer>
            <div id="rodape">
                <div> UnaIdeas <span class="rodape_email col-md-offset-8"><span class="glyphicon glyphicon-envelope"> </span> contato@unaideas.com.br</span></div>           
            </div>
        </footer>
        {include file="footer_geral.tpl"}        
        <script src="./assets/js/morris.js/raphael-min.js" type="text/javascript"></script>
        <script src="./assets/js/morris.js/morris.min.js" type="text/javascript"></script>
        <script src="./system/funcoes/js/f_rankin.js" type="text/javascript"></script>
        <script src="./system/funcoes/js/f_ranking.js" type="text/javascript"></script>
        <!--   {literal}
               
               <script>
                   $(function () {
    
       Morris.Bar({
           element: 'chart_top_10',
           data: [
               {y: '2006', a: 100, b: 90},
               {y: '2007', a: 75, b: 65},
               {y: '2008', a: 50, b: 40},
               {y: '2009', a: 75, b: 65},
               {y: '2010', a: 50, b: 40},
               {y: '2011', a: 75, b: 65},
               {y: '2012', a: 100, b: 90}
           ],
           xkey: 'y',
           ykeys: ['a', 'b'],
           labels: ['Series A', 'Series B']
       });
   
   });
               </script>
        {/literal} -->
        </body>
    </html>
