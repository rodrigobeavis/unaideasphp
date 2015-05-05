

function verificar_integrante(){
    $( ".select_equipe option:selected" ).each(function() {
        if ($( this ).attr('selected', 'false')) {
             $( this ).attr('selected', 'selected');
        }
       
   
    });
}


$('.select_equipe').click(function (){
   verificar_integrante();
});

$('.select_equipe').focusout(function (){
    verificar_integrante();
});

$('.select_equipe').change(function (){
    verificar_integrante();
});

$('#botao').click(function (){
    verificar_integrante();
});

