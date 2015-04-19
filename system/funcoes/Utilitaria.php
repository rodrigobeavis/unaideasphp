<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Utilitaria
 *
 * @author RODRIGO
 */
class Utilitaria {
    
        public function inverterDateTime($dados_data) {
               $data =  explode(" ", $dados_data);         
               $data['formatada'] = implode('-', array_reverse(explode("/", $data[0])));           
               $dados_data = $data['formatada']." ".$data[1];

               return $dados_data;

    }
    
    public function inverterDate($dados_data) {               
               $data = implode('-', array_reverse(explode("/", $dados_data)));
               return $dados_data;

    }
  
    public function localizarStatus($id_status) {
       $lista_status = $this->definirStatus();       
          $status_atual = $lista_status[$id_status];   
          
          return $status_atual;
    }    
    private function definirStatus() { 
        $option_status =  array("Aguardando","Analisando","Verificando","Testando","Concluído");
      return $option_status;
    }
    
    
    
}
