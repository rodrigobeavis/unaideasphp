<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SESSION)) {
    session_start();
}
require_once './system/controller/GravarUsuarioController.php';


$cadastro = $_REQUEST;
$cadastro['keyu'] = md5($cadastro['keyu']);

if (filter_input(INPUT_POST, 'user_name')) {
$gravar_controller = new GravarUsuarioController();
$verificacao_cadastro = $gravar_controller->gravarUsuario($cadastro);
}   

var_dump($cadastro);
