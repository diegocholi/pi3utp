<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['usuario']))
{
    ?>

    <div class="provaRampa">    
        <h1>Prova Rampa</h1>

        <form action="javascript:void(0)">
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Distância(m)</label>
                <div class="col-10">
                    <input class="form-control" type="number" id="example-number-input">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleSelect2">Selecione a equipe</label>
                <select multiple class="form-control" id="exampleSelect2">
                    <option align = "center">Equipe 1</option>
                    <option align = "center">Equipe 2</option>
                    <option align = "center">Equipe 3</option>
                    <option align = "center">Equipe 4</option>
                    <option align = "center">Equipe 5</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <?php
}
else
{
    header('Location: ../login.php');
}