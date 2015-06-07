


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

/**
 * Formartar os dados do grafico para porcentagem em duas casas decimais;
 * @param {int} total valor total;
 * @param {int} numero Numero de itens; 
 * */
function porcentagemFormat(total, numero) {
    numero = ((numero * 100) / total).toFixed(2);
    return numero;
}

/** 
 * Variavel global;
 */
var cores = ['#3366CC', '#0099FF', '#99CCFF', '#009933', '#33CC33', '#66FF66', '#FF9900', '#FF9933', '#FFCC66', '#FFFF66'];

/** 
 * Variavel global;
 */
$(document).ready(function(){
    for (var i = 0, max = 10; i < max; i++) {
        $('#legenda' + i).css("background-color",cores[i]);
        $('#legenda_turma' + i).css("background-color",cores[i]);
    }
});

/*
 * @function grafico top 10 geral;
 */

$(function () {
    var dados = [];

    for (var i = 0, max = 10; i < max; i++) {
        dados.push({Id: i + 1, Tema: $('#tema' + i).html(), Nota: $('#nota' + i).html()});
    }
    Morris.Bar({
        element: 'chart_top_10',
        data: dados,
        xkey: 'Id',
        ykeys: ['Nota'],
        labels: ['Nota'],
        parseTime: false,
        barColors: function (row, series, type) {
            switch (row.label) {
                case 1:
                    return cores[0];
                    break;
                case 2:
                    return cores[1];
                    break;
                case 3:
                    return cores[2];
                    break;
                case 4:
                    return cores[3];
                    break;
                case 5:
                    return cores[4];
                    break;
                case 6:
                    return cores[5];
                    break;
                case 7:
                   return cores[6];
                    break;
                case 8:
                    return cores[7];
                    break;
                case 9:
                   return cores[8];
                    break;
                case 10:
                   return cores[9];
                    break;
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

        dados.push({Id: i + 1, Tema: $('#tema_turma' + i).html(), Nota: $('#nota_turma' + i).html()});
    }
    Morris.Bar({
        element: 'chart_top_10_turma',
        data: dados,
        xkey: 'Id',
        ykeys: ['Nota'],
        labels: ['Nota'],
        parseTime: false,
         barColors: function (row, series, type) {
            switch (row.label) {
                case 1:
                    return cores[0];
                    break;
                case 2:
                    return cores[1];
                    break;
                case 3:
                    return cores[2];
                    break;
                case 4:
                    return cores[3];
                    break;
                case 5:
                    return cores[4];
                    break;
                case 6:
                    return cores[5];
                    break;
                case 7:
                   return cores[6];
                    break;
                case 8:
                    return cores[7];
                    break;
                case 9:
                   return cores[8];
                    break;
                case 10:
                   return cores[9];
                    break;
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

//	
//
//Morris.Bar({
//element: 'bar-example',
//data: [
//{ y: 'Person A', a: 10 },
//{ y: 'Person B', a: 15 },
//{ y: 'Person C', a: 12 },
//{ y: 'Person D', a: 20 }
//],
//xkey: 'y',
//ykeys: ['a'],
//labels: ['Calls'],
//hideHover: 'always',
//barColors: function (row, series, type) {
//console.log("--> "+row.label, series, type);
//if(row.label == "Person A") return "#AD1D28";
//else if(row.label == "Person B") return "#DEBB27";
//else if(row.label == "Person C") return "#fec04c";
//else if(row.label == "Person D") return "#1AB244";
//}
//});
//
//
//
//



