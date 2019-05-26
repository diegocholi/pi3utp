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
    <div class="cadastroEquipes">
        <br>
        <a onclick='navigate("buscaEquipes");' class="btn btn-dark text-light" 
           title="Voltar">
            <img src="../fotoSistema/voltar.png" width="20" height="20"> 
            Voltar
        </a>
        <h1>Cadastro de Equipes</h1>
        <form method="post" action="javascript:void(0)" id="formulario-envia">
            <br>
            <!--Formulário de configuração de cadastro de equipes-->
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label" >Nome da equipe</label>
                <div class="col-10">
                    <input class="form-control " name="nomeEquipe" type="text" placeholder="Este nome será exibido no ranking">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nome do carro</label>
                <div class="col-10">
                    <input class="form-control" name="nomeCarro" type="text" placeholder="Campo Opcional">
                </div>
            </div>

            <!--Cor do para mostragem no grafico-->
            <div class="form-group row">
                <label for="example-color-input" class="col-2 col-form-label">Cor</label>
                <div class="col-10">
                    <input class="form-control" name="cor" type="color" value="#563d7c">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-color-input" class="col-2 col-form-label">Foto do carrinho</label>
                <div class="col-10">
                    <input type="file"  class="col-8 btn btn-secondary" name="inputGroupFile">
                    <label for="example-color-input" class="col-form-label text-white bg-dark">
                        &nbsp;
                        upload foto do carrinho
                        &nbsp;
                    </label>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-color-input" class="col-2 col-form-label">Nome Aluno</label>
                <div class="col-10">
                    <a href="#" id="btnAdicionaAluno" class="btn btn-secondary btn-lg btn-block" ><label class="text-light">➕ Add Campo</label></a><br>
                    <input type="text" class="form-control" name="campoDefault" placeholder="Insira o nome do aluno"/>
                    <div id="imendaHTMLaluno"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" onclick="btnSaveEquipes();">Enviar</button>
        </form> 

    </div>


    <?php
}
else
{
    header('Location: ../login.php');
}
?>
