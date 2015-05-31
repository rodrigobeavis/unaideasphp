<?php
/**
 * Description of DaoQualificacao
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}
if (file_exists('./system/model/QualificacaoClass.php')) {
    require_once('./system/model/QualificacaoClass.php');
} else {
    require_once('../model/QualificacaoClass.php');
}
class DaoQualificacao extends PDOConnectionFactory {
   private $conex = null;

    public function DaoQualificacao()  {
        $this->conex = PDOConnectionFactory::getConnection();
    }
    
    
     public function gravarQualificacaoProjeto($qualificacao) {
        try {
            $sql = "INSERT INTO unaideasbdmysql.qualificacao
                    (obs_qualificacao,valor_qualificacao,
                    data_hora_qualificacao,
                    id_projeto,id_professor)
                    VALUES
                    (:obs_qualificacao,:valor_qualificacao,
                    now(),
                    :id_projeto,:id_professor)";
            $stmt = $this->conex->prepare($sql);
            $stmt->bindParam(':obs_qualificacao', $qualificacao['user_name'], PDO::PARAM_STR);
            $stmt->bindParam(':valor_qualificacao', $qualificacao['tipo'], PDO::PARAM_);
            $stmt->bindParam(':id_projeto', $qualificacao['user_name'], PDO::PARAM_STR);
            $stmt->bindParam(':id_professor', $qualificacao['tipo'], PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
    
    public function topDezQualificacaoProjeto($dados) {
        try {
            $sql = "";
            $stmt = $this->conex->prepare($sql);
            //autenticação
            $stmt->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
            $stmt->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':pw', $cadastro['keyu'], PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
    public function verificaQualificacaoProjeto($dados) {
        try {
            $sql = "SELECT 
                        count(id_qualificacao)
                    FROM
                        qualificacao
                    WHERE
                        id_professor = :id_professor
                        AND id_projeto = :id_projeto";
            $stmt = $this->conex->prepare($sql);
            //autenticação
            $stmt->bindParam(':user_name', $dados['user_name'], PDO::PARAM_STR);
            $stmt->bindParam(':area_user', $dados['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':pw', $dados['keyu'], PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
}
