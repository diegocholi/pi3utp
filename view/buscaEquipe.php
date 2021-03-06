<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['user']))
{
    ?>
    <div class="buscaEquipe" >    
        <h1> Busca Equipe</h1>
        <div class="divMsgBuscaEquipe"  align="center"></div>
        <br>
        <div class = "row">
            <div class = "col-md-10 col-md-offset-3 table-overflow-responsive">
                <form action="javascript:void(0)"  class="form-inline" method="post">
                    <input id="buscaEquipe" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"  onclick="getEquipe();">Pesquisar</button>
                </form>
            </div>
            <div class = "col-md-2 col-md-offset-3 table-overflow-responsive">
                <a href="#" onclick="navigate('cadastroEquipe');"  class="btn btn-primary">Adicionar Equipe ➕</a>
            </div>
        </div>
        <br>
        <table class="table table-bordered tableAluno">
            <thead>
                <tr>
                    <th>ID Equipe</th>
                    <th>Nome Equipe</th>
                    <th class="detalhesEquipetd">Membros Detalhes</th>
                    <th align="center" class="editarEquipetd">Editar</th>
                    <th align="center" class="deletarEquipetd" >Deletar</th>
                </tr>
            </thead>
            <tbody align="center"  id="tableAluno">

            </tbody>

        </table>
    </div>

    <script src="../controller/buscaEquipeController.js"></script>
    <script src="../controller/cadastroEquipesController.js"></script>


    <?php
}
else
{
    header('Location: ../login.php');
}