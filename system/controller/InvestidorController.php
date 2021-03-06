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
if (file_exists('./system/controller/UsuarioController.php')) {
    require_once('./system/controller/UsuarioController.php');
} else {
    require_once('./UsuarioController.php');
}
if (file_exists('./system/controller/EnviarEmailClass.php')) {
    require_once('./system/controller/EnviarEmailClass.php');
} else {
    require_once('./EnviarEmailClass.php');
}
if (file_exists('./system/funcoes/f_tipoEmail.php')) {
    require_once('./system/funcoes/f_tipoEmail.php');
} else {
    require_once('../funcoes/f_tipoEmail.php');
}
class InvestidorController {
   
    private $DAO;
    private $usuario_controller;
    private $enviar_email_class;


    public function InvestidorController(){
          $this->DAO = new DaoInvestidor();
          $this->usuario_controller = new UsuarioController();
          $this->enviar_email_class = new EnviarEmailClass();
    }
    public function localizarInvestidor($id) {
       $investidor =  $this->DAO->localizarInvestidor($id);
        return $investidor[0]; 
     }
     public function contatoInvestidorComEquipe($dados) {
          $lista_emails = $this->usuario_controller->infoEmailUsuarios($dados['id_projeto']);
          $de = $dados['investidor']->email_investidor;
          $deName = $dados['investidor']->nome_investidor;
          //$para = $lista_emails.",".$dados['investidor']->email_investidor;
          $para = "testeteste1700@gmail.com";
          $paraName = "Equipe do Projeto ".$dados['tema_projeto'];
          $assunto = "Contato Investidor ".$dados['investidor']->nome_investidor;
          //$corpo = $dados['body_email'];
          $corpo  = emailTemplateEmailInvestidor($dados);
          $debug = 0;
      
          return $this->enviar_email_class->enviarEmail($de, $deName, $para, $paraName, $assunto, $corpo, $debug); 
     }
     
     
}
