/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var idContador = 0;
function exclui(id) {
    var campo = $("#" + id.id);
    var campoExtra = id;
    alert(campoExtra);
    campo.hide(200);
}

$(document).ready(function () {
    $("#btnAdicionaAluno").click(function (e) {
        e.preventDefault();
        var tipoCampo = "aluno";
        adicionaCampo(tipoCampo);
    });

    function adicionaCampo(tipo) {
        if (idContador < 21) {
            var idCampo = "campoExtra" + idContador;
            var idForm = "formExtra" + idContador;
            var html = "";
            html += "<div style='margin-top: 8px;' class='input-group' id='" + idForm + "'>";
            html += "<input type='text' name='" + idCampo + "' id='" + idCampo + "' class='form-control novoCampo' placeholder='Insira o nome do " + tipo + "'/>";
            html += "<span class='input-group-btn'>";
            html += "<button class='btn' onclick='exclui(" + idForm + ")' type='button'><span class='fa fa-trash'>❌</span></button>";
            html += "</span>";
            html += "</div>";
            idContador++;
            $("#imendaHTML" + tipo).append(html);
        } else {
            alert('Suporte somente a 21 membros por equipes!');
        }
    }

    $(".btnExcluir").click(function () {
        console.log("clicou");
        $(this).slideUp(200);
    });
});


function btnSaveEquipes() {

    var parametros = new FormData($('#formulario-envia')[0]);

    $.ajax({
        data: parametros,
        url: "../model/CadastroEquipeModel.php",
        type: "POST",
        contentType: false,
        processData: false,
        beforesend: function () {

        },
        success: function (response) {
            alert(response);
        }
    });


//    
//    var mensagem = "";
//    var novosCampos = [];
//    var camposNulos = false;
//
//    $('.inputGroupFile').each(function () {
//        mensagem += $(this).val() + "\n";
//    });
//
//
//    $('.nomeEquipe').each(function () {
//        if ($(this).val().lenght < 1) {
//            camposNulos = true;
//        }
//        mensagem += $(this).val() + "\n";
//    });
//
//    $('.cor').each(function () {
//        mensagem += $(this).val() + "\n";
//    });
//
//    $('nomeCarro').each(function () {
//        mensagem += $(this).val() + "\n";
//    });
//
//    $('.campoDefault').each(function () {
//        if ($(this).val().length < 1) {
//            camposNulos = true;
//        }
//        mensagem += $(this).val() + "\n";
//    });
//
//    $('.novoCampo').each(function () {
//        if ($(this).is(":visible")) {
//            if ($(this).val().length < 1) {
//                camposNulos = true;
//            }
//            mensagem += $(this).val() + "\n";
//        }
//    });
//
//    if (camposNulos === true) {
//        alert("Atenção: existem campos nulos");
//    } else {
//        alert("Novos campos adicionados: \n " + mensagem);
//    }
//
//novosCampos = [];
}
