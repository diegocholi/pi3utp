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
        /* Desencapsulando objeto */
        echo $obj->nomeEquipe . ", ";
        echo $obj->nomeCarro . ", ";
        echo $obj->cor . ", ";
        echo $obj->inputGroupFile . ", ";
        echo $obj->campoDefault . ", ";

        foreach ($obj->alunoNovoCampo as $value)
        {
            echo $value . ", ";
        }

        $con = new PDO('mysql:host=localhost; dbname=pi3utp', 'root', '');
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
            
            echo $con->lastInsertId() . 'Cadastro com sucesso!';
        }
    }

}
