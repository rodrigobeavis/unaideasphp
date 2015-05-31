<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of professorController
 *
 * @author RODRIGO
 */   
if (file_exists('./system/dao/DaoProfessor.php')) {
    require_once('./system/dao/DaoProfessor.php');
} else {
    require_once('../dao/DaoProfessor.php');
}
class ProfessorController {
   
    private $DAO;
    
    public function ProfessorController(){
          $this->DAO = new DaoProfessor();
    }
    public function localizarProfessor($id) {
       $professor =  $this->DAO->localizarProfessor($id);
        return $professor[0]; 
     }
}
