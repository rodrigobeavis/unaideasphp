<?php

/**
 * Description of ProjetoController
 *
 * @author RODRIGO
 */
if (file_exists('./system/dao/DaoProjeto.php')) {
    require_once('./system/dao/DaoProjeto.php');
} else {
    require_once('../dao/DaoProjeto.php');
}
if (file_exists('./system/model/ProjetoClass.php')) {
    require_once('./system/model/ProjetoClass.php');
} else {
    require_once('../model/ProjetoClass.php');
}

class ProjetoController {
   
    private $dao_projeto;
    private $model_projeto;
    
    public function ProjetoController() {
        
        $this->dao_projeto = new DaoProjeto();
        $this->model_projeto = new ProjetoClass();
    }
    
    public function gravarProjeto($projeto) {
        return $this->dao_projeto->gravarProjeto($projeto);
    }
    
    
}
