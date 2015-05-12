<?php

/**
 * Description: Responsável pelo levantamento das oportunidades relacionadas a revendas
 * @author Daniel Rocha, Rodrigo Pedroza 
 * @since 10/11/2014
 * @version 00
 */
if (file_exists("dao/DAORelatorioPreVenda.class.php")) {
    require_once('dao/DAORelatorioPreVenda.class.php');
} else {
    require_once('../dao/DAORelatorioPreVenda.class.php');
}
if (file_exists("funcoes/utilitaria.class.php")) {
    require_once('funcoes/utilitaria.class.php');
} else {
    require_once('../funcoes/utilitaria.class.php');
}

class RelatorioPreVenda {

    private $DAO;
    private $lista_pre_vendas; /*     * Lista de oportunidades-atendimentos */
    private $lista_pedidos_pre/*     * Lista de pedidos referente ao periodo selecionado (informações básicas) */;
    private $info_geral_pre_venda; /*     * Lista dos atendimentos com pedidos relacionados ao cliente */
    private $utilitaria;
    private $pre_venda_mes;
    private $pedidos_comerciais = array(2, 3, 4, 9, 10); /*     * filtrar pedidos comerciais usando array_search */
    private $array_oportunidade_por_status; /*     * status das oportunidades pré-vendas */
    private $array_motivos_insucesso;/** Motivo do insucesso */

    public function RelatorioPreVenda() {
        $this->DAO = new DAORelatorioPreVenda();
        $this->utilitaria = new utilitaria();
    }

    /**
     * @todo consulta  as informações relativas ao atendimento e oportunidade relacionada aos clientes;
     */
    public function clientesPrevenda($dados_pre_venda) {
        if ($dados_pre_venda['data_inicio_pre']) {
            $dados_pre_venda['data_inicio_pre'] = $this->utilitaria->inverterDataBD($dados_pre_venda['data_inicio_pre']);
            $dados_pre_venda['data_termino_pre'] = $this->utilitaria->inverterDataBD($dados_pre_venda['data_termino_pre']);
        } else {
            $dados_pre_venda['data_inicio_pre'] = date_format((date_sub(date_create(), date_interval_create_from_date_string("90 days"))), "Y-m-d");
            $dados_pre_venda['data_termino_pre'] = date_format(date_create(), "Y-m-d");
        }

        $lista_pre_vendas = $this->DAO->listarClientesPrevendaOportunidades($dados_pre_venda);
        $dados_pre_venda['filtro_pedidos'] = $this->pedidosComPrevenda($lista_pre_vendas);
        $lista_pedidos_pre = $this->DAO->listaPedidosPrevenda($dados_pre_venda);

        $this->lista_pre_vendas = $lista_pre_vendas;
        $this->lista_pedidos_pre = $lista_pedidos_pre;

        //  var_dump($lista_pre_vendas[0]);
        //var_dump($lista_pedidos_pre[0]);

        $info_prevendas_geral = $this->concatenarPreVenda();
        $this->info_geral_pre_venda = $info_prevendas_geral;


        return $info_prevendas_geral;
    }

    /**
     * Metodo para filtrar o numero de pedidos a serem consultados;
     */
    private function pedidosComPrevenda($lista_pre_vendas) {
        foreach ($lista_pre_vendas as $row) {
            $array_cod_cliente_filtro .="," . $row->cod_cliente;
        }
        return substr($array_cod_cliente_filtro, 1);
    }

    /**
     * Metodo para concatenar os dados;
     */
    private function concatenarPreVenda() {
        $lista_pre_vendas = $this->lista_pre_vendas;

        foreach ($lista_pre_vendas as $obj_pre_vendas) {
            $array_info = (array) $obj_pre_vendas;
            $array_info['lista_pedidos'] = $this->localizarPedidos($obj_pre_vendas->cod_cliente);
            $array_info_pre_vendas[] = $array_info;
        }
        //var_dump($array_info_pre_vendas);

        return $array_info_pre_vendas;
    }

    /**
     * Metodo para localizar e montar um array com pedidos do cliente;
     */
    private function localizarPedidos($cod_cliente) {
        $lista_pedidos_pre = $this->lista_pedidos_pre;

        foreach ($lista_pedidos_pre as $obj_pedidos_pre) {
            if ($obj_pedidos_pre->cod_cliente == $cod_cliente) {

                $array_pedidos[] = (array) $obj_pedidos_pre;
            }
        }
        return $array_pedidos;
    }

    /**
     * Metodo para retornar a contagem;
     */
    public function retornoContarClientesPedComerciais() {
        return $this->contarClientesPedComercial();
    }

