<?php

/**
 * Description of DaoUser
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}

class DaoUsuario extends PDOConnectionFactory {

    private $conex = null;

    public function DaoUsuario() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function gravarUsuario($cadastro) {
         try {
            $this->conex->beginTransaction();
            $sql = "start transaction;
                    INSERT INTO autenticacao
                        (user_name,area_user,pw,acesso_user,status)
                    VALUES
                        (:user_name,:area_user,:pw,'3',1);
                    set @id_autenticacao = (SELECT id_autenticacao from autenticacao WHERE status=1 and user_name=:area_user and pw=:pw);
                        INSERT INTO usuario
                        (rg_usuario,telefone,email,nome_usuario,ra_usuario,id_turma,id_autenticacao)
                     VALUES
                        (:rg_usuario,:telefone,:email,:nome_usuario,:ra_usuario,:id_turma,@id_autenticacao);
                    commit";
            $stmt = $this->conex->prepare($sql);
            
            //autenticação
            $stmt->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
            $stmt->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':pw', $cadastro['keyu'], PDO::PARAM_STR);
            //usuário
            $stmt->bindParam(':rg_usuario', $cadastro['rg'], PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $cadastro['tel'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $cadastro['email'], PDO::PARAM_STR);
            $stmt->bindParam(':nome_usuario', $cadastro['nome_usuario'], PDO::PARAM_STR);
            $stmt->bindParam(':ra_usuario', $cadastro['ra'], PDO::PARAM_STR);
            $stmt->bindParam(':id_turma', $cadastro['turma'], PDO::PARAM_INT);
            $stmt->execute();
            
            return $this->conex->commit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }


//    public function gravarUsuario($cadastro) {
//        try {
//           // $this->conex->beginTransaction();
//            $sql = "INSERT INTO autenticacao
//                        (user_name,area_user,pw,acesso_user,status)
//                    VALUES
//                        (:user_name,:area_user,:pw,'3',1)";
//            $stmt = $this->conex->prepare($sql);
//            //autenticação
//            $stmt->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
//            $stmt->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
//            $stmt->bindParam(':pw', $cadastro['keyu'], PDO::PARAM_STR);
//            $stmt->execute();
//            
////            $sql2 = "INSERT INTO usuario
////                        (rg_usuario,telefone,email,nome_usuario,ra_usuario,id_turma,id_autenticacao)
////                     VALUES
////                        (:rg_usuario,:telefone,:email,:nome_usuario,:ra_usuario,:id_turma,
////                        (SELECT id_autenticacao from autenticacao WHERE status=1 and user_name = :area_user2 and pw = :pw2))";
////            $stmt2 = $this->conex->prepare($sql2);
////            //autenticação
////            $stmt2->bindParam(':user_name2', $cadastro['user_name'], PDO::PARAM_STR);
////            $stmt2->bindParam(':pw2', $cadastro['keyU'], PDO::PARAM_STR);
////            //usuário
////            $stmt2->bindParam(':rg_usuario', $cadastro['rg'], PDO::PARAM_STR);
////            $stmt2->bindParam(':telefone', $cadastro['tel'], PDO::PARAM_STR);
////            $stmt2->bindParam(':email', $cadastro['email'], PDO::PARAM_STR);
////            $stmt2->bindParam(':nome_usuario', $cadastro['nome_usuario'], PDO::PARAM_STR);
////            $stmt2->bindParam(':ra_usuario', $cadastro['ra'], PDO::PARAM_STR);
////            $stmt2->bindParam(':id_turma', $cadastro['turma'], PDO::PARAM_INT);
////            $stmt2->execute();
////
////
////
////            $this->conex->commit();
//
////            $sql2 = "start transaction;
////                    INSERT INTO autenticacao
////                        (user_name,area_user,pw,acesso_user,status)
////                    VALUES
////                        (:user_name,:area_user,:pw,'3',1);
////                    set @id_autenticacao = (SELECT id_autenticacao from autenticacao WHERE status=1 and user_name=:area_user and pw=:pw);
////                        INSERT INTO usuario
////                        (rg_usuario,telefone,email,nome_usuario,ra_usuario,id_turma,id_autenticacao)
////                     VALUES
////                        (:rg_usuario,:telefone,:email,:nome_usuario,:ra_usuario,:id_turma,@id_autenticacao);
////                    commit";
////            $stmt2 = $this->conex->prepare($sql2);
////            
////            //autenticação
////            $stmt2->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
////            $stmt2->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
////            $stmt2->bindParam(':pw', $cadastro['keyU'], PDO::PARAM_STR);
////            //usuário
////            $stmt2->bindParam(':rg_usuario', $cadastro['rg'], PDO::PARAM_STR);
////            $stmt->bindParam(':telefone', $cadastro['tel'], PDO::PARAM_STR);
////            $stmt->bindParam(':email', $cadastro['email'], PDO::PARAM_STR);
////            $stmt->bindParam(':nome_usuario', $cadastro['nome_usuario'], PDO::PARAM_STR);
////            $stmt->bindParam(':ra_usuario', $cadastro['ra'], PDO::PARAM_STR);
////            $stmt->bindParam(':id_turma', $cadastro['turma'], PDO::PARAM_INT);
////            //$stmt->execute();
//
//            return $stmt->execute();
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//        }
//        parent::Close();
//    }

}
