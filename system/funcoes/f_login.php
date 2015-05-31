<?php

if (file_exists('./system/model/UsuarioClass.php')) {
    require_once('./system/model/UsuarioClass.php');
} else {
    require_once('../model/UsuarioClass.php');
}
if (file_exists('./system/controller/ProfessorController.php')) {
    require_once('./system/controller/ProfessorController.php');
} else {
    require_once('../controller/ProfessorController.php');
}
if (!$_SESSION['user_name'] && !$_SESSION['id']) {
    unset($_SESSION);
    session_destroy();
    //?fail=".base64_encode(1) //msg index fail login.
    echo '<script>alert("Sua sessão expirou");</script>';
    header("refresh: 0; url=index.php");
}
session_regenerate_id();

$user_name = $_SESSION['user_name'];
$user_id = implode(" ", array_splice(explode(".", base64_decode($_SESSION['id'])), 0, 1));
$area_user = $_SESSION['area_user'];
$acesso_user = $_SESSION['acesso_user'];

switch ($area_user) {
    case 1:
        $obj_cad_user = new UsuarioController();
        $info_cad_user = $obj_cad_user->infoUsusario($user_id);
        break;
    case 2:
        $obj_cad_professor = new ProfessorController();
        $info_cad_professor = $obj_cad_professor->localizarProfessor($user_id);
        break;
    case 3:
        

        break;
}




