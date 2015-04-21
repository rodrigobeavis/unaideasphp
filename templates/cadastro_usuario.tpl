<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
    </head>
    <body class="container">
    <legend class="well well-sm">Usuário</legend>
    <form method='POST' action='cadastro_gravar_user.php' class="">
        <div class="row form-group">
            <div class="col-md-5">
                <input id="nome_usuario" name="nome_usuario" placeholder="Nome" required="" class="form-control" type="text">
            </div>
            <div class="col-md-3">
                <input id="rg" name="rg" placeholder="RG" class="form-control" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="ra" name="ra" placeholder="RA" class="form-control" type="text">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-5">
                <input id="email" name="email" placeholder="Email" class="form-control" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="tel" name="tel" placeholder="Telefone" class="form-control" required="" type="text">
            </div>
            <div class="col-md-3">
                <select id="turma" name="turma" class="form-control">
                    <option disabled selected>Turma...</option>
                    {section name=turma loop=$lista_turmas}
                        <option value="{$lista_turmas[turma].id_turma}">{$lista_turmas[turma].curso_turma}</option>
                    {/section}
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-8">
                        <input id="name_user" name="name_user" placeholder="Login" class="form-control" required="" type="text">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <input id="keyu" name="keyu" placeholder="Senha" class="form-control" required type="password">
                    </div>
                    <div class="col-md-4">
                        <meter value="0" id="mtSenha" max="35">Força da senha</meter>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <input id="keyu2"  placeholder="Confirme a senha" class="form-control" required type="password">
                    </div>
                    <div class="col-md-4">
                        <h4><label id="erro_senha" class="label btn-warning">As senhas não conferem</label></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="button1id"></label>
            <div class="controls">
                <input name="tipo" value="1" type="hidden">
                <button id="button1id" class="btn btn-success">cadastrar</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </form>
    {include file="footer.tpl"}
    <script src="./assets/js/complexifyjs/jquery.complexify.min.js"></script>
    <script src="./system/funcoes/js/f_cadastros.js"></script>
</body>    
</html>
