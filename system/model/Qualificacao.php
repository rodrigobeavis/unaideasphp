<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Qualificacao
 *
 * @author RODRIGO
 */
class Qualificacao {
    //put your code here
    
private $obs_qualificacao;
private $valor_qualificacao; 
private $data_hora_qualificacao; 
private $id_qualificacao; 
private $id_projeto; 
private $id_professor;


public function getObs_qualificacao() {
    return $this->obs_qualificacao;
}

public function getValor_qualificacao() {
    return $this->valor_qualificacao;
}

public function getData_hora_qualificacao() {
    return $this->data_hora_qualificacao;
}

public function getId_qualificacao() {
    return $this->id_qualificacao;
}

public function getId_projeto() {
    return $this->id_projeto;
}

public function getId_professor() {
    return $this->id_professor;
}

public function setObs_qualificacao($obs_qualificacao) {
    $this->obs_qualificacao = $obs_qualificacao;
}

public function setValor_qualificacao($valor_qualificacao) {
    $this->valor_qualificacao = $valor_qualificacao;
}

public function setData_hora_qualificacao($data_hora_qualificacao) {
    $this->data_hora_qualificacao = $data_hora_qualificacao;
}

public function setId_qualificacao($id_qualificacao) {
    $this->id_qualificacao = $id_qualificacao;
}

public function setId_projeto($id_projeto) {
    $this->id_projeto = $id_projeto;
}

public function setId_professor($id_professor) {
    $this->id_professor = $id_professor;
}


}
