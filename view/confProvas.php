<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (isset($_SESSION['usuario'])) {
    ?>
    <div class="configuracaoProvas">
        <!--Formulário de configuração de provas-->
        <br>
        <h1>Configuração de Provas</h1>
        <form> 
            <div class="border border-dark" >
                <div class="border border-dark">
                    <h4>&nbsp;Informações gerais</h4>
                    <label for="exampleFormControlSelect1">&nbsp;&nbsp;Valor máximo de cada prova</label>
                    <small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;&nbsp;Será reduzido um ponto da pontuação máxima para cada posição abaixo do primeiro lugar.</small>
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
                <div class="border border-dark">
                    <h4>&nbsp;Manobrabilidade</h4>
                    <small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;O valor em segundos será acrecentado a equipe caso houver penalidade.</small>
                    <label for="exampleFormControlSelect1">&nbsp;&nbsp;&nbsp;Furar o cone</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label for="exampleFormControlSelect1">&nbsp;&nbsp;&nbsp;Bater</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label for="exampleFormControlSelect1">&nbsp;&nbsp;&nbsp;Sair Fora da Pista </label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <?php
} else {
    header('Location: ../login.php');
}
?>