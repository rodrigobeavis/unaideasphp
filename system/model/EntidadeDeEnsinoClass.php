<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntidadeDeEnsino
 *
 * @author RODRIGO
 */
class EntidadeDeEnsinoClass {

    //put your code here


    private $nome_entidade_ensino;
    private $Descricao_entidade;
    private $id_entidade_ensino;

    
    public function getNome_entidade_ensino() {
        return $this->nome_entidade_ensino;
    }

    public function getDescricao_entidade() {
        return $this->Descricao_entidade;
    }

    public function getId_entidade_ensino() {
        return $this->id_entidade_ensino;
    }

    public function setNome_entidade_ensino($nome_entidade_ensino) {
        $this->nome_entidade_ensino = $nome_entidade_ensino;
    }

    public function setDescricao_entidade($Descricao_entidade) {
        $this->Descricao_entidade = $Descricao_entidade;
    }

    public function setId_entidade_ensino($id_entidade_ensino) {
        $this->id_entidade_ensino = $id_entidade_ensino;
    }


    
}
