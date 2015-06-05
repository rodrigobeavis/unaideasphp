<?php


if (!isset($_SESSION)) {
    session_start();
}
require_once './assets/Smarty/libs/Smarty.class.php';
require_once './system/controller/TurmaController.php';
require_once './system/controller/ProjetoController.php';
require_once './system/controller/EquipeController.php';
require_once './system/controller/UsuarioController.php';
include_once('./system/funcoes/f_login.php'); // variaveis reservadas ($user_name;$user_id;$area_user;$acesso_user;)


$usuarios_autorizados = array(2);

include_once ('./system/funcoes/f_acesso.php');// não permitir o acesso de usuarios de outro tipo


if ($_REQUEST) {
    $dados = $_REQUEST;    
}
//var_dump($dados);

$smarty = new Smarty;
$turma_control = new TurmaController; 
$usuario_controller = new UsuarioController();
$ctrl_projeto = new ProjetoController();
$ctrl_equipe = new EquipeController();


$user_name;
$user_id;
$area_user;
$acesso_user;
$info_cad_professor;

$lista_turmas = $turma_control->listarTurmas();
//$lista_usuarios_da_mesma_turma = $usuario_controller->listarUsuariosDaTurma($user_id);



if (filter_input(INPUT_POST, 'turma')) {
    $projetos_por_turma =  $ctrl_projeto->listarProjetosPorTurma($dados['turma'],$info_cad_professor->id_professor);
}



$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;



$smarty->assign("lista_turmas", $lista_turmas);
$smarty->assign("projetos_por_turma", $projetos_por_turma);
$smarty->assign("user_name", $user_name);

$smarty->assign("title", "UNAIDEAS - Professor");
$smarty->display('area_professor.tpl');
