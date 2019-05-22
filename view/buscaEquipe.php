<link rel="stylesheet" href="../controller/buscaEquipeController.css">
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['usuario']))
{
    ?>

    <div class="buscaEquipe">    
        <h5> Busca Equipe</h5>

        <div class = "row">
            <div class = "col-md-10 col-md-offset-3 bg-light table-overflow-responsive">
                <form class="form-inline" onclick="buscaEquipe();">
                    <input id="buscaCliente" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class = "col-md-2 col-md-offset-3 bg-light table-overflow-responsive">
                <a href="#" class="btn btn-primary CliqueCadastroEquipes">Adicionar Equipe ➕</a>
            </div>
        </div>
        <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Equipe</th>
                    <th>Nome Equipe</th>
                    <th>Membros Equipe</th>
                    <th align="center">Editar</th>
                    <th align="center">Deletar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Clark</td>
                    <td>Kent</td>
                    <td align="center">✏️</td>
                    <td align="center">
                        <a class="deleteEquipe btn"> ❌ </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>John</td>
                    <td>Carter</td>
                    <td align="center">✏️</td>
                    <td align="center">
                        <a class="deleteEquipe btn"> ❌ </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Peter</td>
                    <td>Parker, Solange, Diego, Rafael</td>
                    <td align="center">✏️</td>
                    <td align="center">
                        <a class="deleteEquipe btn"> ❌ </a>
                    </td>
                </tr>            
            </tbody>
        </table>

    </div>

    <script src="../controller/buscaEquipeController.js"></script>
    <!-- Chamando script cadastro de equipes <EXTEND> -->
    <script src="../controller/cadastroEquipesController.js"></script>
    <?php
}
else
{
    header('Location: ../login.php');
}