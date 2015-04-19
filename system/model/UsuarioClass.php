<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioClass
 *
 * @author RODRIGO
 */
class UsuarioClass {

    private $tipo_acesso;
    private $rg_usuario;
    private $telefone;
    private $email;
    private $nome_usuario;
    private $id_usuario;
    private $ra_usuario;
    private $id_turma;
    private $id_autenticacao;
   
    public function getTipo_acesso() {
        return $this->tipo_acesso;
    }

    public function getRg_usuario() {
        return $this->rg_usuario;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNome_usuario() {
        return $this->nome_usuario;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getRa_usuario() {
        return $this->ra_usuario;
    }

    public function getId_turma() {
        return $this->id_turma;
    }

    public function getId_autenticacao() {
        return $this->id_autenticacao;
    }

    public function setTipo_acesso($tipo_acesso) {
        $this->tipo_acesso = $tipo_acesso;
    }

    public function setRg_usuario($rg_usuario) {
        $this->rg_usuario = $rg_usuario;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNome_usuario($nome_usuario) {
        $this->nome_usuario = $nome_usuario;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setRa_usuario($ra_usuario) {
        $this->ra_usuario = $ra_usuario;
    }

    public function setId_turma($id_turma) {
        $this->id_turma = $id_turma;
    }

    public function setId_autenticacao($id_autenticacao) {
        $this->id_autenticacao = $id_autenticacao;
    }



}
