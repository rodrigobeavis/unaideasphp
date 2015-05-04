<?php
/**
 * Description of DaoProjeto
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}
if (file_exists('./system/model/ProjetoClass.php')) {
    require_once('./system/model/ProjetoClass.php');
} else {
    require_once('../model/ProjetoClass.php');
}

class DaoProjeto extends PDOConnectionFactory {

    private $conex = null;

    public function DaoProjeto() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function gravarProjeto($projeto) {
        try {
            var_dump($projeto);
            $sql = "INSERT INTO projeto
                        (tema_projeto,
                        descricao_projeto,
                        palavras_chave_projeto,
                        status,data_cadastro)
                    VALUES
                        (:tema_projeto,
                        :descricao_projeto,
                        :palavras_chave_projeto,
                        :status,NOW())";
            $stmt = $this->conex->prepare($sql);
            //autenticação
            $stmt->bindParam(':tema_projeto', $projeto['nome_projeto'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao_projeto', $projeto['descricao_projeto'], PDO::PARAM_STR);
            $stmt->bindParam(':palavras_chave_projeto', $projeto['palavra_chave'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $projeto['status_projeto'], PDO::PARAM_STR);
            $stmt->execute();
           
            return $this->conex->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMesssage();
        }
        parent::Close();
    }

    public function atualizarProjeto($dados) {
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
