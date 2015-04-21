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
      
}
