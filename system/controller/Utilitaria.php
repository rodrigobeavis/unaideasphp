<?php

/**
 * Description of Utilitaria
 *
 * @author RODRIGO
 */
class Utilitaria {

    /**
     * @assert ("12/01/2015 11:00") == "2015-01-12 11:00"
     * @assert ("11/01/2015 11:00") == "2015-01-11 11:00"
     * @assert ("14/10/2015 11:00") == "2015-10-14 11:00"
     * @assert ("13/09/2015 13:00") == "2015-09-13 13:00"
     * @assert ("17/07/2015 11:00") == "2015-07-17 11:00"
     * @assert ("34/03/2015 11:00") == "2015-03-34 11:00"
     * @assert ("12/05/2015 14:00") == "2015-05-12 11:00"
     * @assert ("29/02/2015 15:00") == "2015-01-29 16:00"
     */
    public function inverterDateTime($dados_data) {
        $data = explode(" ", $dados_data);
        $data['formatada'] = implode('-', array_reverse(explode("/", $data[0])));
        $dados_data = $data['formatada'] . " " . $data[1];

        return $dados_data;
    }

    /**
     * @assert ("12/01/2015") == "2015-01-12"
     * @assert ("11/01/2015") == "2015-01-11"
     * @assert ("14/10/2015") == "2015-10-14"
     * @assert ("13/09/2015") == "2015-09-13"
     * @assert ("17/07/2015") == "2015-07-17"
     * @assert ("34/03/2015") == "2015-03-34"
     * @assert ("12/05/2015") == "2015-05-12"
     * @assert ("29/02/2015") == "2015-01-29"
     */
    public function inverterDate($dados_data) {
        $data = implode('-', array_reverse(explode("/", $dados_data)));
        return $dados_data;
    }

}
