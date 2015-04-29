<?php

    session_start();


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
            $_SESSION['user_name'] = $tipo_usuario['user_name'];
            $_SESSION['area_user'] = $tipo_usuario['area_user'];
            $_SESSION['acesso_user'] = $tipo_usuario['acesso_user'];
                        
            session_name(md5($_SESSION['user_name'] . $_SESSION['area_user'] . $_SESSION['acesso_user']));
            $_SESSION['id'] = base64_encode($cod_user['id_autenticacao'].".".rand(9999,999999));
            header("refresh: 0; url=" . $tipo_usuario['url']);
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


require_once './assets/Smarty/libs/Smarty.class.php';

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





