<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of relatorioModel
 *
 * @author diego
 */
include_once 'ModelBase.php';

class relatorioModel {

    //put your code here
    private $con;
    private $getCon;

    function __construct()
    {
        $this->getCon = new ModelBase();
        $this->con = $this->getCon->getCon();
    }

    function getProvaRampa()
    {
        // **************************** Buscando dados ****************************
        $quary = 'SELECT E.idEquipe, nomeEquipe, distancia FROM rampa AS R INNER JOIN prova AS P ON R.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY distancia DESC';
        $select = $this->con->prepare($quary);

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
        return $resultado;
    }

    function getProvaTracao()
    {
        // **************************** Buscando dados ****************************
        $quary = 'SELECT E.idEquipe, nomeEquipe, peso FROM tracao AS T INNER JOIN prova AS P ON T.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY peso DESC';
        $select = $this->con->prepare($quary);

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
    }

    function getProvaVelocidade()
    {
        // **************************** Buscando dados ****************************
        $quary = 'SELECT E.idEquipe, nomeEquipe, KMH, MS FROM velocidade AS V INNER JOIN prova AS P ON V.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY MS DESC';
        $select = $this->con->prepare($quary);

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
    }

    function getProvaPistaManobrabilidade()
    {
        // **************************** Buscando dados ****************************
        $quary = 'SELECT E.idEquipe, nomeEquipe, (tempo +  furarCone + bater + SairPista) AS tempoLiquido, furarCone, bater, sairPista FROM pista AS PI INNER JOIN prova AS P ON PI.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY tempoLiquido ASC';
        $select = $this->con->prepare($quary);

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
    }

    function addNotaEquipe($nota, $idEquipe)
    {
        try {
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $this->con->prepare('UPDATE equipe SET notaEquipe = notaEquipe + :nota WHERE idEquipe = :id');
            $stmt->execute(array(
                ':id' => $idEquipe,
                ':nota' => $nota
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function resetRelatorio()
    {

        try {
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $this->con->prepare('UPDATE equipe SET notaEquipe = 0 WHERE notaEquipe >= 1 AND idEquipe BETWEEN 1 and 50');
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
        function getRanking()
    {
        // **************************** Buscando dados ****************************
        $quary = 'SELECT nomeEquipe, notaEquipe FROM equipe ORDER BY notaEquipe DESC';
        $select = $this->con->prepare($quary);

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
    }

}

if (isset($_POST['getProvaRampa']))
{
    $getProvaRampa = new relatorioModel();
    $getProvaRampa->getProvaRampa();
}

if (isset($_POST['getProvaTracao']))
{
    $getProvaRampa = new relatorioModel();
    $getProvaRampa->getProvaTracao();
}

if (isset($_POST['getProvaVelocidade']))
{
    $getProvaRampa = new relatorioModel();
    $getProvaRampa->getProvaVelocidade();
}

if (isset($_POST['getProvaPistaManobrabilidade']))
{
    $getProvaRampa = new relatorioModel();
    $getProvaRampa->getProvaPistaManobrabilidade();
}


if (isset($_POST['setRankingEquipe']))
{
    $obj = json_decode($_POST['setRankingEquipe']);
    $getProvaRampa = new relatorioModel();
    $getProvaRampa->addNotaEquipe($obj->nota, $obj->idEquipe);
}

if (isset($_POST['resetRelatorio']))
{
    $getProvaRampa = new relatorioModel();
    $getProvaRampa->resetRelatorio();
}

if (isset($_POST['getRanking']))
{
    $getProvaRampa = new relatorioModel();
    $getProvaRampa->getRanking();
}
