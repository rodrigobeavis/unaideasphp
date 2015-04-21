<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (file_exists('./system/dao/DaoUsuario.php')) {
    require_once('./system/dao/DaoUsuario.php');
} else {
    require_once('../dao/DaoUsuario.php');
}
if (file_exists('./system/dao/DaoProfessor.php')) {
    require_once('./system/dao/DaoProfessor.php');
} else {
    require_once('../dao/DaoProfessor.php');
}
if (file_exists('./system/dao/Daoinvestidor.php')) {
    require_once('./system/dao/Daoinvestidor.php');
} else {
    require_once('../dao/Daoinvestidor.php');
}
class GravarUsuarioController {

    private $DAO_usuario;
    private $DAO_professor;
    private $DAO_investidor;
    
    public function GravarUsuarioController(){
          $this->DAO_usuario = new DaoUsuario();
          $this->DAO_professor = new DaoProfessor();
          $this->DAO_investidor = new Daoinvestidor();
    }
    public function gravarUsuario() {
        $lista_turmas = $this->DAO->consultarTurmas();
        return $lista_turmas; 
     }
  
}
