<?php

/**
 * Description of DaoUser
 *
 * @author RODRIGO
 */
if (file_exists('./sistema/PDO/PDOConnectionFactory.php')) {
    require_once('./sistema/PDO/PDOConnectionFactory.php');
} else {
    require_once('../PDO/PDOConnectionFactory.php');
}

class DAORelatorios extends PDOConnectionFactory {

    private $conex = null;

    public function DAORelatorios() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function relatorioModelo($tipo) {
        try {
            $sql = "SELECT 
                        t2.modelo, t2.patrimonio, COUNT(t1.tipo) AS quantOS
                    FROM
                        tbl_servicos AS t1
                            INNER JOIN
                        tbl_ativos AS t2 ON t1.idAtivos = t2.idAtivos
                    WHERE
                        t1.tipo = ?
                    GROUP BY t2.modelo";
            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $tipo);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function nomeUser($cod_autenticacao) {
        try {
            $sql = "SELECT 
                        nome
                    FROM
                        tbl_autenticacao AS t1
                    WHERE
                        t1.StatusAcesso = 0
                            AND t1.id_Colaboradores = ?";
            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $cod_autenticacao);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

    public function prestadorOS() {
        try {
            $sql = "SELECT 
                        t1.idColaboradores, t1.nome, t2.Cargo, t3.Nome as nomeSetor
                    FROM
                        tbl_colaboradores AS t1
                            INNER JOIN
                        tbl_cargos AS t2 ON t1.idCargos = t2.idCargos
                            INNER JOIN
                        tbl_setor AS t3 ON t2.id_Setor = t3.id_Setor
                        ORDER BY t1.nome";
            $stmt = $this->conex->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
