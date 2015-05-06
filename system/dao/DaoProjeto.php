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

    public function atualizarProjeto($user_id) {
        try {
            $sql = "SELECT 
                        t1.id_projeto,
                        t1.tema_projeto,
                        t1.descricao_projeto,
                        t1.palavras_chave_projeto,
                        t1.status,
                        t1.data_cadastro,
                        t2.id_equipe,
                        t2.id_projeto,
                        t2.id_usuario,
                        t3.nome_usuario,
                        t3.email,
                        t3.telefone
                    FROM
                        projeto t1
                            INNER JOIN
                        equipe t2 ON t1.id_projeto = t2.id_projeto
                            INNER JOIN
                        usuario t3 ON t2.id_usuario = t3.id_usuario
                    WHERE
                        t1.id_projeto IN (SELECT 
                                id_projeto
                            FROM
                                equipe
                            WHERE
                                id_usuario = :user_id);";
            $stmt = $this->conex->prepare($sql);
            //autenticação
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
