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
    
    public function gravarEquipe($projeto,$id_last_projeto,$user_id) {
        for ($i = 1; $i < 8; $i++) {
            if ($projeto['nome'.$i]) {
                 $equipe[] = $projeto['nome'.$i];
            }      
        }
        $equipe[] = $user_id;
        
        sort($equipe);
        
     
        foreach ($equipe as $row) {
            $string_equipe .= " ('{$id_last_projeto}', '{$row}'),";
        }       
        $string_equipe = substr($string_equipe, 0, -1);   

        
        return $this->dao_equipe->gravarEquipe($string_equipe);       
    }
}
