<?php
//if (file_exists('./system/dao/DaoAutenticacao.php')) {
//    require_once('./system/dao/DaoAutenticacao.php');
//} else {
//    require_once('../dao/DaoAutenticacao.php');
//}
//
//$autenticar = new DaoAutenticacao();
if (!$_SESSION['user_name'] && !$_SESSION['id']) {
    unset($_SESSION);
            session_destroy();
            //?fail=".base64_encode(1) //msg index fail login.
            echo '<script>alert("Sua sessão expirou");</script>';
            header("refresh: 0; url=index.php");
}
session_regenerate_id();

$user_name = $_SESSION['user_name'];
$user_id =  implode(" ",array_splice(explode(".",base64_decode($_SESSION['id'])), 0, 1));

$area_user = $tipo_usuario['area_user'];
$acesso_user = $tipo_usuario['acesso_user'];
