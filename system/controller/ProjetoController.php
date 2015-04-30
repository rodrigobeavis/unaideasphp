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
   
    private $dao_projto;
    private $model_projeto;
    
    public function EquipeController() {
        
        $this->dao_projto = new DaoProjeto();
        $this->model_projeto = new ProjetoClass();
    }
    
    
    
    
}
