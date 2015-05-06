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
    
    
     public function gravarQualificacaoProjeto($dados) {
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
}
