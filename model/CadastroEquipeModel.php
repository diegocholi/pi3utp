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
    $objCadastroEquipe = json_decode($_POST["myDataJson"]);
    $addEquipeDB = new CadastroEquipeModel();
    $addEquipeDB->AddEquipeDB($objCadastroEquipe);
}

class CadastroEquipeModel {

    function AddEquipeDB($objCadastroEquipe)
    {
        $getCon = new ModelBase();
        $con = $getCon->getCon();

        $query = 'INSERT INTO equipe (nomeEquipe, nomeCarro, cor, foto) VALUES (:nomeEquipe, :nomeCarro , :cor , :foto)';
        $insert = $con->prepare($query);
        $insert->bindParam(':nomeEquipe', $objCadastroEquipe->nomeEquipe, PDO::PARAM_STR, 15);
        $insert->bindParam(':nomeCarro', $objCadastroEquipe->nomeCarro, PDO::PARAM_STR, 15);
        $insert->bindParam(':cor', $objCadastroEquipe->cor, PDO::PARAM_STR, 15);
        $insert->bindParam(':foto', $objCadastroEquipe->inputGroupFile, PDO::PARAM_STR, 15);

        //Executando a quary
        $insert->execute();
        if ($insert->rowCount())
        {
            $idEquipe = $con->lastInsertId();

            $query = "INSERT INTO aluno (nomeAluno, idEquipe) VALUES (:nomeAluno, :idEquipe)";
            $insert = $con->prepare($query);
            $insert->bindParam(':nomeAluno', $objCadastroEquipe->campoDefault, PDO::PARAM_STR, 15);
            $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

            //Executando a quary
            $insert->execute();
            foreach ($objCadastroEquipe->alunoNovoCampo as $value)
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
