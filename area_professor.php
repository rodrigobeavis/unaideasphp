<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (!isset($_SESSION)) {
    session_start();
}
require_once './assets/Smarty/libs/Smarty.class.php';
require_once './system/controller/TurmaController.php';
require_once './system/controller/ProjetoController.php';
require_once './system/controller/EquipeController.php';
require_once './system/controller/UsuarioController.php';
include_once('./system/funcoes/f_login.php'); // variaveis reservadas ($user_name;$user_id;$area_user;$acesso_user;)

if ($_REQUEST) {
    $dados = $_REQUEST;    
}
var_dump($dados);
$smarty = new Smarty;
$turma_control = new TurmaController; 
$usuario_controller = new UsuarioController();
$ctrl_projeto = new ProjetoController();
$ctrl_equipe = new EquipeController();


$lista_turmas = $turma_control->listarTurmas();



if (filter_input(INPUT_POST, 'turma')) {
    $projetos_por_turma =  $ctrl_projeto->listarProjetosPorTurma($dados['turma']);
    var_dump($projetos_por_turma);
}





$lista_usuarios_da_mesma_turma = $usuario_controller->listarUsuariosDaTurma($user_id);





$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;


$user_name;
$user_id;
$area_user;
$acesso_user;


$smarty->assign("lista_turmas", $lista_turmas);
$smarty->assign("user_name", $user_name);

$smarty->assign("title", "UNAIDEAS - Professor");
$smarty->display('area_professor.tpl');
