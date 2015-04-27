<?php
/**
 * Description of DaoTurma
 *
 * @author RODRIGO
 */
if (file_exists('./system/pdo/PDOConnectionFactory.php')) {
    require_once('./system/pdo/PDOConnectionFactory.php');
} else {
    require_once('../pdo/PDOConnectionFactory.php');
}

if (file_exists('./system/model/TurmaClass.php')) {
    require_once('./system/model/TurmaClass.php');
} else {
    require_once('../model/TurmaClass.php');
}

class DaoTurma extends PDOConnectionFactory {

    private $conex = null;

    public function DaoTurma() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    public function consultarTurmas() {
        try {
            $sql = "SELECT 
                         id_turma,curso_turma, periodo_turma, ano_turma
                    FROM
                        turma";
            $stmt = $this->conex->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }

}
