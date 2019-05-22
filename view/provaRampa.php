<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_SESSION['usuario'])){
    ?>

    <div class="provaRampa">    
        Prova Rampa
    </div>
        <?php
}else{
    header('Location: ../login.php');
}