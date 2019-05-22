/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var idContador = 0;
function exclui(id) {
    var campo = $("#" + id.id);
    campo.hide(200);
}
$(document).ready(function () {
    $("#btnAdicionaAluno").click(function (e) {
        e.preventDefault();
        var tipoCampo = "aluno";
        adicionaCampo(tipoCampo);
    });

    function adicionaCampo(tipo) {
        idContador++;
        var idCampo = "campoExtra" + idContador;
        var idForm = "formExtra" + idContador;
        var html = "";
        html += "<div style='margin-top: 8px;' class='input-group' id='" + idForm + "'>";
        html += "<input type='text' id='" + idCampo + "' class='form-control novoCampo' placeholder='Insira o nome do " + tipo + "'/>";
        html += "<span class='input-group-btn'>";
        html += "<button class='btn' onclick='exclui(" + idForm + ")' type='button'><span class='fa fa-trash'>❌</span></button>";
        html += "</span>";
        html += "</div>";

        $("#imendaHTML" + tipo).append(html);
    }

    $(".btnExcluir").click(function () {
        console.log("clicou");
        $(this).slideUp(200);
    });

    $("#btnSalvar").click(function () {

        var mensagem = "";
        var novosCampos = [];
        var camposNulos = false;

        $('.campoDefault').each(function () {
            if ($(this).val().length < 1) {
                camposNulos = true;
            }
        });
        $('.novoCampo').each(function () {
            if ($(this).is(":visible")) {
                if ($(this).val().length < 1) {
                    camposNulos = true;
                }
                //novosCampos.push($(this).val());
                mensagem += $(this).val() + "\n";
            }
        });

        if (camposNulos === true) {
            alert("Atenção: existem campos nulos");
        } else {
            alert("Novos campos adicionados: \n\n " + mensagem);
        }

        novosCampos = [];
    });

});