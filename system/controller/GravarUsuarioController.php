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
if (file_exists('./system/dao/DaoInvestidor.php')) {
    require_once('./system/dao/DaoInvestidor.php');
} else {
    require_once('../dao/DaoInvestidor.php');
}

class GravarUsuarioController {
   
    private $DAO_usuario;
    private $DAO_professor;
    private $DAO_investidor;
    
    public function GravarUsuarioController(){
          $this->DAO_usuario = new DaoUsuario();
          $this->DAO_professor = new DaoProfessor();
          $this->DAO_investidor = new DaoInvestidor();
    }
     /**
     * @assert ("12/01/2015 11:00") == "2015-01-12 11:00"
     * @assert ("11/01/2015 11:00") == "2015-01-11 11:00"
     * @assert ("14/10/2015 11:00") == "2015-10-14 11:00"
     * @assert ("13/09/2015 13:00") == "2015-09-13 13:00"
     * @assert ("17/07/2015 11:00") == "2015-07-17 11:00"
     * @assert ("34/03/2015 11:00") == "2015-03-34 11:00"
     * @assert ("12/05/2015 14:00") == "2015-05-12 11:00"
     * @assert ("29/02/2015 15:00") == "2015-01-29 16:00"
     */
     public function gravarUsuario($cadastro) {
        $verificacao = 0;
      
        switch ($cadastro['tipo']) {
            case "1":
                $verificacao = $this->DAO_usuario->gravarUsuario($cadastro);
                break;
            case "2":
                $verificacao = $this->DAO_professor->gravarProfessor($cadastro);
                break;
            case "3":
                $verificacao = $this->DAO_investidor->gravarInvestidor($cadastro);
                break;
        }
               
        return $cadastro;
     }
  
}
