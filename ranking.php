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
include_once('./system/funcoes/f_login.php'); // variaveis reservadas ($user_name;$user_id;$area_user;$acesso_user;)
require_once './system/controller/TurmaController.php';
require_once './system/controller/ProjetoController.php';
require_once ('./system/controller/QualificacaoController.php');
$usuarios_autorizados = array(1, 2, 3);
include_once ('./system/funcoes/f_acesso.php'); // não permitir o acesso de usuarios de outro tipo


$user_name;
$user_id;
$area_user;
$acesso_user;


if ($_REQUEST) {
    $dados = $_REQUEST;
}
//var_dump($dados);

$smarty = new Smarty;
$turma_control = new TurmaController;
$ctrl_projeto = new ProjetoController();
$obj_qualificar = new QualificacaoController();



$lista_turmas = $turma_control->listarTurmas();

$lista_top10_geral = $obj_qualificar->Top10Geral();

if (filter_input(INPUT_POST, 'turma')) {
    $lista_top10_turma = $obj_qualificar->Top10Tursma($dados['turma']);
//var_dump($lista_top10_turma);
}



$smarty->force_compile = true;





//var_dump($area_user);

$smarty->assign("lista_top10_geral", $lista_top10_geral);
$smarty->assign("lista_top10_turma", $lista_top10_turma);
$smarty->assign("lista_turmas", $lista_turmas);
$smarty->assign("user_name", $user_name);
$smarty->assign("area_user", $area_user);

$smarty->assign("title", "UNAIDEAS - Investidor");
$smarty->display('ranking.tpl');
