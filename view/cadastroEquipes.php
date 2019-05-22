<!DOCTYPE html>
<link rel="stylesheet" href="../controller/cadastroEquipesController.css">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (isset($_SESSION['usuario']))
{
    ?>
    <br>
    <div class="cadastroEquipes">

        <a href="#" class="CliqueBuscaEquipes btn btn-dark" 
           style=" text-decoration: none; 
           color : #EFFBFB;
           font-family: Verdana, Helvetica, sans-serif;
           font-weight: bold;"
           title="Voltar">
            <img src="../fotoSistema/voltar.png" width="20" height="20"> 
            Voltar
        </a>
        <br>
        <br>
        <h5>Cadastro de Equipes</h5>
        <form onsubmit="return enviar();">
            <div class="border border-dark" >
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
                <div class="form-group">
                    <div class="col-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-dark" >
                <p>&nbsp;Nome Aluno</p>
                <a href="#" id="btnAdicionaAluno" class="btn btn-secondary btn-lg btn-block" ><label style="display: block">➕ Add Campo</label></a><br>
                <input type="text" class="form-control" placeholder="Insira o nome do aluno"/>
                <div id="imendaHTMLaluno"></div>
                <br>
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