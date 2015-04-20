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

if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}

class DaoAutenticacao extends PDOConnectionFactory {
    
    private $conex = null;

    public function DaoAutenticacao() {
        $this->conex = PDOConnectionFactory::getConnection();
    }
    public function localizarUser($dadosuser) {
        try {
        $sql = "SELECT 
             COUNT(id_autenticacao) AS autenticar
        FROM
            autenticacao AS t1
        WHERE
            t1.user_name = :user_name
            AND t1.pw = :keyU";
        $stmt = $this->conex->prepare($sql);
        $stmt->bindParam(':user_name', $dadosuser['user_name'],PDO::PARAM_STR);
        $stmt->bindParam(':keyU', $dadosuser['keyU'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);   
        } catch (PDOException $e) {
            echo $e->getMessage();
           }
        parent::Close();
    }
  public function localizarUserDados($dadosuser) {
        try {
        $sql = "SELECT 
             id_autenticacao AS autenticar
        FROM
            autenticacao AS t1
        WHERE
            t1.user_name = :user_name
            AND t1.pw = :keyU";
        $stmt = $this->conex->prepare($sql);
        $stmt->bindParam(':user_name', $dadosuser['user_name'],PDO::PARAM_STR);
        $stmt->bindParam(':keyU', $dadosuser['keyU'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);   
        } catch (PDOException $e) {
            echo $e->getMessage();
           }
        parent::Close();
    }

}
