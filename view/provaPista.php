<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['usuario']))
{
    ?>

    <div class="provaPista">    
        <h1>Prova Pista & Manobrabilidade</h1>
        <form>
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Distância(m) </label>
                <div class="col-10">
                    <input class="form-control" type="number" id="example-number-input">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Tempo(s) </label>
                <div class="col-10">
                    <input class="form-control" type="number" id="example-number-input">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Penalidade(s) </label>
                <div class="col-10">
                    <select class="form-control" id="exampleFormControlSelect1">
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
                <label for="exampleSelect2" class="col-2 col-form-label">Selecione a equipe</label>
                <div class="col-10">
                <select multiple class="form-control" id="exampleSelect2">
                    <option align = "center">Equipe 1</option>
                    <option align = "center">Equipe 2</option>
                    <option align = "center">Equipe 3</option>
                    <option align = "center">Equipe 4</option>
                    <option align = "center">Equipe 5</option>
                </select>
                    </div>
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