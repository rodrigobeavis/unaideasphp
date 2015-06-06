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
require_once ('./system/controller/QualificacaoController.php');
include_once('./system/funcoes/f_login.php'); // variaveis reservadas ($user_name;$user_id;$area_user;$acesso_user;)


$usuarios_autorizados = array(2);
include_once ('./system/funcoes/f_acesso.php');// não permitir o acesso de usuarios de outro tipo


if ($_REQUEST) {
    $dados = $_REQUEST;    
}
//var_dump($dados);

$smarty = new Smarty;
$obj_qualificar = new QualificacaoController();

$user_name;
$user_id;
$area_user;
$acesso_user;
$info_cad_professor;


   //if (filter_input(INPUT_POST, 'id_projeto')) {
    $qualificar_projeto = array('id_professor'=> $info_cad_professor->id_professor,
                                'id_projeto'=> $dados['id_projeto'],
                                'qualificar_value'=>$dados['qualificar_value'],
                                'obs_qualificacao'=>" ");
    
                           // var_dump($qualificar_projeto);  
$retorno_qualificar = $obj_qualificar->gravarQualificacao($qualificar_projeto);
//}
//$qualificar_projeto = array('id_professor'=> $info_cad_professor->id_professor,
//                                'id_projeto'=> 107);
//require_once './system/dao/DaoQualificacao.php';
//$qual = new DaoQualificacao();
//$teste = $qual->verificaQualificacaoProjeto($qualificar_projeto);
//var_dump($teste);
