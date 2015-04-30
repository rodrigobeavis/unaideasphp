<?php
/**
 * Description of UsuarioController
 *
 * @author RODRIGO
 */

if (file_exists('./system/dao/DaoUsuario.php')) {
    require_once('./system/dao/DaoUsuario.php');
} else {
    require_once('../dao/DaoUsuario.php');
}
class UsuarioController {
    
    private $DAO;
    
    public function UsuarioController(){
          $this->DAO = new DaoUsuario();
    }
    public function listarUsuariosDaTurma($id) {
       $lista_usuarios_da_mesma_turma = $this->DAO->localizarUserDaMesmaTurma($id);
       var_dump($id);
        return $lista_usuarios_da_mesma_turma; 
     }
}
