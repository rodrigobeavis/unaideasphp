<?php

/**
 * Description of DAOAtivos
 *
 * @author RODRIGO
 */
if (file_exists('./sistema/PDO/PDOConnectionFactory.php')) {
    require_once('./sistema/PDO/PDOConnectionFactory.php');
} else {
    require_once('../PDO/PDOConnectionFactory.php');
}

class DAOAtivos extends PDOConnectionFactory {

    private $conex = null;

    public function DAOAtivos() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function consultarAtivos() {
        try {
            $sql = "SELECT t1.idAtivos,
                        t1.patrimonio,
                        t1.modelo,
                        t1.tipo,
                        t1.idEmpresa,
                        t1.status_ativos
                    FROM tbl_ativos as t1";

            $stmt = $this->conex->prepare($sql);
            //$stmt->bindValue(1, $tipo);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function inserirAtivos($dados_ativo) {
        try {
            $sql = "INSERT into
                    tbl_ativos(patrimonio,modelo,tipo,idEmpresa,status_ativos)
                    values (?,?,?,?,?,?)";

            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $dados_ativo);
            $stmt->bindValue(2, $dados_ativo);
            $stmt->bindValue(3, $dados_ativo);
            $stmt->bindValue(4, $dados_ativo);
            $stmt->bindValue(5, $dados_ativo);
            $stmt->bindValue(6, $dados_ativo);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function updateAtivos($dados_ativo) {
        try {
            $sql = "UPDATE sistemarequisicaoincidentes.tbl_ativos
                    SET
                    patrimonio = ?,
                    modelo = ?,
                    tipo = ?,
                    idEmpresa = ?,
                    status_ativos = ?
                    WHERE idAtivos = ?";

            $stmt = $this->conex->prepare($sql);

            $stmt->bindValue(1, $dados_ativo);
            $stmt->bindValue(2, $dados_ativo);
            $stmt->bindValue(3, $dados_ativo);
            $stmt->bindValue(4, $dados_ativo);
            $stmt->bindValue(5, $dados_ativo);
            $stmt->bindValue(6, $dados_ativo);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function identificarAtivo($id) {
        try {
            $sql2 = "SELECT t1.idAtivos,
                        t1.patrimonio,
                        t1.modelo,
                        t1.tipo,
                        t1.idEmpresa,
                        t1.status_ativos
                    FROM tbl_ativos as t1
                    where t1.idAtivos = ?";

            $stmt = $this->conex->prepare($sql2);

            $stmt->bindValue(1,$id);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
