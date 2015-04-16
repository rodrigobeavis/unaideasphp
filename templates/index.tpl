{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=$title}

 <img src="imagens/barra-superior-home.png" id="barra-superior">
  <img src="./assets/img/barra-superior-home.png" id="barra-superior">

        <img src="imagens/una-ideas-logo.png" id="logo-una-ideas">

        <nav id="menu">
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="cadastro_user.html">Cadastrar</a></li>
                <li>Sobre</li>
                <li style="height: 30px; top:100px;"><span style="font-size:20pt; vertical-align:top">Fale conosco</span></li>
            </ul>
        </nav>
        <table id="tabela">
            <tr>
                <td>
                    <a href="login.html">
                        <div onmouseover="mostraDescricao('descricao-idealizador', 'descricao-professor', 'descricao-investidor')" onmouseout="esconde('descricao-idealizador')" id="quadro1" class="quadros">
                            <p>Idealizador</p>
                            <img id="icone-aluno" src="imagens/icone-aluno.png">
                            <p id="descricao-idealizador" class="descricao" style="display:none">Você é um aluno? Tem um projeto em mente? Escolha essa opção para cadastrar a sua ideia no nosso sistema!</p>			
                        </div>
                    </a>
                </td>

                <td>
                    <a href="login.html">
                        <div onmouseover="mostraDescricao('descricao-professor', 'descricao-investidor', 'descricao-idealizador')" onmouseout="esconde('descricao-professor')" id="quadro2" class="quadros">
                            <p>Professor</p>
                            <img id="icone-professor" src="imagens/icone-professor.png">
                            <p id="descricao-professor" class="descricao" style="display:none">Você é professor? Escolha essa opção para ter acesso ao andamento dos projetos e demais funcionalidades.</p>
                        </div>
                    </a>
                </td>

                <td>
                    <a href="login.html">
                        <div onmouseover="mostraDescricao('descricao-investidor', 'descricao-idealizador', 'descricao-professor')" onmouseout="esconde('descricao-investidor')" id="quadro3" class="quadros">
                            <p>Investidor</p>
                            <img id="icone-investidor" src="imagens/icone-investidor.png">
                            <p id="descricao-investidor" class="descricao" style="display:none">É um investidor? Que tal dar uma olhada nos promissores projetos que a instituição tem preparado?</p>
                        </div>
                    </a>
                </td>
            </tr>
        </table>


        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="asstes/bootstrap/js/bootstrap.min.js"></script>
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
