<?php

/**
 * Description of DAOServicos
 *
 * @author RODRIGO
 */
if (file_exists('./sistema/PDO/PDOConnectionFactory.php')) {
    require_once('./sistema/PDO/PDOConnectionFactory.php');
} else {
    require_once('../PDO/PDOConnectionFactory.php');
}

class DAOServicos extends PDOConnectionFactory {

    private $conex = null;

    public function DAOServicos() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function consultarServicos() {
        try {
            $sql = "SELECT 
                        t1.id_servico,
                        t1.tipo,
                        t1.titulo,
                        t1.data_estimada,
                        t1.solicitacao,
                        t1.dataHoraInicial,
                        t1.dataHoraFinal,
                        t1.idAtivos,
                        t1.solicitante,
                        t1.prestador,
                        t1.status
                    FROM
                        tbl_servicos AS t1
                    ORDER BY t1.dataHoraInicial";
            $stmt = $this->conex->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function inserirServicos($dados_OS) {
        try {
            $sql = "INSERT INTO tbl_servicos
                        (tipo,
                        titulo,
                        solicitacao,
                        dataHoraInicial,
                        idAtivos,
                        solicitante,
                        prestador)
                        VALUES
                        (?,?,?,now(),?,?,?)";

            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $dados_OS['tipo']);
            $stmt->bindValue(2, $dados_OS['titulo']);
            $stmt->bindValue(3, $dados_OS['descricao']);
            $stmt->bindValue(4, $dados_OS['ativos']);
            $stmt->bindValue(5, $dados_OS['solicitante']);
            $stmt->bindValue(6, $dados_OS['prestador']);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function updateStatus($dados_status) {
        var_dump($dados_status);
        try {
            $sql = "UPDATE tbl_servicos
                        SET
                        status = :status
                        WHERE id_servico = :id";

            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(":status",$dados_status['status']);
            $stmt->bindValue(":id",$dados_status['id_servico']);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function updateTempo($dados_data) {
        var_dump($dados_data);
        try {
            $sql = "UPDATE tbl_servicos
                    SET
                    data_estimada = :data
                    WHERE id_servico = :id";

            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(":data", $dados_data['data_estimada'],PDO::PARAM_STR);
            $stmt->bindValue(":id", $dados_data['id_servico']);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function updateSolucao($dados_solucao) {
        var_dump($dados_solucao);
        try {
            $sql = " ";

            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $dados_OS['tipo']);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