    /**
     * Metodo para contar o numero de clientes com pedidos comerciais;
     */
    private function contarClientesPedComercial() {
        $lista_pre_vendas = $this->info_geral_pre_venda;

        foreach ($lista_pre_vendas as $obj_cliente_comercial) {
            if ($obj_cliente_comercial['lista_pedidos']) {
                if ($obj_cliente_comercial['NIVEL_ATUAL'] == 5 && $obj_cliente_comercial['oportunidade_status'] == 2) {
                    $array_clientes['cliente_adquiriu_quant'] +=1;
                    $array_clientes['cliente_adquiriu'][] = (array) $obj_cliente_comercial;
                } else if ($obj_cliente_comercial['NIVEL_ATUAL'] == 5 && $obj_cliente_comercial['oportunidade_status'] == 3) {
                    $array_clientes['cliente_nao_adquiriu_quant'] +=1;
                    $array_clientes['cliente_nao_adquiriu'][] = (array) $obj_cliente_comercial;
                }
            }
        }
        // Var_dump($array_clientes['cliente_nao_adquiriu'][0]);
        return $array_clientes;
    }

    /**
     * Metodo para retornar a contagem de clientes agendados;
     */
    public function retornoContarClientesAgendados() {
        return $this->contarClientesAgendados();
    }

    /**
     * Metodo para contar o numero de clientes com agendamento prevendas;
     */
    private function contarClientesAgendados() {
        $lista_pre_vendas = $this->lista_pre_vendas;

        foreach ($lista_pre_vendas as $obj_cliente_comercial) {
            if (isset($obj_cliente_comercial->dat_agendamento) && $obj_cliente_comercial->dat_agendamento != "0000-00-00" && $obj_cliente_comercial->dat_agendamento > "1990-01-01") {
                $array_clientes_pre['agendados'] +=1;
                $array_clientes_pre['agendados_detalhes'][] = (array) $obj_cliente_comercial;
            } else {
                $array_clientes_pre['nao_agendados'] +=1;
                $array_clientes_pre['nao_agendados_detalhes'][] = (array) $obj_cliente_comercial;
            }
            if (isset($obj_cliente_comercial->DAT_FECHAMENTO) && $obj_cliente_comercial->DAT_FECHAMENTO != "0000-00-00 00:00:00" && $obj_cliente_comercial->DAT_FECHAMENTO > "1990-01-01") {
                $array_clientes_pre['agendados_fechados'] +=1;
                $array_clientes_pre['agendados_fechados_detalhes'][] = (array) $obj_cliente_comercial;
            } else {
                $array_clientes_pre['agendados_abertos'] +=1;
                $array_clientes_pre['agendados_abertos_detalhes'][] = (array) $obj_cliente_comercial;
            }
        }

        return $array_clientes_pre;
    }

    /**
     * Metodo para retornar a contagem de clientes agendados;
     */
    public function retornoContarClientesPreVendaMes() {
        $this->ContarClientesPreVendaMes();


        $pre_venda_mes = $this->pre_venda_mes;
        foreach ($pre_venda_mes['com_agendamento'] as $row) {
            $atendimento_mes = array(
                'mes' => $row['mes'],
                'mes_formatado' => $row['mes_formatado'],
                'quant' => (isset($row['quant'])) ? $row['quant'] : "-",
                'quant_fechados_insucesso' => (isset($row['quant_fechados_insucesso'])) ? $row['quant_fechados_insucesso'] : "-",
                'quant_fechados_sucesso' => (isset($row['quant_fechados_sucesso'])) ? $row['quant_fechados_sucesso'] : "-",
                'quant_abertos' => (isset($row['quant_abertos'])) ? $row['quant_abertos'] : "-",
                'T_R$' => (string) number_format($row['valor'], 2, ',', '.'),
                'clientes' => $row['clientes'],
            );

            for ($i = 0; $i < count($atendimento_mes['clientes']); $i++) {
                if ($atendimento_mes['clientes'][$i]['NIVEL_ATUAL'] == 5 && $atendimento_mes['clientes'][$i]['oportunidade_status'] == 3 || $atendimento_mes['clientes'][$i]['oportunidade_status'] == 2) {
                   // $atendimento_mes['clientes'][$i]['status_op'] = "Fechado";
                    $atendimento_mes['clientes'][$i]['status_op'] = ($atendimento_mes['clientes'][$i]['oportunidade_status'] == 2)? "Sucesso" : "Insucesso" ;
                } else {
                    $atendimento_mes['clientes'][$i]['status_op'] = "Aberto";
                }
            }



            $atendimentos_pre_venda_mes[] = $atendimento_mes;
        }
        //var_dump($atendimentos_pre_venda_mes[3]);
        return $atendimentos_pre_venda_mes;
    }

