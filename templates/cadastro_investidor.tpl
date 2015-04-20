<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        {include file="header.tpl" title=$title}
    </head>
    <body class="container">

        <form class="form-horizontal">
            <fieldset>
                <!-- Form Name -->
                <legend>Investidor</legend>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="nome_usuario"></label>
                    <div class="controls">
                        <input id="nome_usuario" name="nome_usuario" placeholder="Nome" required="" class="input-large" type="text">

                    </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="rg"></label>
                    <div class="controls">
                        <input id="rg" name="rg" placeholder="RG" class="input-small" required="" type="text">

                    </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="ra"></label>
                    <div class="controls">
                        <input id="ra" name="ra" placeholder="RA" class="input-small" type="text">

                    </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="tel"></label>
                    <div class="controls">
                        <input id="tel" name="tel" placeholder="Telefone" class="input-small" required="" type="text">

                    </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="email"></label>
                    <div class="controls">
                        <input id="email" name="email" placeholder="Email" class="input-large" required="" type="text">

                    </div>
                </div>
                <!-- Select Basic -->
                <div class="control-group">
                    <label class="control-label" for="turma"></label>
                    <div class="controls">
                        <select id="turma" name="turma" class="input-medium">
                            <option>ADS</option>
                        </select>
                    </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="name_user"></label>
                    <div class="controls">
                        <input id="name_user" name="name_user" placeholder="Login" class="input-medium" required="" type="text">

                    </div>
                </div>
                <!-- Password input-->
                <div class="control-group">
                    <label class="control-label" for="keyu"></label>
                    <div class="controls">
                        <input id="keyu" name="keyu" placeholder="Senha" class="input-medium" required="" type="password">

                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="control-group">
                    <label class="control-label" for="button1id"></label>
                    <div class="controls">
                        <button id="button1id" name="button1id" class="btn btn-success">cadastrar</button>
                        <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        {include file="footer.tpl"}
    </body>    
</html>
