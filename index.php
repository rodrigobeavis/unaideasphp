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

//$dados = $_REQUEST;
//if ($dados['fail'] == base64_encode(1)) {
//    echo '<script>alert("Verifique seus dados e tente novamente");</script>';
//}

$smarty = new Smarty;

//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

$smarty->assign("title", "");
$smarty->assign("title", "UNAIDEAS");
$smarty->display('index.tpl');
