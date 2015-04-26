<?php
/**
 * Example Application
 *
 * @package Example-application
 */

if (!isset($_SESSION)) {
    session_start();
}
require_once './system/controller/TurmaController.php';
require './assets/Smarty/libs/Smarty.class.php';
require_once './system/controller/GravarUsuarioController.php';

$smarty = new Smarty;

$turma_control = new TurmaController; 
$lista_turmas = $turma_control->listarTurmas();


$cadastro = $_REQUEST;
$cadastro['keyu'] = md5($cadastro['keyu']);


if (isset($cadastro['user_name'])) {
$gravar_controller = new GravarUsuarioController();
$verificacao_cadastro = $gravar_controller->gravarUsuario($cadastro);
}   



//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

$smarty->assign("lista_turmas", $lista_turmas);
$smarty->assign("title", "UNAIDEAS");
$smarty->display('cadastro_usuario.tpl');
