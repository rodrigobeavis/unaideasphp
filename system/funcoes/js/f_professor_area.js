/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$("input[name^='qualificar_value']").on('rating.change', function(event, value, caption, target) {
    
    var projeto = this.id.split("-");
    var id_projeto = projeto[1];
  
//    alert(id_projeto);
//    alert(value);
    ajax_post_qualificar(id_projeto,value);

//    console.log(value);
//    console.log(caption);
//    console.log(target);
});

function ajax_post_qualificar(id_projeto,qualificar_value) {
   
   
    var page = "qualificacao.php";
    if (dados) {
        $.ajax({
            type: 'POST',
            url: page,
            data: dados,
            success: limparForm(),
//          fail: erroAjax()
//        context: jQuery('#formulario'),
//        success:
            error: function () {
                alertify.error("Falha ao enviar o formulário.");
            }
        });
    }
    }


//
//
//$(document).ready(function() {
//       
//    });
//
//
//function ajaxforms(page) {
//    var dados = $('#cadastro_gravar_user').serialize();
//    var page = "qualificacao.php";
//    if (dados) {
//        $.ajax({
//            type: 'POST',
//            url: page,
//            data: dados,
//            success: limparForm(),
////          fail: erroAjax()
////        context: jQuery('#formulario'),
////        success:
//            error: function () {
//                alertify.error("Falha ao enviar o formulário.");
//            }
//        });
//    }
//    function limparForm() {
//        alertify.success("cadastro realizado");
//        $(':input', '#cadastro_gravar_user')
//                .removeAttr('checked')
//                .removeAttr('selected')
//                .not(':button, :submit, :reset, :hidden, :radio, :checkbox')
//                .val('');
//    }
////    function erroAjax() {
////        alertify.error("Erro ao enviar!");
////    }
//}
