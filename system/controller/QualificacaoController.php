<?php

/**
 * Description of QualificacaoController
 *
 * @author RODRIGO
 */

if (file_exists('./system/dao/DaoQualificacao.php')) {
    require_once('./system/dao/DaoQualificacao.php');
} else {
    require_once('../dao/DaoQualificacao.php');
}
class QualificacaoController {
   private $DAO;
    
    public function QualificacaoController(){
          $this->DAO = new DaoQualificacao();
    }
    
    public function verificarQualificacao($verifica_qualificacao) {
        
    }
    
    public function gravarQualificacao($qualificacao) {
        
    }
    
    public function rankingQualificacao($verifica_qualificacao) {
        
    }
    
}
