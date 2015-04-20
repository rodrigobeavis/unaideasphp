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

        if ($cod_user) {
            $info_user = new DadosUser();
            $dados_user = $info_user->dadosUserAtual($cod_user);

            $_SESSION = $dados_user;
            
            $_SESSION['ID'] = md5(rand(1, 99999999999999).date("YmdHis"));
            $_SESSION['ID2'] = session_id();
        }
    }
} else {
    echo "O email Inválido";
    unset($_SESSION); 
    header("refresh: 1; url=index.php");
    
}