    /**
     * Metodo para contar clientes agendados por mes;
     */
    private function ContarClientesPreVendaMes() {
        $lista_pre_vendas = $this->lista_pre_vendas;
        foreach ($lista_pre_vendas as $obj_cliente_comercial) {
            if (isset($obj_cliente_comercial->dat_agendamento)) {
                $mes = date_format(date_create($obj_cliente_comercial->dat_agendamento), "Y-m");
                $array_clientes_mes['com_agendamento'][$mes]['mes_formatado'] = $mes;
                $array_clientes_mes['com_agendamento'][$mes]['mes'] = date_format(date_create($obj_cliente_comercial->dat_agendamento), "m-Y");
                $array_clientes_mes['com_agendamento'][$mes]['quant'] += 1;
                $array_clientes_mes['com_agendamento'][$mes]['valor'] += $obj_cliente_comercial->valor_real;
                $array_clientes_mes['com_agendamento'][$mes]['VALOR_ESTIMADO'] += $obj_cliente_comercial->VALOR_ESTIMADO;
                $array_clientes_mes['com_agendamento'][$mes]['clientes'][] = (array) $obj_cliente_comercial;
                if ($obj_cliente_comercial->NIVEL_ATUAL == 5 && $obj_cliente_comercial->oportunidade_status == 3 || $obj_cliente_comercial->oportunidade_status == 2) {
                    if ($obj_cliente_comercial->oportunidade_status == 3) {
                        $array_clientes_mes['com_agendamento'][$mes]['quant_fechados_insucesso'] += 1;
                        $array_clientes_mes['com_agendamento'][$mes]['clientes_fechados_insucesso'][] = (array) $obj_cliente_comercial;
                    } else if ($obj_cliente_comercial->oportunidade_status == 2) {
                        $array_clientes_mes['com_agendamento'][$mes]['quant_fechados_sucesso'] += 1;
                        $array_clientes_mes['com_agendamento'][$mes]['clientes_fechados_sucesso'][] = (array) $obj_cliente_comercial;
                    }
                } else {
                    $array_clientes_mes['com_agendamento'][$mes]['quant_abertos'] += 1;
                    $array_clientes_mes['com_agendamento'][$mes]['clientes_abertos'][] = (array) $obj_cliente_comercial;
                }
            } else {
                $mes_sem = date_format(date_create($obj_cliente_comercial->DAT_CAD), "m-Y");
                $array_clientes_mes['sem_agendamento'][$mes_sem]['quant'] += 1;
                $array_clientes_mes['sem_agendamento'][$mes_sem]['valor_sem_pre_vendas'] += $obj_cliente_comercial->valor_real;
                $array_clientes_mes['sem_agendamento'][$mes_sem]['clientes_sem_pre_vendas'][] = (array) $obj_cliente_comercial;
            }
        }

        $this->pre_venda_mes = $array_clientes_mes;

        //var_dump($array_clientes_mes);


        return $array_clientes_mes;
    }

    /**
     * Metodo que retorna os objetos para o grafico dos clientes com prevenda por mes;
     */
    public function retonarContagemClientesPreVendaMesGrafico() {
        return $this->contarClientesPreVendaMesGrafico();
    }

    /**
     * Metodo que monta objetos para o grafico dos clientes com prevenda por mes;
     */
    private function contarClientesPreVendaMesGrafico() {
        $pre_venda_mes = $this->pre_venda_mes;
        foreach ($pre_venda_mes['com_agendamento'] as $row) {
            $atendimento_mes = array(
                'mes' => $row['mes'],
                'mes_formatado' => $row['mes_formatado'],
                'quant' => $row['quant'],
                'quant_fechados_insucesso' => (isset($row['quant_fechados_insucesso'])) ? $row['quant_fechados_insucesso'] : 0,
                'quant_fechados_sucesso' => (isset($row['quant_fechados_sucesso'])) ? $row['quant_fechados_sucesso'] : 0,
                'quant_abertos' => $row['quant_abertos'],
                'valor' => (float) $row['VALOR_ESTIMADO'],
                'T_R$' => (string) number_format($row['VALOR_ESTIMADO'], 2, ',', '.'),
            );
            $atendimentos_pre_venda_mes[] = $atendimento_mes;
        }
        return $atendimentos_pre_venda_mes;
    }

    /**
     * Metodo que retorna pedidos comerciais;
     */
    public function retonarContagemPedidosNaoComerciais() {
        return $this->contarPedidosNaoComerciais();
    }

