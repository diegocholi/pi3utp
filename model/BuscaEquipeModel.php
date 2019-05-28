<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BuscaEquipeModel
 *
 * @author diego
 */
include_once 'ModelBase.php';
include_once '../mensagens/mensage.php';

if (isset($_POST['buscaEquipe']))
{
    /* Recebendo dados input cadastro via AJAX com json */
    echo $_POST['buscaEquipe'];
}

class BuscaEquipeModel {
    //put your code here
}
