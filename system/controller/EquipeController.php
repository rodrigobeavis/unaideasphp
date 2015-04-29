<?php
/**
 * Description of EquipeController
 *
 * @author RODRIGO
 */
if (file_exists('./system/dao/DaoEquipe.php')) {
    require_once('./system/dao/DaoEquipe.php');
} else {
    require_once('../dao/DaoEquipe.php');
}
if (file_exists('./system/model/EquipeClass.php')) {
    require_once('./system/model/EquipeClass.php');
} else {
    require_once('../model/EquipeClass.php');
}

class EquipeController {

    private $dao_equipe;
    private $model_equipe;
    
    public function EquipeController() {
        
        $this->dao_equipe = new DaoEquipe();
        $this->model_equipe = new EquipeClass();
    }
    
    
}
