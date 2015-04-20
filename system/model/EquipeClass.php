<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Equipe
 *
 * @author RODRIGO
 */
class EquipeClass {

    //put your code here

    private $id_equipe;
    private $id_projeto;
    private $id_usuario;

    public function getId_equipe() {
        return $this->id_equipe;
    }

    public function getId_projeto() {
        return $this->id_projeto;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_equipe($id_equipe) {
        $this->id_equipe = $id_equipe;
    }

    public function setId_projeto($id_projeto) {
        $this->id_projeto = $id_projeto;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}
