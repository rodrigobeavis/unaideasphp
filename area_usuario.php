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
require_once './system/controller/ProjetoController.php';
require_once './system/controller/EquipeController.php';
require_once './system/controller/UsuarioController.php';
include_once('./system/funcoes/f_login.php'); // variaveis reservadas ($user_name;$user_id;$area_user;$acesso_user;)

if ($_REQUEST) {
    $projeto = $_REQUEST;
}

$smarty = new Smarty;

//var_dump($projeto);


$usuario_controller = new UsuarioController();
$lista_usuarios_da_mesma_turma = $usuario_controller->listarUsuariosDaTurma($user_id);


if (filter_input(INPUT_POST, 'nome_projeto')) {
     $projeto = $_REQUEST; 
}



$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;


$user_name;
$user_id;
$area_user;
$acesso_user;


$smarty->assign("lista_usuarios_da_mesma_turma", $lista_usuarios_da_mesma_turma);
$smarty->assign("user_name", $user_name);
$smarty->assign("title", "UNAIDEAS - Usu&aacute;rio");
$smarty->display('area_usuario.tpl');
