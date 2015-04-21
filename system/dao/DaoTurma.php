<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoTurma
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}

class DaoTurma extends PDOConnectionFactory {

    private $conex = null;

    public function DaoTurma() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function consultarTurmas() {
        try {
            $sql = "SELECT 
                         id_turma,curso_turma, periodo_turma, ano_turma
                    FROM
                        turma";
            $stmt = $this->conex->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
