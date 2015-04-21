<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Daoinvestidor
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}

class DaoInvestidor extends PDOConnectionFactory {

    private $conex = null;

    public function DaoInvestidor() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

//    public function gravarInvestidor($cadastro) {
//        var_dump($cadastro);
//        try {
//            $sql = "start transaction;
//                        INSERT INTO autenticacao
//                            (user_name,area_user,pw,acesso_user,status)
//                        VALUES
//                            (:user_name,:area_user,:pw,'3',1);
//                        set @id_autenticacao = (SELECT id_autenticacao from autenticacao WHERE status=1 and user_name = :user_name and pw = :pw);
//                        INSERT INTO investidor
//                            (rg_investidor,telefone_investidor,nome_investidor,email_investidor,id_autenticacao,id_entidade_ensino)
//                        VALUES
//                            (:rg_investidor,:telefone_investidor,:nome_investidor,:email_investidor,@id_autenticacao,'1');
//                        commit";
//            $stmt = $this->conex->prepare($sql);
//            
//            //autenticação
//            $stmt->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
//            $stmt->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
//            $stmt->bindParam(':pw', $cadastro['keyu'], PDO::PARAM_STR);
//            //usuário
//            $stmt->bindParam(':rg_investidor', $cadastro['rg'], PDO::PARAM_STR);
//            $stmt->bindParam(':telefone_investidor', $cadastro['tel'], PDO::PARAM_STR);
//            $stmt->bindParam(':nome_investidor', $cadastro['nome_investidor'], PDO::PARAM_STR);
//            $stmt->bindParam(':email_investidor', $cadastro['email'], PDO::PARAM_STR);
//            
//            
//            return $stmt->execute();
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//        }
//        parent::Close();
//    }
    public function gravarInvestidor($cadastro) {
        //user name não deve ser igual a existentes no banco de dados.
        var_dump($cadastro);
        try {
            $sql = "start transaction;
                        INSERT INTO autenticacao
                           (user_name,area_user,pw,acesso_user,status)
                        VALUES
                           (:user_name,:area_user,:pw,'3',1);
                           set @id_autenticacao = (SELECT id_autenticacao from autenticacao WHERE status=1 and user_name = :user_name and pw = :pw);
                        INSERT INTO investidor
                           (rg_investidor,telefone_investidor,nome_investidor,email_investidor,id_autenticacao,id_entidade_ensino)
                        VALUES
                           (:rg_investidor,:telefone_investidor,:nome_investidor,:email_investidor,@id_autenticacao,1);
                    commit";
            
      
            $stmt = $this->conex->prepare($sql);

            //autenticação
            $stmt->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
            $stmt->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':pw', $cadastro['keyu'], PDO::PARAM_STR);
            //usuário
            $stmt->bindParam(':rg_investidor', $cadastro['rg'], PDO::PARAM_STR);
            $stmt->bindParam(':telefone_investidor', $cadastro['tel'], PDO::PARAM_STR);
            $stmt->bindParam(':nome_investidor', $cadastro['nome_investidor'], PDO::PARAM_STR);
            $stmt->bindParam(':email_investidor', $cadastro['email'], PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
