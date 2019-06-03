<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['user']))
{
    ?>
    <div class="provaPista">    
        <h1>Prova Pista & Manobrabilidade</h1>
        <form action="javascript:void(0)">
            <h4>Desempenho</h4>
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Tempo(s) </label>
                <div class="col-10">
                    <input class="form-control tempoProvaPista" type="number" id="example-number-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleSelect2" class="col-2 col-form-label">Selecione a equipe</label>
                <div class="col-10">
                    <select multiple class="form-control allEquipesProvaPista">

                    </select>
                </div>
            </div>
            <br>
            <h4>Penalidade </h4>
            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-2 col-form-label">Furar o cone</label>
                <div class="col-10">
                    <select class="form-control penalidadeFurarConeProvaPista" id="exampleFormControlSelect1">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-2 col-form-label">Bater</label>
                <div class="col-10">
                    <select class="form-control penalidadeBaterProvaPista" id="exampleFormControlSelect1">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-2 col-form-label">Sair Fora da Pista </label>
                <div class="col-10">
                    <select class="form-control penalidadeSairForaProvaPista" id="exampleFormControlSelect1">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-7">
                    <!-- div ajuste tela-->
                </div>
                <small id="emailHelp" class="form-text text-muted" align="right">O valor em segundos será acrecentado a equipe caso houver penalidade.</small>
            </div>

            <button type="submit" class="btn btn-primary buttonProvaPista">Enviar</button>
        </form>
    </div>
    <?php
}
else
{
    header('Location: ../login.php');
}