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

include_once('./system/funcoes/f_login.php');

$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;


$smarty->assign("title", "UNAIDEAS - Usu&aacute;rio");
$smarty->display('area_usuario.tpl');
