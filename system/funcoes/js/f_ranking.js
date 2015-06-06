
/**
 * Formartar os dados do grafico para porcentagem em duas casas decimais;
 * @param {int} total valor total;
 * @param {int} numero Numero de itens; 
 * */
function porcentagemFormat(total, numero) {
    numero = ((numero * 100) / total).toFixed(2);
    return numero;
}
/*
 * @function grafico top 10 geral;
 */
$(function () {
    var dados = [];
    for (var i = 0, max = 10; i < max; i++) {
       
        dados.push({Id:i+1, Tema: $('#tema'+i).html(), Nota: $('#nota'+i).html()});
    }
    Morris.Bar({
        element: 'chart_top_10',
        data: dados,
        xkey: 'Id',
        ykeys: ['Nota'],
        labels: ['Nota'],
        parseTime: false,
        barColors: function (row, series, type) {
            if (type === 'bar') {
                var green = Math.ceil(255 * row.y / this.ymax);
                return 'rgb(0,' + green + ',0)';
            }
            else {
                return '#000';
            }
        }
    });
});


/*
 * @function grafico por turma;
 */
$(function () {
    var dados = [];
    for (var i = 0, max = 10; i < max; i++) {
       
        dados.push({Id:i+1, Tema: $('#tema_turma'+i).html(), Nota: $('#nota_turma'+i).html()});
    }
    Morris.Bar({
        element: 'chart_top_10_turma',
        data: dados,
        xkey: 'Id',
        ykeys: ['Nota'],
        labels: ['Nota'],
        parseTime: false,
        barColors: function (row, series, type) {
            if (type === 'bar') {
                var blue = Math.ceil(255 * row.y / this.ymax);
                return 'rgb(0,0,' + blue + ')';
            }
            else {
                return '#000';
            }
        }
    });
});



//
//$('#turma').change(function(){
//    alert($(this).val());
//    alert( $( "#turma option:selected" ).text());
//    ajax_post_turma($(this).val(),$( "#turma option:selected" ).text());
//});
//
//function ajax_post_turma(id_turma,nome_turma) {     
//    var dados = id_turma;
//    var page = "ranking.php";
//    $.ajax({
//        type: 'POST',
//        url: page,
//        data: dados,
//        success: sucessForm(nome_turma),
//        complete: function(){
//            //$('#loading').css({display:"none"});selecionar_turma
//        },
//        error: function () {
//            alertify.error("Falha ao enviar.");
//        }
//    });
//}
//function sucessForm(nome_turma) {
//    alertify.success("<h5>"+nome_turma+"<h5>");
//}
