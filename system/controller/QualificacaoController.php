<?php

/**
 * Description of QualificacaoController
 *
 * @author RODRIGO
 */
if (file_exists('./system/dao/DaoQualificacao.php')) {
    require_once('./system/dao/DaoQualificacao.php');
} else {
    require_once('../dao/DaoQualificacao.php');
}

class QualificacaoController {

    private $DAO;

    public function QualificacaoController() {
        $this->DAO = new DaoQualificacao();
    }

    public function gravarQualificacao($qualificacao) {
        $verificar_quali = $this->DAO->verificaQualificacaoProjeto($qualificacao); //verifica se ja foi registrada
        $verificar = $verificar_quali[0];
        if ($verificar->verficar_qual == 0) {
            return $this->DAO->gravarQualificacaoProjeto($qualificacao);
        } else {
            return FALSE;
        }
    }

    public function localizarQualificacaoProfessor($id_projeto, $id_professor) {
        return $this->DAO->localizarQualificacaoDoProfessorParaProjeto($id_projeto, $id_professor);
    }

    public function Top10Geral() {
        return $this->DAO->topDezQualificacaoProjeto();
    }

    public function Top10Turma($id_turma) {
        return $this->DAO->topDezTurmaQualificacaoProjeto($id_turma);
    }

}
