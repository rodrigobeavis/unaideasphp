<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Turma
 *
 * @author RODRIGO
 */
class Turma {

    //put your code here


    private $id_turma;
    private $periodo_turma;
    private $curso_turma;
    private $ano_turma;
    private $id_entidade_ensino;
    private $id_professor;

    
    
    public function getId_turma() {
        return $this->id_turma;
    }

    public function getPeriodo_turma() {
        return $this->periodo_turma;
    }

    public function getCurso_turma() {
        return $this->curso_turma;
    }

    public function getAno_turma() {
        return $this->ano_turma;
    }

    public function getId_entidade_ensino() {
        return $this->id_entidade_ensino;
    }

    public function getId_professor() {
        return $this->id_professor;
    }

    public function setId_turma($id_turma) {
        $this->id_turma = $id_turma;
    }

    public function setPeriodo_turma($periodo_turma) {
        $this->periodo_turma = $periodo_turma;
    }

    public function setCurso_turma($curso_turma) {
        $this->curso_turma = $curso_turma;
    }

    public function setAno_turma($ano_turma) {
        $this->ano_turma = $ano_turma;
    }

    public function setId_entidade_ensino($id_entidade_ensino) {
        $this->id_entidade_ensino = $id_entidade_ensino;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }


    
}
