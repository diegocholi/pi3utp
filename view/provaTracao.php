<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['user']))
{
    ?>

    <div class="provaTracao">    
        <h1>Prova Tração</h1>
        <form action="javascript:void(0)">
            <h4>Desempenho</h4>
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Peso(g) </label>
                <div class="col-10">
                    <input class="form-control pesoProvaTracao" type="number" id="example-number-input">
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleSelect2" class="col-2 col-form-label">Selecione a equipe</label>
                <div class="col-10">
                    <select multiple class="form-control allEquipesProvaTracao">

                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary buttonProvaTracao">Enviar</button>
        </form>
    </div>
    <?php
}
else
{
    header('Location: ../login.php');
}