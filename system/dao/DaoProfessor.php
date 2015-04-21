<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoProfessor
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}
class DaoProfessor extends PDOConnectionFactory {
    private $conex = null;

    public function DaoProfessor() {
        $this->conex = PDOConnectionFactory::getConnection();
    }
    
    public function gravarProfessor($cadastro) {
        try {
            $sql = "start transaction;
                        INSERT INTO autenticacao
                            (user_name,area_user,pw,acesso_user,status)
                        VALUES
                            (:user_name,:area_user,:pw,'3',1);
                        set @id_autenticacao = (SELECT id_autenticacao from autenticacao WHERE status = 1 and user_name = :user_name and pw = :pw);
                        INSERT INTO professor
                            (email_professor,tipo_professor,telefone_professor,nome_professor,mat_professor,id_autenticacao)
                        VALUES
                            (:email_professor,:tipo_professor,:telefone_professor,:nome_professor,:mat_professor,@id_autenticacao);
                        commit";
            $stmt = $this->conex->prepare($sql);
           //autenticação
            $stmt->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
            $stmt->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':pw', $cadastro['keyu'], PDO::PARAM_STR);
            //usuário
            $stmt->bindParam(':email_professor', $cadastro['email_professor'], PDO::PARAM_STR);
            $stmt->bindParam(':tipo_professor', $cadastro['tipo_professor'], PDO::PARAM_STR);
            $stmt->bindParam(':telefone_professor', $cadastro['telefone_professor'], PDO::PARAM_STR);
            $stmt->bindParam(':nome_professor', $cadastro['nome_professor'], PDO::PARAM_STR);
            $stmt->bindParam(':mat_professor', $cadastro['mat_professor'], PDO::PARAM_STR);
            
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
}
