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
    
    public function editarProjeto($editar_projeto) {
        return $this->dao_projeto->editarProjeto($editar_projeto);
    }
    
    public function listarProjetosUsuario($user_id) {
      $lista_projetos =   $this->dao_projeto->listarProjetos($user_id);
          $lista_projetos_array = null;
      foreach ($lista_projetos as $row) {
          $lista_projetos_array[$row->id_projeto]['id_projeto'] = $row->id_projeto;
          $lista_projetos_array[$row->id_projeto]['tema_projeto'] = $row->tema_projeto;
          $lista_projetos_array[$row->id_projeto]['descricao_projeto'] = $row->descricao_projeto;
          $lista_projetos_array[$row->id_projeto]['palavras_chave_projeto'] = $row->palavras_chave_projeto;
          $lista_projetos_array[$row->id_projeto]['status'] = $row->status;
          $lista_projetos_array[$row->id_projeto]['data_cadastro'] = $row->data_cadastro;
          if ($row->id_usuario != $id) {
           $lista_projetos_array[$row->id_projeto]['membros_equipe'][] = (array) $row;
              $id = $row->id_usuario;
          }    
      }      
      sort($lista_projetos_array);
      return $lista_projetos_array;
    }
}
