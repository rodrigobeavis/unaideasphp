<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoAutenticacao
 *
 * @author RODRIGO
 */

if (file_exists('./sistema/PDO/PDOConnectionFactory.php')) {
    require_once('./sistema/PDO/PDOConnectionFactory.php');
} else {
    require_once('../PDO/PDOConnectionFactory.php');
}

class DaoAutenticacao extends PDOConnectionFactory {
    
    private $conex = null;

    public function DaoAutenticacao() {
        $this->conex = PDOConnectionFactory::getConnection();
    }
    public function localizarUser($dadosuser) {
        try {
        $sql = "SELECT 
            idAutenticacao
        FROM
            tbl_autenticacao AS t1
        WHERE
            t1.StatusAcesso = 0
            AND t1.email = ?
            AND t1.senha = ?";
        $stmt = $this->conex->prepare($sql);
        $stmt->bindValue(1, $dadosuser['email']);
        $stmt->bindValue(2, $dadosuser['keyU']);

        $stmt->execute();
        return $stmt;
       
        } catch (PDOException $e) {
            echo $e->getMessage();
           }
        parent::Close();
    }
  

}
