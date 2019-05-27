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
if (isset($_POST['myDataJson']))
{
    /* Recebendo dados input cadastro via AJAX com json */
    $obj = json_decode($_POST["myDataJson"]);
    $addEquipeDB = new CadastroEquipeModel();
    $addEquipeDB->AddEquipeDB($obj);
}

class CadastroEquipeModel {

    function AddEquipeDB($obj)
    {
        $getCon = new ModelBase();
        $con = $getCon->getCon();

        foreach ($obj->alunoNovoCampo as $value)
        {
            echo $value . ", ";
        }

        $query = 'INSERT INTO equipe (nomeEquipe, nomeCarro, cor, foto) VALUES (:nomeEquipe, :nomeCarro , :cor , :foto)';
        $insert = $con->prepare($query);
        $insert->bindParam(':nomeEquipe', $obj->nomeEquipe, PDO::PARAM_STR, 15);
        $insert->bindParam(':nomeCarro', $obj->nomeCarro, PDO::PARAM_STR, 15);
        $insert->bindParam(':cor', $obj->cor, PDO::PARAM_STR, 15);
        $insert->bindParam(':foto', $obj->inputGroupFile, PDO::PARAM_STR, 15);

        //Executando a quary
        $insert->execute();
        if ($insert->rowCount())
        {
            $idEquipe = $con->lastInsertId();

            $query = "INSERT INTO aluno (nomeAluno, idEquipe) VALUES (:nomeAluno, :idEquipe)";
            $insert = $con->prepare($query);
            $insert->bindParam(':nomeAluno', $obj->campoDefault, PDO::PARAM_STR, 15);
            $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

            //Executando a quary
            $insert->execute();
            foreach ($obj->alunoNovoCampo as $value)
            {
                $query = "INSERT INTO aluno (nomeAluno, idEquipe) VALUES (:nomeAluno, :idEquipe)";
                $insert = $con->prepare($query);
                $insert->bindParam(':nomeAluno', $value, PDO::PARAM_STR, 15);
                $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

                //Executando a quary
                $insert->execute();
            }
            cadastroSucessMensage();
        }
    }

}
