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

    public function DaoQualificacao()  {
        $this->conex = PDOConnectionFactory::getConnection();
    }
}
