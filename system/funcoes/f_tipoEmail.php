<?php

/**
 * Rodrigo Pedroza
 * @package /sistema/funcoes
 * @since 18/03/2015
 * @version 00
 */

/**
 * função para formatar o assunto do email da area do investidor; 
 */

//function emailTemplateEmailInvestidor($dados) {
//
//    $email_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
//                <html xmlns='http://www.w3.org/1999/xhtml'>
//                    <head>
//                        <meta name='viewport' content='width=device-width' />
//                        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
//                        <title>Really Simple HTML Email Template</title>
//                        <style>
//                            /* -------------------------------------
//                                            GLOBAL
//                            ------------------------------------- */
//                            * {
//                                margin: 0;
//                                padding: 0;
//                                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
//                                font-size: 100%;
//                                line-height: 1.6;
//                            }
//                            img {
//                                max-width: 100%;
//                            }
//                            body {
//                                -webkit-font-smoothing: antialiased;
//                                -webkit-text-size-adjust: none;
//                                width: 100%!important;
//                                height: 100%;
//                            }
//                            /* -------------------------------------
//                                            ELEMENTS
//                            ------------------------------------- */
//                            a {
//                                color: #348eda;
//                            }
//                            .btn-primary {
//                                text-decoration: none;
//                                color: #FFF;
//                                background-color: #348eda;
//                                border: solid #348eda;
//                                border-width: 10px 20px;
//                                line-height: 2;
//                                font-weight: bold;
//                                margin-right: 10px;
//                                text-align: center;
//                                cursor: pointer;
//                                display: inline-block;
//                                border-radius: 25px;
//                            }
//                            .btn-secondary {
//                                text-decoration: none;
//                                color: #FFF;
//                                background-color: #aaa;
//                                border: solid #aaa;
//                                border-width: 10px 20px;
//                                line-height: 2;
//                                font-weight: bold;
//                                margin-right: 10px;
//                                text-align: center;
//                                cursor: pointer;
//                                display: inline-block;
//                                border-radius: 25px;
//                            }
//                            .last {
//                                margin-bottom: 0;
//                            }
//                            .first {
//                                margin-top: 0;
//                            }
//                            .padding {
//                                padding: 10px 0;
//                            }
//                            /* -------------------------------------
//                                            BODY
//                            ------------------------------------- */
//                            table.body-wrap {
//                                width: 100%;
//                                padding: 20px;
//                            }
//
//                            table.body-wrap .container {
//                                border: 1px solid #f0f0f0;
//                            }
//                            /* -------------------------------------
//                                            FOOTER
//                            ------------------------------------- */
//                            table.footer-wrap {
//                                width: 100%;	
//                                clear: both!important;
//                            }
//                            .footer-wrap .container p {
//                                font-size: 12px;
//                                color: #666;
//
//                            }
//                            table.footer-wrap a {
//                                color: #999;
//                            }
//                            /* -------------------------------------
//                                            TYPOGRAPHY
//                            ------------------------------------- */
//                            h1, h2, h3 {
//                                font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
//                                color: #000;
//                                margin: 40px 0 10px;
//                                line-height: 1.2;
//                                font-weight: 200;
//                            }
//                            h1 {
//                                font-size: 36px;
//                            }
//                            h2 {
//                                font-size: 28px;
//                            }
//                            h3 {
//                                font-size: 22px;
//                            }
//                            p, ul, ol {
//                                margin-bottom: 10px;
//                                font-weight: normal;
//                                font-size: 14px;
//                            }
//                            ul li, ol li {
//                                margin-left: 5px;
//                                list-style-position: inside;
//                            }
//                            /* ---------------------------------------------------
//                                            RESPONSIVENESS
//                                            Nuke it from orbit. It's the only way to be sure.
//                            ------------------------------------------------------ */
//
//                            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
//                            .container {
//                                display: block!important;
//                                max-width: 600px!important;
//                                margin: 0 auto!important; /* makes it centered */
//                                clear: both!important;
//                            }
//                            /* Set the padding on the td rather than the div for Outlook compatibility */
//                            .body-wrap .container {
//                                padding: 20px;
//                            }
//                            /* This should also be a block element, so that it will fill 100% of the .container */
//                            .content {
//                                max-width: 600px;
//                                margin: 0 auto;
//                                display: block;
//                            }
//                            /* Let's make sure tables in the content area are 100% wide */
//                            .content table {
//                                width: 100%;
//                            }
//                        </style>
//                    </head>
//                    <body bgcolor='#f6f6f6'>
//                        <!-- body -->
//                        <table class='body-wrap' bgcolor='#f6f6f6'>
//                            <tr>
//                                <td></td>
//                                <td class='container' bgcolor='#FFFFFF'>
//                                    <!-- content -->
//                                    <div class='content'>
//                                        <table>
//                                            <tr>
//                                                <td>
//                                                    <p>Prezado,</p>
//                                                    <p>Sometimes all you want is to send a simple HTML email with a basic design.</p>
//                                                    <h1>Really simple HTML email template</h1>
//                                                    <p>This is a really simple email template. Its sole purpose is to get you to click the button below.</p>
//                                                    <h2>How do I use it?</h2>
//                                                    <p>All the information you need is on GitHub.</p>
//                                                    <table>
//                                                        <tr>
//                                                            <td class='padding'>
//                                                                <p><a href='' class='btn-primary'>View the source and instructions on GitHub</a></p>
//                                                            </td>
//                                                        </tr>
//                                                    </table>
//                                                    <p>Feel free to use, copy, modify this email template as you wish.</p>
//                                                    <p>Thanks, have a lovely day.</p>
//                                                    <p><a href=''>Follow @leemunroe on Twitter</a></p>
//                                                </td>
//                                            </tr>
//                                        </table>
//                                    </div>
//                                    <!-- /content -->
//                                </td>
//                                <td></td>
//                            </tr>
//                        </table>
//                        <!-- /body -->
//
//                        <!-- footer -->
//                        <table class='footer-wrap'>
//                            <tr>
//                                <td></td>
//                                <td class='container'>
//                                    <!-- content -->
//                                    <div class='content'>
//                                        <table>
//                                            <tr>
//                                                <td align='center'>
//                                                    <p>Don't like these annoying emails? <a href='#'><unsubscribe>Unsubscribe</unsubscribe></a>.
//                                                    </p>
//                                                </td>
//                                            </tr>
//                                        </table>
//                                    </div>
//                                    <!-- /content -->
//                                </td>
//                                <td></td>
//                            </tr>
//                        </table>
//                        <!-- /footer -->
//                    </body>
//                </html>";
//   
//    return $email_body;
//}



