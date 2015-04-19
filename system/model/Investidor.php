<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Investidor
 *
 * @author RODRIGO
 */
class Investidor {

    //put your code here

    private $id_investidor;
    private $rg_investidor;
    private $telefone_investidor;
    private $nome_investidor;
    private $email_investidor;
    private $id_autenticacao;
    private $id_entidade_ensino;

    public function getId_investidor() {
        return $this->id_investidor;
    }

    public function getRg_investidor() {
        return $this->rg_investidor;
    }

    public function getTelefone_investidor() {
        return $this->telefone_investidor;
    }

    public function getNome_investidor() {
        return $this->nome_investidor;
    }

    public function getEmail_investidor() {
        return $this->email_investidor;
    }

    public function getId_autenticacao() {
        return $this->id_autenticacao;
    }

    public function getId_entidade_ensino() {
        return $this->id_entidade_ensino;
    }

    public function setId_investidor($id_investidor) {
        $this->id_investidor = $id_investidor;
    }

    public function setRg_investidor($rg_investidor) {
        $this->rg_investidor = $rg_investidor;
    }

    public function setTelefone_investidor($telefone_investidor) {
        $this->telefone_investidor = $telefone_investidor;
    }

    public function setNome_investidor($nome_investidor) {
        $this->nome_investidor = $nome_investidor;
    }

    public function setEmail_investidor($email_investidor) {
        $this->email_investidor = $email_investidor;
    }

    public function setId_autenticacao($id_autenticacao) {
        $this->id_autenticacao = $id_autenticacao;
    }

    public function setId_entidade_ensino($id_entidade_ensino) {
        $this->id_entidade_ensino = $id_entidade_ensino;
    }

}
