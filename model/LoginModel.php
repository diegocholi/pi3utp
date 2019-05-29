<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author diego
 */
include_once './mensagens/mensage.php';
include_once 'ModelBase.php';

class LoginModel {

    private $statusLogin;

//put your code here
    public function __construct($login, $senha)
    {
        // **************************** Buscando dados ****************************
        try {
            $getCon = new ModelBase();
            $con = $getCon->getCon();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $quary = 'SELECT * FROM usuario WHERE login = :usuario LIMIT 1';
            $select = $con->prepare($quary);
            //link, valor a ser buscado
            $select->bindValue(':usuario', $login);
            //Executando quary
            $select->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        if ($select->rowCount())
        {
            $resultado = $select->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_CLASS
            foreach ($resultado as $resultados)
            {
                //Os campos login,  senha são referências do banco de dados
                if ($resultados['login'] == $login && $resultados['senha'] == md5($senha))
                {
                    $_SESSION['user'] = md5($login . $senha);
                    $this->statusLogin = true;
                }
                else
                {
                    $this->statusLogin = false;
                }
            }
        }
    }

    function getStatusLogin()
    {
        return $this->statusLogin;
    }

}
