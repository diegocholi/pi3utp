<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of CadastroEquipeModel
 *
 * @author diego
 */
include_once 'ModelBase.php';
include_once '../mensagens/mensage.php';

class CrudEquipeModel {

    private $con;
    private $getCon;

    function __construct()
    {
        $this->getCon = new ModelBase();
        $this->con = $this->getCon->getCon();
    }

    function buscaEquipeDB($objBuscaEquipe)
    {
        // **************************** Buscando dados ****************************
        $quary = 'SELECT * FROM `equipe` WHERE nomeEquipe LIKE :nomeEquipe';
        $select = $this->con->prepare($quary);

        //link, valor a ser buscado
        $select->bindValue(':nomeEquipe', '%' . $objBuscaEquipe . '%');
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

    function addEquipeDB($objCadastroEquipe)
    {
        $query = 'INSERT INTO equipe (nomeEquipe, nomeCarro, cor, foto) VALUES (:nomeEquipe, :nomeCarro , :cor , :foto)';
        $insert = $this->con->prepare($query);
        $insert->bindParam(':nomeEquipe', $objCadastroEquipe->nomeEquipe, PDO::PARAM_STR, 15);
        $insert->bindParam(':nomeCarro', $objCadastroEquipe->nomeCarro, PDO::PARAM_STR, 15);
        $insert->bindParam(':cor', $objCadastroEquipe->cor, PDO::PARAM_STR, 15);
        $insert->bindParam(':foto', $objCadastroEquipe->inputGroupFile, PDO::PARAM_STR, 15);

        //Executando a quary
        $insert->execute();
        if ($insert->rowCount())
        {
            $idEquipe = $this->con->lastInsertId();

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
            cadastroSucessMensage();
        }
        // mysql_close($this->con);
    }

    function deleteEquipe($idEquipeDelete)
    {
        try {
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->con->prepare('DELETE FROM equipe WHERE idEquipe = :id');
            $stmt->bindParam(':id', $idEquipeDelete);
            $stmt->execute();
            echo $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        // mysql_close($this->con);
    }

    function editEquipeDB($objEditEquipe)
    {
        try {
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->con->prepare('UPDATE equipe SET nomeEquipe = :newNome WHERE idEquipe = :id');

            $stmt->execute(array(
                ':id' => $objEditEquipe->idEquipe,
                ':newNome' => $objEditEquipe->editEquipeField
            ));
            // echo $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        // mysql_close($this->con);
    }

}

if (isset($_POST['buscaEquipe']))
{
    /* Recebendo dados input cadastro via POST */
    $objBuscaEquipe = $_POST['buscaEquipe'];
    $buscaDb = new CrudEquipeModel();
    $buscaDb->buscaEquipeDB($objBuscaEquipe);
}

if (isset($_POST['insertEquipeJson']))
{
    /* Recebendo dados input cadastro via AJAX com json */
    $objCadastroEquipe = json_decode($_POST["insertEquipeJson"]);
    $addEquipeDB = new CrudEquipeModel();
    $addEquipeDB->addEquipeDB($objCadastroEquipe);
}

if (isset($_POST['idEquipeDelete']))
{
    $idEquipeDelete = $_POST['idEquipeDelete'];
    $deleteEquipeDB = new CrudEquipeModel();
    $deleteEquipeDB->deleteEquipe($idEquipeDelete);
}

if (isset($_POST['idEditEquipeSetCampos']))
{
    $idEquipeEdit = $_POST['idEditEquipe'];
    echo $idEquipeEdit;
    $equipeEdit = new CrudEquipeModel();
    $equipeEdit->editEquipeDB($idEquipeEdit);
}

if (isset($_POST['editEquipe']))
{
    $objEditEquipe = json_decode($_POST['editEquipe']);
    $editEquipe = new CrudEquipeModel();
    $editEquipe->editEquipeDB($objEditEquipe);
}