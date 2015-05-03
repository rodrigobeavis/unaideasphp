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
    } else {
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
    $('#turma').chosen({no_results_text: "Oops, não encontrado!!"});
});


$(document).ready(function () {
    $('#button1id').click(function () {
        var tipo = $('#tipo').val();
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

        var validar_form = validar(tipo);
      //  alert(validar_form);
        if (validar_form == 0) {
            ajaxforms(page);
        } else {
            alertify.error("Erro no cadastro verifique os campos!");
        }



    });
});

function ajaxforms(page) {
    var dados = $('#cadastro_gravar_user').serialize();

    if (dados) {
        $.ajax({
            type: 'POST',
            url: page,
            data: dados,
            success: limparForm(),
//            fail: erroAjax()
//        context: jQuery('#formulario'),
//        success: 
        });
    }
    function limparForm() {
        alertify.success("cadastro realizado");
        $(':input', '#cadastro_gravar_user')
                .removeAttr('checked')
                .removeAttr('selected')
                .not(':button, :submit, :reset, :hidden, :radio, :checkbox')
                .val('');
    }
//    function erroAjax() {
//        alertify.error("Erro ao enviar!");
//    }

}
function validar(tipo) {
    var validar = 0;
    $("#cadastro_gravar_user input").each(function () {
        $(this).val() == "" ? validar++ : "";
    });

    if (tipo == "1") {
        $('#turma').val() == null ? "" : validar--;//validar select turma
    }
    if (tipo == "2") {
        $('#tipo_professor').val() == null ? validar++ : ""; //validar select tipo de professor
        //  alert($('#tipo_professor').val());
    }
    //instruções para fachar o modal de cadastro e abrir o modal login se o formulario estiver correto
    if (validar == 0) {
        $('#button1id').attr('data-dismiss', 'modal').attr('data-toggle', 'modal').attr('data-target', '#login');
    } else {
        $('#button1id').removeAttr('data-dismiss', 'modal').removeAttr('data-toggle', 'modal').removeAttr('data-target', '#login');
    }
   
    //alert(validar);
    return validar;
}





$.validateEmail = function (email)
{
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
};

$(document).ready(function ()
{
    $('#email').change(function () {
        if ($.validateEmail($('#email').val())) {
          //  alert("email valido");
        } else {
           alertify.error("email invalido");
        }
    });
});

$(function ($) {
    $("#tel").mask("(99) 9999-9999");
    $("#telefone_professor").mask("(99) 9999-9999");
});
