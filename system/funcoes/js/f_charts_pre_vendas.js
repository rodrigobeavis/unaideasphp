/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
 * @function grafico da pagina quantidade por mes;
 */
$(function () {
    var dados_valor_por_mes = [];
    var dados_valor_por_mes = $('#info_grafico_atendimento_mes').val();

    Morris.Area({
        element: 'info_grafico_atendimento_mes_chart',
        behaveLikeLine: true,
        data: jQuery.parseJSON(dados_valor_por_mes),
        xkey: 'mes',
        ykeys: ['quant','quant_abertos','quant_fechados_insucesso','quant_fechados_sucesso'],
        labels: ['Quant.Total','Em abertos','Fechados insucesso','Fechados Sucesso'],
        xLabelAngle: 60,
        lineColors:['#0033CC','#FF9933','#FF0000','#009933'],
        parseTime: false
    });

});

/*
 * @function grafico da pagina valor por mes;
 */
$(function () {
    var dados_valor_por_mes = [];
    var dados_valor_por_mes = $('#info_grafico_atendimento_mes').val();

    Morris.Area({
        element: 'valor_pre_venda_chart',
        behaveLikeLine: true,
        data: jQuery.parseJSON(dados_valor_por_mes),
        xkey: 'mes',
        ykeys: ['valor'],
        labels: ['Valor'],
        xLabelAngle: 60,
        lineColors:['#005CB8','#E68A2E','#009933'],
        parseTime: false
    });

});

/*
 * @function grafico motivos de insucesso;
 */
$(function () {
    var dados_valor_por_mes = [];
    var dados_valor_por_mes = $('#info_grafico_motivo_chart').val();
    

    Morris.Area({
        element: 'motivo_chart',
        behaveLikeLine: true,
        data: jQuery.parseJSON(dados_valor_por_mes),
        xkey: 'MOTIVO_INSUCESSO',
        ykeys: ['quant'],
        labels: ['quant'],
        xLabelAngle: 60,
        lineColors:['#FF0000'],
        parseTime: false
    });

});
/*
 * @function grafico motivos de status agendamentos;
 */
$(function () {

    var dados = [];
    var status_value1 = parseInt($('#quant_fechado').html());
    var status_value2 = parseInt($('#quant_aberto').html());
    var total = status_value1 + status_value2;
    var cores = [];

    if (status_value1) {
        array_status = {
            'label': $('#status_fechado').html(),
            'value': porcentagemFormat(total, status_value1)
        };
        cores.push('#0BA462');
        dados.push(array_status);
    }
    if (status_value2) {
        array_status1 = {
            'label': $('#status_aberto').html(),
            'value': porcentagemFormat(total, status_value2)
        };
        cores.push('#FF0000');
        dados.push(array_status1);
    }
    Morris.Donut({
        element: 'chart_status_agendamento',
        data: dados,
        colors: cores,
        stacked: true,
        formatter: function (x) {
            return x + "%"
        }
    }).on('click', function (i, row) {
        console.log(i, row);
    });
});