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
                    <div class="col-md-4">
                        <p></p>
                    </div>
                </div>            
            </div>
        </div>
        <article>

        </article>
        <footer>
            <div id="rodape">
                <div> UnaIdeas <span class="rodape_email col-md-offset-8"><span class="glyphicon glyphicon-envelope"> </span> contato@unaideas.com.br</span></div>           
            </div>
        </footer>
        {include file="footer_geral.tpl"}        
        <!--<script src="./assets/js/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script> -->
        <script src="./assets/js/bootstrap-multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
        <script src="./system/funcoes/js/f_rankin.js"></script>
    </body>
</html>
