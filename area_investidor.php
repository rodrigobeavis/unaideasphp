<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (!isset($_SESSION)) {
    session_start();
}
require_once ('./assets/Smarty/libs/Smarty.class.php');
require_once ('./system/controller/TurmaController.php');
require_once ('./system/controller/ProjetoController.php');
require_once ('./system/controller/EquipeController.php');
require_once ('./system/controller/UsuarioController.php');
require_once ('./system/controller/InvestidorController.php');
include_once('./system/funcoes/f_login.php'); // variaveis reservadas ($user_name;$user_id;$area_user;$acesso_user;)


$usuarios_autorizados = array(3);
include_once ('./system/funcoes/f_acesso.php'); // não permitir o acesso de usuarios de outro tipo


if ($_REQUEST) {
    $dados = $_REQUEST;
}
//var_dump($dados);

$smarty = new Smarty;
$usuario_controller = new UsuarioController();
$ctrl_projeto = new ProjetoController();
$ctrl_equipe = new EquipeController();
$ctrl_investidor = new InvestidorController();

$lista_temas_projetos = $ctrl_projeto->listarTemasDeProjetos();

//var_dump($lista_temas_projetos);
$teste_pesquisa = FALSE;
$projetos_por_tema = NULL;
if (filter_input(INPUT_POST, 'pesquisar')) {
    $projetos_por_tema = $ctrl_projeto->pesquisarProjetoPorTema($dados['pesquisar']);
    ($projetos_por_tema) ? $teste_pesquisa = FALSE : $teste_pesquisa = TRUE;
}
$verificacao_email = FALSE;
if (filter_input(INPUT_POST, 'body_email')) {
    $dados['investidor'] = $info_cad_investidor;
    $verificacao_email = $ctrl_investidor->contatoInvestidorComEquipe($dados);
    if ($verificacao_email) {
        unset($_REQUEST,$dados,$_POST,$_GET);
           header("Refresh:3");
    }
}




$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;


$user_name;
$user_id;
$area_user;
$acesso_user;


$smarty->assign("verificacao_email", $verificacao_email);
$smarty->assign("teste_pesquisa", $teste_pesquisa);
$smarty->assign("lista_temas_projetos", $lista_temas_projetos);
$smarty->assign("projetos_por_tema", $projetos_por_tema);
$smarty->assign("user_name", $user_name);

$smarty->assign("title", "UNAIDEAS - Investidor");
$smarty->display('area_investidor.tpl');
