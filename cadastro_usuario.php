<?php
/**
 * Example Application
 *
 * @package Example-application
 */

require './assets/Smarty/libs/Smarty.class.php';

$smarty = new Smarty;

//$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;


$smarty->assign("title", "UNAIDEAS");
$smarty->display('cadastro_usuario.tpl');
