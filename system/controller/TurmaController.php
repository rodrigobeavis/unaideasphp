<?php

/**
 * Description of TurmaC
 *
 * @author RODRIGO
 */

if (file_exists('./system/dao/DaoTurma.php')) {
    require_once('./system/dao/DaoTurma.php');
} else {
    require_once('../dao/DaoTurma.php');
}
class TurmaController {

    private $DAO;
    
    public function TurmaController(){
          $this->DAO = new DaoTurma();
    }
    public function listarTurmas() {
        $lista_turmas = $this->DAO->consultarTurmas();
        return $lista_turmas; 
     }
  
}
