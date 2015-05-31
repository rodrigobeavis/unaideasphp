<?php
/**
 * Description of InvestidorController
 *
 * @author RODRIGO
 */
if (file_exists('./system/dao/DaoInvestidor.php')) {
    require_once('./system/dao/DaoInvestidor.php');
} else {
    require_once('../dao/DaoInvestidor.php');
}
class InvestidorController {
   
      private $DAO;
    
    public function InvestidorController(){
          $this->DAO = new DaoInvestidor();
    }
    public function localizarInvestidor($id) {
       $investidor =  $this->DAO->localizarInvestidor($id);
        return $investidor[0]; 
     }
}
