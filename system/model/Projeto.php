<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projeto
 *
 * @author RODRIGO
 */
class Projeto {

    //put your code here

    private $id_projeto;
    private $tema_projeto;
    private $tipo_projeto;
    private $descricao_projeto;
    private $palavras_chave_projeto;

    public function getId_projeto() {
        return $this->id_projeto;
    }

    public function getTema_projeto() {
        return $this->tema_projeto;
    }

    public function getTipo_projeto() {
        return $this->tipo_projeto;
    }

    public function getDescricao_projeto() {
        return $this->descricao_projeto;
    }

    public function getPalavras_chave_projeto() {
        return $this->palavras_chave_projeto;
    }

    public function setId_projeto($id_projeto) {
        $this->id_projeto = $id_projeto;
    }

    public function setTema_projeto($tema_projeto) {
        $this->tema_projeto = $tema_projeto;
    }

    public function setTipo_projeto($tipo_projeto) {
        $this->tipo_projeto = $tipo_projeto;
    }

    public function setDescricao_projeto($descricao_projeto) {
        $this->descricao_projeto = $descricao_projeto;
    }

    public function setPalavras_chave_projeto($palavras_chave_projeto) {
        $this->palavras_chave_projeto = $palavras_chave_projeto;
    }

}
