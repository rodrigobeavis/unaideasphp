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

$usuarios_autorizados = array(1);
include_once ('./system/funcoes/f_acesso.php');// não permitir o acesso de usuarios de outro tipo


if ($_REQUEST) {
    $projeto = $_REQUEST;    
}
//var_dump($projeto);
$smarty = new Smarty;
$usuario_controller = new UsuarioController();
$ctrl_projeto = new ProjetoController();
$ctrl_equipe = new EquipeController();

$lista_usuarios_da_mesma_turma = $usuario_controller->listarUsuariosDaTurma($user_id);
$projetos_usuario =  $ctrl_projeto->listarProjetosUsuario($info_cad_user->id_usuario);

if (filter_input(INPUT_POST, 'nome_projeto')) {
   $id_last_projeto =  $ctrl_projeto->gravarProjeto($projeto); 
   if ($id_last_projeto && $id_last_projeto > 0) {
       $resultado_insert =  $ctrl_equipe->gravarEquipe($projeto,$id_last_projeto,$info_cad_user->id_usuario);
   }
   if ($resultado_insert) {
       unset($resultado_insert);
       unset($id_last_projeto);
       unset($projeto);
       unset($_REQUEST);
       header("Location: area_usuario.php");
   }
}

if (filter_input(INPUT_POST, 'editar_nome_projeto')) {
    
    $projeto['user_id'] = $user_id;
    $verifica_editar_projeto =  $ctrl_projeto->editarProjeto($projeto); 

    if ($verifica_editar_projeto) {
       unset($projeto);
       unset($_REQUEST);
       header("Location: area_usuario.php");
    }
 
}



$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;


$user_name;
$user_id;
$area_user;
$acesso_user;

$smarty->assign("projetos_usuario", $projetos_usuario);
$smarty->assign("lista_usuarios_da_mesma_turma", $lista_usuarios_da_mesma_turma);
$smarty->assign("user_name", $user_name);
$smarty->assign("title", "UNAIDEAS - Usu&aacute;rio");
$smarty->display('area_usuario.tpl');
