<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (isset($_SESSION['usuario']))
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
        <form>
            <br>
            <!--Formulário de configuração de cadastro de equipes-->
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label" id="nomeEquipe">&nbsp;Nome da equipe</label>
                <div class="col-10">
                    <input class="form-control" type="text" placeholder="Este nome será exibido no ranking">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label" id="nomeCarro">&nbsp;Nome do carro</label>
                <div class="col-10">
                    <input class="form-control" type="text" placeholder="Campo Opcional">
                </div>
            </div>

            <!--Cor do para mostragem no grafico-->
            <div class="form-group row">
                <label for="example-color-input" class="col-2 col-form-label" id="cor">&nbsp;Cor</label>
                <div class="col-10">
                    <input class="form-control" type="color" value="#563d7c">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-color-input" class="col-2 col-form-label" id="cor">&nbsp;Foto do carrinho</label>
                <div class="input-group col-10">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-color-input" class="col-2 col-form-label" id="cor">&nbsp;Nome Aluno</label>
                <div class="col-10">
                    <a href="#" id="btnAdicionaAluno" class="btn btn-secondary btn-lg btn-block" ><label class="text-light">➕ Add Campo</label></a><br>
                    <input type="text" class="form-control" placeholder="Insira o nome do aluno"/>
                    <div id="imendaHTMLaluno"></div>
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
?>