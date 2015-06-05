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
if (file_exists('./system/controller/QualificacaoController.php')) {
    require_once('./system/controller/QualificacaoController.php');
} else {
    require_once('../controller/QualificacaoController.php');
}
class ProjetoController {
   
    private $dao_projeto;
    private $model_projeto;
    private $qualificacao;


    public function ProjetoController() {
        
        $this->dao_projeto = new DaoProjeto();
        $this->model_projeto = new ProjetoClass();
        $this->qualificacao = new QualificacaoController();
        }
    
    public function gravarProjeto($projeto) {
        return $this->dao_projeto->gravarProjeto($projeto);
    }
    
    public function editarProjeto($editar_projeto) {
        $this->dao_projeto->gravar_log_projeto($editar_projeto);    
         return $this->dao_projeto->editarProjeto($editar_projeto);
     }
    
    public function listarProjetosPorTurma($id_turma,$id_professor) {
       $lista_projetos =  $this->dao_projeto->listarProjetosPorTurma($id_turma);
       return $this->organizarListagemDeProjetos($lista_projetos,$id_professor);
    }
    
    public function listarProjetosUsuario($user_id) {
      $lista_projetos =   $this->dao_projeto->listarProjetos($user_id);
      return $this->organizarListagemDeProjetos($lista_projetos,"FALSE");
    }
    
    public function pesquisarProjetoPorTema($tema) {
       $tema = "%".$tema."%";
       $lista_projetos_tema = $this->dao_projeto->listarPesquisaDeProjetosPorTema($tema);
       return $this->organizarListagemDeProjetos($lista_projetos_tema,"FALSE");
    }
    
    public function listarTemasDeProjetos() {
      $lista_temas = $this->dao_projeto->consultarPesquisaDeProjetosPorTema();
      
      foreach ($lista_temas as $item) {
          $listagem[] = $item['tema_projeto']; 
      }      
      return $listagem;
    }
    
    
    private function organizarListagemDeProjetos($lista_projetos,$id_professor) {
        $lista_projetos_array = null;
      foreach ($lista_projetos as $row) {
          $lista_projetos_array[$row->id_projeto]['id_projeto'] = $row->id_projeto;
          $lista_projetos_array[$row->id_projeto]['tema_projeto'] = $row->tema_projeto;
          $lista_projetos_array[$row->id_projeto]['descricao_projeto'] = $row->descricao_projeto;
          $lista_projetos_array[$row->id_projeto]['palavras_chave_projeto'] = $row->palavras_chave_projeto;
          $lista_projetos_array[$row->id_projeto]['status'] = $row->status;
          $lista_projetos_array[$row->id_projeto]['data_cadastro'] = $row->data_cadastro;
          if ($id_professor) {
          $nota_professor = $this->localizarNotaDoProfessor($row->id_projeto,$id_professor);     
          $lista_projetos_array[$row->id_projeto]['valor_qualificacao'] = $nota_professor->valor_qualificacao;
          $lista_projetos_array[$row->id_projeto]['data_hora_qualificacao'] = $nota_professor->data_hora_qualificacao;
          $lista_projetos_array[$row->id_projeto]['obs_qualificacao'] = $nota_professor->obs_qualificacao;
          }
          if ($row->id_usuario != $id) {
           $lista_projetos_array[$row->id_projeto]['membros_equipe'][] = (array) $row;
              $id = $row->id_usuario;
          }    
      }      
      sort($lista_projetos_array);
      return $lista_projetos_array;
    }
    
    private function localizarNotaDoProfessor($id_projeto,$id_professor) {
        return $this->qualificacao->localizarQualificacaoProfessor($id_projeto,$id_professor);
    }
    
    
}