/**
 * função para montar o assunto do email; 
 */
function emailTemplateEmailInvestidor($dados) {

    $msg = $dados['body_email'];
    $projeto = $dados['tema_projeto'];
    $nome = $dados['investidor']->nome_investidor;
    $email = $dados['investidor']->email_investidor;
    $tetefone = $dados['investidor']->telefone_investidor;
     
       

    $email_body = "<table width='80%' border='0' cellpadding='1' style='font-size: 1.2em; font-family: 'Helvetica Neue', 'Helvetica', 'Helvetica', 'Arial', 'sans-serif';'>
        <thead >
            <tr><th  style='color:white' colspan='2'color='white' bgcolor='#361e43'>Contato UNAIDEAS</th></tr>
            <tr><th  style='color:white' colspan='2' color='white' bgcolor='#361e43'>Mensagem do Investidor: $nome</th></tr>
        </thead>
        <tbody>
            <tr><td style='color:white' bgcolor='#361e43'><strong>Mensagem</strong></td><td>$msg</td></tr>
            <tr><td style='color:white' colspan='2' align='center' bgcolor='#361e43'><strong>Contatos</strong></td></tr>
            <tr><td style='color:white' bgcolor='#361e43'><strong>Nome</strong></td><td>$nome</td></tr>
            <tr><td style='color:white' bgcolor='#361e43'><strong>Email</strong></td><td>$tetefone</td></tr>
            <tr><td style='color:white' bgcolor='#361e43'><strong>Telefone</strong></td><td>$email</td></tr>
        </tbody>
    </table>";
    
    
    return $email_body;
}
