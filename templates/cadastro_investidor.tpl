<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
    </head>
    <body class="container">
    <legend class="well well-sm">Investidor</legend>
    <form id="cadastro_gravar_user" method='POST' action='' class="">
        <div class="row form-group">
            <div class="col-md-5">
                <input id="nome_investidor" name="nome_investidor" maxlength="90" placeholder="Nome" required="" class="form-control" type="text">
            </div>
            <div class="col-md-3">
                <input id="rg" name="rg" placeholder="RG" maxlength="12" class="form-control" required="" type="text">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-5">
                <input id="email" name="email" placeholder="Email" maxlength="100" class="form-control" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="tel" name="tel" placeholder="Telefone" maxlength="12" class="form-control" required="" type="text">
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
                        <input id="keyu" name="keyu" maxlength="15" placeholder="Senha" class="form-control" required type="password">
                    </div>
                     <div class="col-md-4">
                        <meter value="0" id="mtSenha" max="35">Força da senha</meter>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <input id="keyu2" maxlength="15"  placeholder="Confirme a senha" class="form-control" required type="password">
                    </div>
                    <div class="col-md-4">
                        <h4><label id="erro_senha" class="label btn-warning">As senhas não conferem</label></h4>
                        <input id="tipo" name="tipo" value="3" type="hidden">
                    </div>
                </div>
            </div>
        </div> </form>
        <div class="control-group">
            <label class="control-label" for="button1id"></label>
            <div class="controls">        
                <button id="button1id" class="btn btn-success">cadastrar</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
   
    {include file="footer.tpl"}
    <script src="./assets/js/complexifyjs/jquery.complexify.min.js"></script>
    <script src="./system/funcoes/js/f_cadastros.js"></script>
</body>    
</html>
