<?php

/**
 * Description of relatorio_licencas.php gravar informações de ativação no banco de dados para ativação.
 * @author Daniel Rocha, Rodrigo Pedroza
 * @package ./
 * @since 18/03/2015
 * @version 00
 */
//if (file_exists("../assets/PHPMailer/class.phpmailer.php")) {
//    require_once("../assets/PHPMailer/class.phpmailer.php");
//} else {
//    require_once("./assets/PHPMailer/class.phpmailer.php");
//}
//
//if (file_exists("../assets/PHPMailer/class.smtp.php")) {
//    require_once("../assets/PHPMailer/class.smtp.php");
//} else {
//    require_once("./assets/PHPMailer/class.smtp.php");
//}
if (file_exists("../assets/PHPMailer/PHPMailerAutoload.php")) {
    require_once("../assets/PHPMailer/PHPMailerAutoload.php");
} else {
    require_once("./assets/PHPMailer/PHPMailerAutoload.php");
}
class EnviarEmailClass {

    public $PHPMailer;

    public function EnviarEmailClass() {
        $this->PHPMailer = new PHPMailer();
    }

//    private $HOST = "smtp.com";
//    private $USERNAME = "ziyon1@gmail.com";
//    private $PWD = ";ggx;1920;";
//    private $PORT = "25";
    
    private $HOST = "ssl://smtp.googlemail.com";
    private $USERNAME = "testeteste1700@gmail.com";
    private $PWD = "teste1900";
    private $PORT = "465";

    public function enviarEmail($de, $deName, $para, $paraName, $assunto, $corpo, $debug) {

        $this->PHPMailer->isSMTP();
        $this->PHPMailer->SMTPDebug = $debug;
        $this->PHPMailer->Host = $this->HOST;
        $this->PHPMailer->Port = $this->PORT;
        $this->PHPMailer->SMTPAuth = true;
        $this->PHPMailer->SMTPSecure = true; //'tls'"ssl"
        $this->PHPMailer->Username = $this->USERNAME;
        $this->PHPMailer->Password = $this->PWD;
        $this->PHPMailer->setFrom($de, $deName);
        $this->PHPMailer->addAddress($para, $paraName);
        $this->PHPMailer->Subject = $assunto;
        $this->PHPMailer->msgHTML($corpo);
       
        if (!$this->PHPMailer->send()) {
            return "Erro:" . $this->PHPMailer->errorInfo;
        } else {
            $this->PHPMailer->ClearAddresses();  // each AddAddress add to list
            $this->PHPMailer->ClearCCs();
            $this->PHPMailer->ClearBCCs();
            return TRUE;
        }
    }

}
