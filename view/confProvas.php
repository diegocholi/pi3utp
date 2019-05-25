<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (isset($_SESSION['user']))
{
    ?>
    <div class="configuracaoProvas">
        <!--Formulário de configuração de provas-->
        <br>
        <h1>Configuração de Provas</h1>
        <form> 
            <h4>Informações gerais</h4>

            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-2 col-form-label">Pontuação máxima</label>
                <div class="col-10">
                    <select class="form-control" id="exampleFormControlSelect1">
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
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <!-- div ajuste tela-->
                </div>
                <small id="emailHelp" class="form-text text-muted">Será reduzido um ponto da pontuação máxima para cada posição abaixo do primeiro lugar.</small>
            </div>


            <h4>Manobrabilidade</h4>



            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-2 col-form-label">Furar o cone</label>
                <div class="col-10">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-2 col-form-label">Bater</label>
                <div class="col-10">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-2 col-form-label">Sair Fora da Pista </label>
                <div class="col-10">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-7">
                    <!-- div ajuste tela-->
                </div>
                <small id="emailHelp" class="form-text text-muted">O valor em segundos será acrecentado a equipe caso houver penalidade.</small>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <?php
}
else
{
    header('Location: ../login.php');
}
?>