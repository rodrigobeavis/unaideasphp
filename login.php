<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



session_start();

if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $keyU = md5(filter_input(INPUT_POST, 'senha'));
    if ($email && $keyU) {
        $dadosuser = array('email' => $email, 'keyU' => $keyU);

        $verificar = new Autenticar();
        $cod_user = $verificar->logar($dadosuser);

        if ($cod_user) {
            $info_user = new DadosUser();
            $dados_user = $info_user->dadosUserAtual($cod_user);

            $_SESSION = $dados_user;
            
            $_SESSION['ID'] = md5(rand(1, 99999999999).date("YmdHis"));
            $_SESSION['ID2'] = session_id();
        }
    }
} else {
    echo "O email Inválido";
    header("refresh: 3; url=index.html");
}







