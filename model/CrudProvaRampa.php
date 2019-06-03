<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrudProvarampa
 *
 * @author diego
 */
include_once 'ModelBase.php';
include_once '../mensagens/mensage.php';

class CrudProvaRampa {

    private $con;
    private $getCon;

    function __construct()
    {
        $this->getCon = new ModelBase();
        $this->con = $this->getCon->getCon();
    }

    function insertProvaRampa($idEquipe, $distancia)
    {
//        echo $idEquipe . ' ' . $distancia;

        $query = 'INSERT INTO prova (idEquipe) VALUES (:idEquipe)';
        $insert = $this->con->prepare($query);
        $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

        //Executando a quary
        $insert->execute();
        if ($insert->rowCount())
        {
            $idProva = $this->con->lastInsertId();
            $query = 'INSERT INTO rampa (distancia, idProva) VALUES (:distancia, :idProva)';
            $insert = $this->con->prepare($query);

            $insert->bindParam(':distancia', $distancia, PDO::PARAM_STR, 15);
            $insert->bindParam(':idProva', $idProva, PDO::PARAM_INT, 15);

            //Executando a quary
            $insert->execute();
            echo 'Prova Cadastrada !';
        }
        //mysql_close($this->con);
    }

}

if (isset($_POST['provaRampa']))
{
    $obj = json_decode($_POST['provaRampa']);
    $addProvaRampa = new CrudProvaRampa();

    if (isset($obj->idEquipe[0]) && isset($obj->distancia))
    {
        $addProvaRampa->insertProvaRampa($obj->idEquipe[0], $obj->distancia);
    }
    else
    {
        echo 'Preencha as informações !';
    }
}
