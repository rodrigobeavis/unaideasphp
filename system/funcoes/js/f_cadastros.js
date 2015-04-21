/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('#erro_senha').hide();
    $('#keyu').change(function () {
        testeKey();
    });
    $('#keyu2').change(function () {
        testeKey();
    });

});

function testeKey() {
    if ($('#keyu').val() != $('#keyu2').val() && $('#keyu').val() && $('#keyu2').val()) {
        $('#button1id').hide();
        $('#erro_senha').show();
    }else{
        $('#erro_senha').hide();
        $('#button1id').show();
    }
}
 $(function () {
            $("#keyu").complexify({}, function (valid, complexity) {
                document.getElementById("mtSenha").value = complexity;
            });
        });

$(document).ready(function () {
   // $('#turma').data("placeholder","Selecione a turma").chosen();
     $('#turma').chosen({no_results_text: "Oops, não encontrado!!"}); 
});
