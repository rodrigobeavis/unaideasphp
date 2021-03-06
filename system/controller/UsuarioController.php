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
        return $this->DAO->localizarUserDaMesmaTurma($id); 
     }
     
     public function infoUsusario($id) {
         $info_cad_usuario = $this->DAO->localizarUser($id);
        return $info_cad_usuario[0]; 
     } 
     public function infoEmailUsuarios($id_projeto) {
      
         $info_cad_usuario = $this->DAO->localizarEmailUsers($id_projeto);
         
         foreach ($info_cad_usuario as $row) {
             $lista_de_emails.= $row->email.",";
         }
     
        return rtrim($lista_de_emails, ","); 
     }
     
//     public function listarUsuariosDaTurma($id) {
//       $lista_usuarios_da_mesma_turma = $this->DAO->localizarUserDaMesmaTurma($id); 
//       var_dump($lista_usuarios_da_mesma_turma);
//       foreach ($lista_usuarios_da_mesma_turma as $row) {
//           $lista[] =  array (
//               'value'=>$row['id_usuario'],
//               'text'=>$row[nome_usuario]
//           );
//           
//           
//       }
//   
//         return json_encode($lista);
//         
//         
//     }
     
     
     
     
}
