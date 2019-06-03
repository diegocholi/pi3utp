<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrudProvaPista
 *
 * @author diego
 */
include_once 'ModelBase.php';
include_once '../mensagens/mensage.php';

class CrudProvaPista {

    //put your code here

    private $con;
    private $getCon;

    function __construct()
    {
        $this->getCon = new ModelBase();
        $this->con = $this->getCon->getCon();
    }

    function insertProvaPista($idEquipe, $tempo, $furarCone, $bater, $sairFora)
    {
        $query = 'INSERT INTO prova (idEquipe) VALUES (:idEquipe)';
        $insert = $this->con->prepare($query);
        $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

        //Executando a quary
        $insert->execute();
        if ($insert->rowCount())
        {
            $idProva = $this->con->lastInsertId();
            $query = 'INSERT INTO pista (tempo, furarCone, bater, sairPista, idProva) VALUES (:tempo, :furarCone, :bater, :sairPista, :idProva)';
            $insert = $this->con->prepare($query);

            $insert->bindParam(':tempo', $tempo, PDO::PARAM_STR, 15);
            $insert->bindParam(':furarCone', $furarCone, PDO::PARAM_STR, 15);
            $insert->bindParam(':bater', $bater, PDO::PARAM_STR, 15);
            $insert->bindParam(':sairPista', $sairFora, PDO::PARAM_STR, 15);
            $insert->bindParam(':idProva', $idProva, PDO::PARAM_INT, 15);

            //Executando a quary
            $insert->execute();
            echo 'Prova Cadastrada !';
        }
    }

}

if (isset($_POST['provaPista']))
{
    $obj = json_decode($_POST['provaPista']);
    if (isset($obj->idEquipe[0]) && isset($obj->tempo))
    {
        $addProvaPista = new CrudProvaPista();
        $addProvaPista->insertProvaPista($obj->idEquipe[0], $obj->tempo, $obj->furarCone, $obj->bater, $obj->sairFora);
    }
    else
    {
        echo 'Preencha as informações !';
    }
}