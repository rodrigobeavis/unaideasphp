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

class DaoUser extends PDOConnectionFactory {

    private $conex = null;

    public function DaoUser() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function dadosUser($cod_autenticacao) {
        try {
            $sql = "SELECT 
                        idAutenticacao,
                        nome,
                        login,
                        tipoDeAcesso,
                        regraAcesso,
                        areaAcesso,
                        id_Colaboradores
                    FROM
                        tbl_autenticacao AS t1
                    WHERE
                        t1.StatusAcesso = 0 and
                        t1.idAutenticacao = ?";
            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $cod_autenticacao);
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
                        t1.idColaboradores, t1.nome, t2.Cargo, t3.Nome AS nomeSetor
                    FROM
                        tbl_colaboradores AS t1
                            INNER JOIN
                        tbl_cargos AS t2 ON t1.idCargos = t2.idCargos
                            INNER JOIN
                        tbl_setor AS t3 ON t2.id_Setor = t3.id_Setor
                            INNER JOIN
                        tbl_autenticacao AS t4 ON t1.idColaboradores = t4.id_Colaboradores
                    WHERE
                        t4.areaAcesso = 0
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
