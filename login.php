<?php

if (!isset($_SESSION)) {
    session_start();
}


if (file_exists('./system/controller/AutenticarClass.php')) {
    require_once('./system/controller/AutenticarClass.php');
} else {
    require_once('./system/controller/AutenticarClass.php');
}


if (filter_input(INPUT_POST, 'user_name')) {
    $user_name = filter_input(INPUT_POST, 'user_name');
    $keyU = md5(filter_input(INPUT_POST, 'keyu'));

    if ($user_name && $keyU) {
        $dadosuser = array('user_name' => $user_name, 'keyU' => $keyU);

        $verificar = new AutenticarClass();
        $cod_user = $verificar->logar($dadosuser);
        if ($cod_user['autenticar'] >= 1) {
            $tipo_usuario = $verificar->identificarUsuario($cod_user['id_autenticacao']);
            session_name(md5($_SESSION['user_name'] . $_SESSION['area_user'] . $_SESSION['acesso_user']));
            session_regenerate_id();
            header("refresh: 0; url=" . $tipo_usuario);
        } else {
            unset($_SESSION);
            session_destroy();
            //?fail=".base64_encode(1) //msg index fail login.
            echo '<script>alert("Verifique seus dados e tente novamente");</script>';
            header("refresh: 0; url=index.php");
        }
    }
} else {
    echo "Formulário em branco";
    unset($_SESSION);
    session_destroy();
    header("refresh: 0; url=index.php");
}







