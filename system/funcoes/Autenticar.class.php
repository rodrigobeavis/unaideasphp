<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (file_exists('./sistema/DAO/DaoAutenticacao.php')) {
    require_once('./sistema/DAO/DaoAutenticacao.php');
} else {
    require_once('../DAO/DaoAutenticacao.php');
}

class Autenticar {
    
    private $DAO;

    public function Autenticar() {
        $this->DAO = new DaoAutenticacao();
    }

    public function logar($dadosuser) {
        
         $verificar = $this->DAO->localizarUser($dadosuser);
         foreach ($verificar as $value) {
             $identifica = $value[0];
         }
         $this->direcionar($identifica);
         return $identifica;       
    }
    private function direcionar($identifica) {
        
        if($identifica){         
            echo '<script>window.alert("logado");</script>';
           header("refresh: 0; url=area_usuario.php");
        }  else {
           echo '<script>window.alert("Verifique seus dados e tente novamente");</script>';
           echo '<script> history.back();</script>';
        }
    }
}