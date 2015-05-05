

function verificar_integrante(){
//    var users = [];
//    var user;
    $( ".select_equipe option:selected" ).each(function() {
        
                 $( this ).hide();
//         user = $( this ).val();    
//         users.push($( this ).val());
//         
//        if (users.indexOf(user) > 0) {
//          
//           
//            alert("opção selecionada");
//        }           
//    $( "option [ ]" ).hide();     
        // alert($( "[id^='nome']" ).html());
    });

}


$('.select_equipe').click(function (){
   verificar_integrante();
});
//
//$('.select_equipe').focusout(function (){
//    verificar_integrante();
//});
//
//$('.select_equipe').change(function (){
//    verificar_integrante();
//});

$('#botao').click(function (){
    verificar_integrante();
});