    /**
     * Metodo contar e separar pedidos não comerciais;
     */
    private function contarPedidosNaoComerciais() {
        $lista_pedidos_pre = $this->lista_pedidos_pre;
        //var_dump($lista_pedidos_pre);
        foreach ($lista_pedidos_pre as $obj_pedidos_pre) {
            if (!in_array($obj_pedidos_pre->tipo_venda, $this->pedidos_comerciais)) {
                $array_pedidos['nao_comerciais'] += 1;
                $array_pedidos['nao_comerciais_clientes'][] = (array) $obj_pedidos_pre;
            } else {
                $array_pedidos['comerciais'] += 1;
                $array_pedidos['comerciais_valor'] += $obj_pedidos_pre->valor_nf;
                $array_pedidos['comerciais_clientes'][] = (array) $obj_pedidos_pre;
            }
        }

        // $this->info_geral_pre_venda;
        //var_dump($this->info_geral_pre_venda);
        //var_dump($array_pedidos);
        $this->oportunidadesPorStatus();
        return $array_pedidos;
    }

    /**
     * Metodo que status da oportunidade;
     */
    public function retonarOportunidadesPorStatus() {
        return $this->oportunidadesPorStatus();
    }

    /*     * Verificar o status da oportunidade */

    private function oportunidadesPorStatus() {
        $lista_pre_vendas = $this->lista_pre_vendas;
        foreach ($lista_pre_vendas as $obj_oportunidade) {
            $array_oportunidade_por_status[$obj_oportunidade->NIVEL_ATUAL]['NIVEL'] = $obj_oportunidade->NIVEL_ATUAL;
            $array_oportunidade_por_status[$obj_oportunidade->NIVEL_ATUAL]['descricao'] = $obj_oportunidade->descricao;
            $array_oportunidade_por_status[$obj_oportunidade->NIVEL_ATUAL]['quant'] += 1;
            $array_oportunidade_por_status[$obj_oportunidade->NIVEL_ATUAL]['detalhar'][] = (array) $obj_oportunidade;
        }
        sort($array_oportunidade_por_status);
        $this->array_oportunidade_por_status = $array_oportunidade_por_status;
        // var_dump($array_oportunidade_por_status[0]);
        $this->motivoInsucessoOportunidade();

        return $array_oportunidade_por_status;
    }

    /**
     * Metodo retornar a lista de motivos de insucesso.
     */
    public function motivoInsucesso() {
        return $this->motivoInsucessoOportunidade();
    }

    /**
     * Metodo para filtrar o motivo de insucesso da oportunidade;
     */
    private function motivoInsucessoOportunidade() {
        $lista_pre_vendas = $this->info_geral_pre_venda;

        //  var_dump($lista_pre_vendas);

        foreach ($lista_pre_vendas as $obj_oportunidade) {

            if ($obj_oportunidade['NIVEL_ATUAL'] == 5 && $obj_oportunidade['oportunidade_status'] == 3) {
                $array_oportunidade_motivo[$obj_oportunidade['MOTIVO_INSUCESSO']]['quant'] += 1;
                $array_oportunidade_motivo[$obj_oportunidade['MOTIVO_INSUCESSO']]['MOTIVO_INSUCESSO'] = $obj_oportunidade['MOTIVO_INSUCESSO'];
                $array_oportunidade_motivo[$obj_oportunidade['MOTIVO_INSUCESSO']]['descricao_insucesso'] = strip_tags(utf8_encode($obj_oportunidade['descricao_insucesso']));
                $array_oportunidade_motivo[$obj_oportunidade['MOTIVO_INSUCESSO']]['detalhar'][] = (array) $obj_oportunidade;
            }
        }
        rsort($array_oportunidade_motivo);
        //   var_dump($array_oportunidade_motivo[1]['detalhar']);

        $this->array_motivos_insucesso = $array_oportunidade_motivo;
        return $array_oportunidade_motivo;
    }

    /**
     * Metodo para filtrar o motivo de insucesso da oportunidade;
     */
    public function graficoMotivoInsucesso() {
        $array_motivos_insucesso = $this->array_motivos_insucesso;
        // var_dump($array_motivos_insucesso);
        foreach ($array_motivos_insucesso as $item) {
            $oportunidade = array(
                'MOTIVO_INSUCESSO' => (int) $item['MOTIVO_INSUCESSO'],
                'quant' => (int) $item['quant']
            );
            $motivos_insucesso[] = $oportunidade;
        }
        return $motivos_insucesso;
    }

}
