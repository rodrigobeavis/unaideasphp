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

    public function DaoQualificacao() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function gravarQualificacaoProjeto($qualificacao) {
        try {
            $sql = "INSERT INTO qualificacao
                    (obs_qualificacao,valor_qualificacao,
                    data_hora_qualificacao,
                    id_projeto,id_professor)
                    VALUES
                    (:obs_qualificacao,:valor_qualificacao,
                    now(),
                    :id_projeto,:id_professor)";
            $stmt = $this->conex->prepare($sql);
            $stmt->bindParam(':obs_qualificacao', $qualificacao['obs_qualificacao'], PDO::PARAM_STR);
            $stmt->bindParam(':valor_qualificacao', $qualificacao['qualificar_value'], PDO::PARAM_STR);
            $stmt->bindParam(':id_projeto', $qualificacao['id_projeto'], PDO::PARAM_STR);
            $stmt->bindParam(':id_professor', $qualificacao['id_professor'], PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function verificaQualificacaoProjeto($qualificacao) {
        try {
            $sql = "SELECT 
                        count(id_qualificacao) AS verficar_qual
                    FROM
                        qualificacao
                    WHERE
                        id_professor = :id_professor
                        AND id_projeto = :id_projeto";
            $stmt = $this->conex->prepare($sql);
            $stmt->bindParam(':id_professor', $qualificacao['id_professor'], PDO::PARAM_INT);
            $stmt->bindParam(':id_projeto', $qualificacao['id_projeto'], PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function localizarQualificacaoDoProfessorParaProjeto($id_projeto, $id_professor) {
        try {
            $sql = "SELECT 
                        t1.id_projeto,
                        t1.valor_qualificacao,
                        t1.data_hora_qualificacao,
                        t1.obs_qualificacao
                    FROM
                        qualificacao t1
                    WHERE
                        t1.id_professor = :id_professor
                            AND t1.id_projeto = :id_projeto";
            $stmt = $this->conex->prepare($sql);
            $stmt->bindParam(':id_professor', $id_professor, PDO::PARAM_INT);
            $stmt->bindParam(':id_projeto', $id_projeto, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function topDezQualificacaoProjeto() {
        try {
            $sql = "SELECT 
                        t1.id_projeto,
                        t1.tema_projeto,
                        ROUND(AVG(t2.valor_qualificacao), 2) AS media_notas
                    FROM
                        projeto t1
                            INNER JOIN
                        qualificacao t2 ON t1.id_projeto = t2.id_projeto
                    GROUP BY id_projeto
                    ORDER BY media_notas DESC
                    LIMIT 10";
            $stmt = $this->conex->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
