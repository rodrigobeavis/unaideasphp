<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
        <link href="./assets/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="container">
    <legend class="well well-sm">Professor</legend>
    <form id="cadastro_gravar_user" method='POST' action='' class="">
        <div class="row form-group">
            <div class="col-md-5">
                <input id="nome_professor" name="nome_professor" placeholder="Nome" maxlength="90" required="" class="form-control" type="text">
            </div>
            <div class="col-md-3">
                <input id="mat_professor" name="mat_professor" placeholder="Matrícula" maxlength="12" class="form-control" required="" type="text">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-5">
                <input id="email_professor" name="email_professor" placeholder="Email" maxlength="100" class="form-control" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="telefone_professor" name="telefone_professor" placeholder="Telefone" maxlength="12"class="form-control" required="" type="text">
            </div>
            <div class="col-md-3">
                <select id="tipo_professor" name="tipo_professor" class="form-control">
                    <option disabled selected value="">Tipo...</option>
                    <option value="1">Orientador</option>
                    <option value="2">Avaliador</option>
                    <option value="3">Avaliador/Orientador</option>
                </select>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-8">
                        <input id="user_name" name="user_name" maxlength="18" placeholder="Login" class="form-control" required="" type="text">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <input id="keyu" name="keyu" placeholder="Senha" maxlength="15" class="form-control" required type="password">
                    </div>
                    <div class="col-md-4">
                        <meter value="0" id="mtSenha" max="35">Força da senha</meter>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <input id="keyu2"  placeholder="Confirme a senha" maxlength="15" class="form-control" required type="password">
                    </div>
                    <div class="col-md-4">
                        <h4><label id="erro_senha" class="label btn-warning">As senhas não conferem</label></h4>
                        <input id="tipo" name="tipo" value="2" type="hidden">
                    </div>
                </div>
            </div>
        </div></form>
        <div class="control-group">
            <label class="control-label" for="button1id"></label>
            <div class="controls">
                <button id="button1id" class="btn btn-primary" >cadastrar</button><!-- data-dismiss="modal" data-toggle="modal" data-target="#login" -->
                <button id="cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    
    {include file="footer.tpl"}
    <script src="./assets/js/complexifyjs/jquery.complexify.min.js"></script>
    <script src="./assets/js/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="./system/funcoes/js/f_cadastros.js"></script>
</body>    
</html>
