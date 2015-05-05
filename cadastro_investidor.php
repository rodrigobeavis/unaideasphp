<?php
/**
 * Example Application
 *
 * @package Example-application
 */

if (!isset($_SESSION)) {
    session_start();
}
require_once './assets/Smarty/libs/Smarty.class.php';
require_once './system/controller/GravarUsuarioController.php';

$smarty = new Smarty;

if (filter_input(INPUT_POST, 'user_name')) {
$cadastro = $_REQUEST;
}



if (isset($cadastro['user_name'])) {
$cadastro['keyu'] = md5($cadastro['keyu']);
$gravar_controller = new GravarUsuarioController();
$verificacao_cadastro = $gravar_controller->gravarUsuario($cadastro);
}   


////$smarty->force_compile = true;
////$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;


$smarty->assign("title", "UNAIDEAS");
$smarty->display('cadastro_investidor.tpl');
