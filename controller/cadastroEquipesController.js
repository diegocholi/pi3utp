/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var originalState = $("#imendaHTMLaluno").clone(); // Salvando o estado original da DIV de id imendaHTMLaluno

var idControl = 0; // Controlador de ID dos campos
var idContador = 0; // Contador de campo

function exclui(id) {
    var campo = $("#" + id.id);
    var campoExtra = id;
    campo.hide(200);
    idContador--;
}

$(document).ready(function () {

    $("#btnAdicionaAluno").click(function (e) {
        e.preventDefault();
        var tipoCampo = "aluno";
        adicionaCampo(tipoCampo);
    });
    function adicionaCampo(tipo) {
        if (idContador < 21) {
            var idCampo = "campoExtra" + idControl;
            var idForm = "formExtra" + idControl;
            var html = "";
            html += "<div style='margin-top: 8px;' class='input-group' id='" + idForm + "'>";
            html += "<input type='text' name='" + idCampo + "' id='" + idCampo + "' class='form-control alunoNovoCampo' placeholder='Insira o nome do " + tipo + "'/>";
            html += "<span class='input-group-btn'>";
            html += "<button class='btn' onclick='exclui(" + idForm + ")' type='button'><span class='fa fa-trash'>❌</span></button>";
            html += "</span>";
            html += "</div>";
            idContador++;
            idControl++;
            $("#imendaHTML" + tipo).append(html);
        } else {
            alert('Suporte somente a 21 membros por equipes!');
        }
    }
});

function btnSaveEquipes() {
    var mensagem = "";
    var novosCampos = [];
    var camposNulos = false;

    var alunoNovoCampo = [];
    var nomeEquipe = "";
    var nomeCarro = "";
    var cor = "";
    var inputGroupFile = "";
    var campoDefault = "";

    $('.alunoNovoCampo').each(function () {
        if ($(this).is(":visible")) {
            if ($(this).val().length < 1) {
                camposNulos = true;
            } else {
                alunoNovoCampo.push($(this).val());
            }
        }
    });

    document.getElementById('nomeEquipe').value !== "" ? nomeEquipe = document.getElementById('nomeEquipe').value : camposNulos = true;
    document.getElementById('nomeCarro').value !== "" ? nomeCarro = document.getElementById('nomeCarro').value : camposNulos = true;
    document.getElementById('cor').value !== "" ? cor = document.getElementById('cor').value : camposNulos = true;
    document.getElementById('inputGroupFile').value !== "" ? inputGroupFile = document.getElementById('inputGroupFile').value : camposNulos = true;
    document.getElementById('campoDefault').value !== "" ? campoDefault = document.getElementById('campoDefault').value : camposNulos = true;

    if (camposNulos === true) {
        alert("Atenção: existem campos nulos");
    } else {
        // Separando as informações da foto
        inputGroupFile = inputGroupFile.split("\\");
        // Enviando numero de campos adicionanos via JSON utilizando ajax
        var dataJson = {
            'alunoNovoCampo': alunoNovoCampo,
            'nomeEquipe': nomeEquipe,
            'nomeCarro': nomeCarro,
            'cor': cor,
            'inputGroupFile': inputGroupFile.pop(),
            'campoDefault': campoDefault
        };

        /* Encapsulando objeto */
        var dataStringJson = JSON.stringify(dataJson);

        $.ajax({
            url: '../model/CadastroEquipeModel.php',
            data: {
                myDataJson: dataStringJson
            },
            type: 'POST',
            success: function (response) {
                alert(response);
                document.getElementById('nomeEquipe').value = "";
                document.getElementById('nomeCarro').value = "";
                document.getElementById('inputGroupFile').value = "";
                document.getElementById('campoDefault').value = "";
                $("#imendaHTMLaluno").replaceWith(originalState.clone()); // Voltando o estado original da div com id imendaHTMLaluno
            }
        });
    }

    novosCampos = [];
}

