<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlonoEquipeModel
 *
 * @author diego
 */
include_once 'ModelBase.php';
include_once '../mensagens/mensage.php';

class AlunoEquipeModel {

    private $con;
    private $getCon;

    function __construct()
    {
        $this->getCon = new ModelBase();
        $this->con = $this->getCon->getCon();
    }

    function getAlunoEquipe($idEquipe)
    {
        // **************************** Buscando dados ****************************
        $quary = 'SELECT * FROM aluno WHERE idEquipe = :idEquipe';
        $select = $this->con->prepare($quary);

        //link, valor a ser buscado
        $select->bindValue(':idEquipe', $idEquipe);
        //Executando quary
        $select->execute();
        if ($select->rowCount())
        {
            $resultado = $select->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_CLASS
            echo json_encode($resultado, JSON_PRETTY_PRINT);
        }
        else
        {
            echo 'ERRO na consulta';
        }
        // mysql_close($this->con);
    }

}

if (isset($_POST['idDetalheEquipe']))
{
    $getDetalheEquipe = new AlunoEquipeModel();
    $getDetalheEquipe->getAlunoEquipe($_POST['idDetalheEquipe']);
}
