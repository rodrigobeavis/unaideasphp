<?php

/**
 * Description of tipo email definição do padrão de email;
 * @author Daniel Rocha, Rodrigo Pedroza
 * @package /sistema/funcoes
 * @since 18/03/2015
 * @version 00
 */

/**
 * função para montar o assunto do email; 
 */
function emailRespAtivacao($dados) {

    $email['de'] = "registros@agnitum.com.br";
    $email['deName'] = "Registro Agnitum";

    $email['para'] = "nemerson.marcilio@protagon.com.br";
    //$email['para'] = "testeteste1700@gmail.com";
    $email['paraName'] = "Nemerson";

    $email['assunto'] = "Agnitum [OutPost Firewall PRO] - Cliente: $dados[nome_completo]";

    $email['corpo'] = "<table border='1' cellpadding='0' cellspacing='0'>
        <thead >
            <tr><th colspan='2' bgcolor='#E0E0D1'>Dados para ativação</th></tr>
        </thead>
        <tbody>
            <tr><td bgcolor='#E0E0D1'>Nome</td><td>$dados[nome_completo]</td></tr>
            <tr><td bgcolor='#E0E0D1'>Serial</td><td>$dados[registro]</td></tr>
            <tr><td bgcolor='#E0E0D1'>CPF/CNPJ</td><td>$dados[cpf_cnpj]</td></tr>
            <tr><td bgcolor='#E0E0D1'>End.Completo</td><td>$dados[logradouro], $dados[numero], $dados[bairro], $dados[cidade], $dados[uf], $dados[cep]</td></tr>
            <tr><td bgcolor='#E0E0D1'>Email</td><td>$dados[email]</td></tr>
            <tr><td bgcolor='#E0E0D1'>Telefone</td><td>$dados[telefone]</td></tr>
            <tr><td bgcolor='#E0E0D1'>Data Registro</td><td>$dados[data_e_hora_de_registro]</td></tr>
        </tbody>
    </table>";
    $email['debug'] = 0;
    
    return $email;
}
