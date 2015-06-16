<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (file_exists('./system/dao/DaoAutenticacao.php')) {
    require_once('./system/dao/DaoAutenticacao.php');
} else if (file_exists('../dao/DaoAutenticacao.php')){
    require_once('../dao/DaoAutenticacao.php');
}else if (file_exists('../system/dao/DaoAutenticacao.php')){
    require_once('../system/dao/DaoAutenticacao.php');
}

class AutenticarClass {

    private $DAO;

    public function AutenticarClass() {
        $this->DAO = new DaoAutenticacao();
    }

    /**
     * @assert (array('user_name'=>"rodrigo",'keyu'=>1)) > 0
     * @assert (array('user_name'=>"rodrigo",'keyu'=>1)) <= 0
     * @assert (array('user_name'=>"investidor2",'keyu'=>1)) > 0
     * @assert (array('user_name'=>"investidor2",'keyu'=>1)) <= 0
     * @assert (array('user_name'=>"professor2",'keyu'=>1)) <= 0
     * @assert (array('user_name'=>"professor2",'keyu'=>1)) > 0
     * @assert (array('user_name'=>"professor",'keyu'=>1)) <= 0
     * @assert (array('user_name'=>"professor",'keyu'=>1)) > 0
     */
    public function logar($dadosuser) {
        $verificar = $this->DAO->localizarUser($dadosuser);
        return $verificar[0];
    }

    public function identificarUsuario($id) {
        $inf_user = $this->DAO->localizarUserDados($id);
        $inf_user = $inf_user[0];
        if (isset($inf_user['user_name'])) {

            switch ($inf_user['area_user']) {
                case 0:
                    $url = "area_usuario.php";
                    break;
                case 1:
                    $url = "area_usuario.php";
                    break;
                case 2:
                    $url = "area_professor.php";
                    break;
                case 3:
                    $url = "area_investidor.php";
                    break;
            }
        }
        $dados = array('url' => $url,
            'user_name' => $inf_user['user_name'],
            'area_user' => $inf_user['area_user'],
            'acesso_user' => $inf_user['acesso_user'],
        );

        return $dados;
    }

}
