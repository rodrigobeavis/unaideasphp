<?php

/**
 * Description of DaoEquipe
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}
if (file_exists('./system/model/EquipeClass.php')) {
    require_once('./system/model/EquipeClass.php');
} else {
    require_once('../model/EquipeClass.php');
}

class DaoEquipe extends PDOConnectionFactory {

    private $conex = null;

    public function DaoEquipe() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function gravarEquipe($string_equipe) {
        try {
            $sql = "INSERT INTO equipe
                        (id_projeto,
                        id_usuario)
                    VALUES
                        $string_equipe";
            $stmt = $this->conex->prepare($sql);           
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
//    public function atualizarEquipe($dados) {
//         try {
//            $sql = "";
//            $stmt = $this->conex->prepare($sql);
//            //autenticação
//            $stmt->bindParam(':user_name', $cadastro['user_name'], PDO::PARAM_STR);
//            $stmt->bindParam(':area_user', $cadastro['tipo'], PDO::PARAM_STR);
//            $stmt->bindParam(':pw', $cadastro['keyu'], PDO::PARAM_STR);
//            
//            return $stmt->execute();
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//        }
//        parent::Close();
//    }
        
    
}
