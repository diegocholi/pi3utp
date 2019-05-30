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

class CrudAlunoEquipeModel {

    private $con;
    private $getCon;

    function __construct()
    {
        $this->getCon = new ModelBase();
        $this->con = $this->getCon->getCon();
    }

    function addAlunoEquipe($idEquipe, $objCadastroEquipe)
    {
        $query = "INSERT INTO aluno (nomeAluno, idEquipe) VALUES (:nomeAluno, :idEquipe)";
        $insert = $this->con->prepare($query);
        $insert->bindParam(':nomeAluno', $objCadastroEquipe->campoDefault, PDO::PARAM_STR, 15);
        $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

        //Executando a quary
        $insert->execute();
        foreach ($objCadastroEquipe->alunoNovoCampo as $value)
        {
            $query = "INSERT INTO aluno (nomeAluno, idEquipe) VALUES (:nomeAluno, :idEquipe)";
            $insert = $this->con->prepare($query);
            $insert->bindParam(':nomeAluno', $value, PDO::PARAM_STR, 15);
            $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

            //Executando a quary
            $insert->execute();
        }
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
    $getDetalheEquipe = new CrudAlunoEquipeModel();
    $getDetalheEquipe->getAlunoEquipe($_POST['idDetalheEquipe']);
}

if (isset($_POST['editAlunosEquipe']))
{
    $obj = json_decode($_POST['editAlunosEquipe']);
    echo $obj->nomeAluno;
}