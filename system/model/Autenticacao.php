<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autenticacao
 *
 * @author RODRIGO
 */
class Autenticacao {
    //put your code here

//    id_autenticacao bigint(20) PK 
    private $user_name; 
 private $area_user; 
 private $pw; 
 private $acesso_user;
    
 public function getUser_name() {
     return $this->user_name;
 }

 public function getArea_user() {
     return $this->area_user;
 }

 public function getPw() {
     return $this->pw;
 }

 public function getAcesso_user() {
     return $this->acesso_user;
 }

 public function setUser_name($user_name) {
     $this->user_name = $user_name;
 }

 public function setArea_user($area_user) {
     $this->area_user = $area_user;
 }

 public function setPw($pw) {
     $this->pw = $pw;
 }

 public function setAcesso_user($acesso_user) {
     $this->acesso_user = $acesso_user;
 }


    
}
