

function verificar_integrante(){
    var users = [];
    var user;
    $( ".select_equipe option:selected" ).each(function() {
        
                
         user = $( this ).val();
         
        if (users.indexOf(user) >= 0) {
            alert(users.indexOf(user));
            alert("opção selecionada");
        }else{
             users.push($( this ).val());
        }
           
//    $( "option [ ]" ).hide();     
        // alert($( "[id^='nome']" ).html());
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

