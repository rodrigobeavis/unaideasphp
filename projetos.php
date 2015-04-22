<?php
/**
 * Example Application
 *
 * @package Example-application
 */

if (!isset($_SESSION)) {
    session_start();
}

require './assets/Smarty/libs/Smarty.class.php';

$smarty = new Smarty;

//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

$smarty->assign("title", "UNAIDEAS");
$smarty->display('projetos.tpl');
