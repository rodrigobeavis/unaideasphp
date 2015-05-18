/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $("input[name='tipo_user']").click(function () {
        $("#formulario").html("");
        var self = $(this);
        var tipo = self.val();

        var page = "";
        switch (tipo) {
            case "1":
                page = "cadastro_usuario.php";
                break;
            case "2":
                page = "cadastro_professor.php";
                break;
            case "3":
                page = "cadastro_investidor.php";
                break;
        }
        $.ajax({
            //pegando a url apartir da action do form
            url: page,
            data: tipo,
            type: 'POST',
            context: jQuery('#formulario'),
            success: function (data) {
                this.append(data);

               
            }
        });
    });
});
/**
 *funções do modal. 
 */
//evento do mouse sobre o menu sobre
$("a#sobre").mouseover(function () {
    $('#sobre_modal').modal('show');
});

$('#body_sobre').mouseleave(function () {
    $('#sobre_modal').modal('hide');
});

//Deixar dinamica a o acesso de castro dento do login;
$('#modal_call_login').click(function () {
    $('#login').modal('hide');
    $('#cadastro').modal('toogle');

});
//
//                    $('#formulario').on('click', '#button1id', function () {
//                        //alert($('#formulario').contents().find('#button1id').html());
//                        alert($('#button1id').html());
//                         alert($('#cadastro').modal('hide'));
//                        
//                        
//                        $('#login').modal('hide');
//                        $('#cadastro').modal('toogle');
////                        
////                        $('#index_body').contents().find('#login').modal('toogle');
////                        $('#index_body').contents().find('#cadastro').modal('hide');
//                        
//                       
//                    });
//

