<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrudProvaVelocidade
 *
 * @author diego
 */
include_once 'ModelBase.php';
include_once '../mensagens/mensage.php';

class CrudProvaVelocidade {

    //put your code here

    private $con;
    private $getCon;

    function __construct()
    {
        $this->getCon = new ModelBase();
        $this->con = $this->getCon->getCon();
    }

    function insertProvaVelocidade($idEquipe, $velocidadeMS, $velocidadeKMH)
    {
        // echo $idEquipe . ' ' . $velocidadeMS . ' ' . $velocidadeKMH;

        $query = 'INSERT INTO prova (idEquipe) VALUES (:idEquipe)';
        $insert = $this->con->prepare($query);
        $insert->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT, 15);

        //Executando a quary
        $insert->execute();
        if ($insert->rowCount())
        {
            $idProva = $this->con->lastInsertId();
            $query = 'INSERT INTO velocidade (KMH, MS, idProva) VALUES (:KH, :MS, :idProva)';
            $insert = $this->con->prepare($query);
            
            $insert->bindParam(':KH', $velocidadeKMH, PDO::PARAM_STR, 15);
            $insert->bindParam(':MS', $velocidadeMS, PDO::PARAM_STR, 15);
            $insert->bindParam(':idProva', $idProva, PDO::PARAM_INT, 15);

            //Executando a quary
            $insert->execute();
            echo 'Prova Cadastrada !';
        }
        //mysql_close($this->con);
    }

}

if (isset($_POST['provaTracao']))
{
    $obj = json_decode($_POST['provaTracao']);

    $insertProvaVelocidade = new CrudProvaVelocidade();
    $insertProvaVelocidade->insertProvaVelocidade($obj->idEquipe[0], $obj->velMS, $obj->velKH);
}
