<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author RODRIGO
 */
class ProfessorClass {

    //put your code here


    private $disciplina_professor;
    private $tipo_professor;
    private $email_professor;
    private $telefone_professor;
    private $nome_professor;
    private $id_professor;
    private $mat_professor;
    private $id_autenticacao;

    public function getDisciplina_professor() {
        return $this->disciplina_professor;
    }

    public function getTipo_professor() {
        return $this->tipo_professor;
    }

    public function getEmail_professor() {
        return $this->email_professor;
    }

    public function getTelefone_professor() {
        return $this->telefone_professor;
    }

    public function getNome_professor() {
        return $this->nome_professor;
    }

    public function getId_professor() {
        return $this->id_professor;
    }

    public function getMat_professor() {
        return $this->mat_professor;
    }

    public function getId_autenticacao() {
        return $this->id_autenticacao;
    }

    public function setDisciplina_professor($disciplina_professor) {
        $this->disciplina_professor = $disciplina_professor;
    }

    public function setTipo_professor($tipo_professor) {
        $this->tipo_professor = $tipo_professor;
    }

    public function setEmail_professor($email_professor) {
        $this->email_professor = $email_professor;
    }

    public function setTelefone_professor($telefone_professor) {
        $this->telefone_professor = $telefone_professor;
    }

    public function setNome_professor($nome_professor) {
        $this->nome_professor = $nome_professor;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function setMat_professor($mat_professor) {
        $this->mat_professor = $mat_professor;
    }

    public function setId_autenticacao($id_autenticacao) {
        $this->id_autenticacao = $id_autenticacao;
    }

}
