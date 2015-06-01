/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/***
 * Função para POST da qualificação 
 */
$("input[name^='qualificar_value']").on('rating.change', function (event, value, caption, target) {

    var projeto = this.id.split("-");
    var id_projeto = projeto[1];
    ajax_post_qualificar(id_projeto, value);

//    console.log(value);
//    console.log(caption);
//    console.log(target);
});

function ajax_post_qualificar(id_projeto, qualificar_value) {     
    var dados = {id_projeto: id_projeto, qualificar_value: qualificar_value};
    var page = "qualificacao.php";
    $.ajax({
        type: 'POST',
        url: page,
        data: dados,
        success: sucessForm(),
        complete: function(){
            //$('#loading').css({display:"none"});
        },
        error: function () {
            alertify.error("Falha ao enviar.");
        }
    });
}
function sucessForm() {
    alertify.success("<h5>Ok!<h5>");
}
