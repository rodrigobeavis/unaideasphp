<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOEmpresa
 *
 * @author RODRIGO
 */
if (file_exists('./sistema/PDO/PDOConnectionFactory.php')) {
    require_once('./sistema/PDO/PDOConnectionFactory.php');
} else {
    require_once('../PDO/PDOConnectionFactory.php');
}
class DAOEmpresa extends PDOConnectionFactory{
    private $conex = null;

    public function DAOEmpresa() {
        $this->conex = PDOConnectionFactory::getConnection();
    }
    public function dadosEmpresa($id_user) {
        try {
            $sql = "SELECT 
                        t1.idEmpresa,
                        t1.CNPJ,
                        t1.RazaoSocial,
                        t1.InscricaoMunicipal,
                        t2.Nome as nome_setor,
                        t3.Cargo,
                        t4.idColaboradores,
                        t4.Nome
                    FROM
                        tbl_empresa AS t1 inner join tbl_setor as t2 on t1.idEmpresa = t2.idEmpresa
                        inner join tbl_cargos as t3 on t2.id_Setor = t3.id_Setor
                        inner join tbl_colaboradores as t4 on t3.idCargos = t4.idCargos
                    WHERE
                        t1.statusEmpresa = 0 and
                        t2.StatusSetor = 0 and
                        t3.statusCargo = 0 and
                        t4.idColaboradores = ?";            
            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $id_user);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
   public function InserirEmpresa($dados) {
        try {
            $sql = "INSERT INTO tbl_empresa 
                        (CNPJ ,
                         RazaoSocial ,
                         InscricaoMunicipal)
                        VALUES(?,?,?,?)";            
            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $dados['CNPJ']);
            $stmt->bindValue(2, $dados['RazaoSocial']);
            $stmt->bindValue(3, $dados['InscricaoMunicipal']);
            
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
     public function AtualizarEmpresa($dados) {
        try {
            $sql = "UPDATE tbl_empresa 
                    SET
                        CNPJ  = ?,
                        RazaoSocial  = ?,
                        InscricaoMunicipal  = ?,
                    WHERE idEmpresa = ?";            
            $stmt = $this->conex->prepare($sql);
            $stmt->bindValue(1, $dados['CNPJ']);
            $stmt->bindValue(2, $dados['RazaoSocial']);
            $stmt->bindValue(3, $dados['InscricaoMunicipal']);
            $stmt->bindValue(4, $dados['idEmpresa']);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        parent::Close();
    }
    
    
    
}
