
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



//    Morris.Bar({
//        element: 'chart_top_10',
//        data: [
//            {y: '2006', a: 100, b: 90},
//            {y: '2007', a: 75, b: 65},
//            {y: '2008', a: 50, b: 40},
//            {y: '2009', a: 75, b: 65},
//            {y: '2010', a: 50, b: 40},
//            {y: '2011', a: 75, b: 65},
//            {y: '2012', a: 100, b: 90}
//        ],
//        xkey: 'y',
//        ykeys: ['a', 'b'],
//        labels: ['Series A', 'Series B']
//    });
//data: [
//            {x: '2011 Q1', y: 0},
//            {x: '2011 Q2', y: 1},
//            {x: '2011 Q3', y: 2},
//            {x: '2011 Q4', y: 3},
//            {x: '2012 Q1', y: 4},
//            {x: '2012 Q2', y: 5},
//            {x: '2012 Q3', y: 6},
//            {x: '2012 Q4', y: 7},
//            {x: '2013 Q1', y: 8}
//        ],

});


/*
 * @function grafico por turma;
 */
$(function () {

    Morris.Bar({
        element: 'chart_turma',
        data: [
            {x: '2011 Q1', y: 0},
            {x: '2011 Q2', y: 1},
            {x: '2011 Q3', y: 2},
            {x: '2011 Q4', y: 3},
            {x: '2012 Q1', y: 4},
            {x: '2012 Q2', y: 5},
            {x: '2012 Q3', y: 6},
            {x: '2012 Q4', y: 7},
            {x: '2013 Q1', y: 8}
        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Y'],
        barColors: function (row, series, type) {
            if (type === 'bar') {
                var red = Math.ceil(255 * row.y / this.ymax);
                return 'rgb(' + red + ',0,0)';
            }
            else {
                return '#000';
            }
        }
    });

});
$('#turma').change(function(){
    alert($(this).val());
    alert( $( "#turma option:selected" ).text());
    ajax_post_turma($(this).val(),$( "#turma option:selected" ).text());
});

function ajax_post_turma(id_turma,nome_turma) {     
    var dados = id_turma;
    var page = "ranking.php";
    $.ajax({
        type: 'POST',
        url: page,
        data: dados,
        success: sucessForm(nome_turma),
        complete: function(){
            //$('#loading').css({display:"none"});selecionar_turma
        },
        error: function () {
            alertify.error("Falha ao enviar.");
        }
    });
}
function sucessForm(nome_turma) {
    alertify.success("<h5>"+nome_turma+"<h5>");
}
