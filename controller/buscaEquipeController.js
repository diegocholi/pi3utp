/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var imported = document.createElement('script');
imported.src = '../controller/ControllerBase.js';
document.head.appendChild(imported);
var statusTableAluno;

function getEquipe()
{
    $('#tableAluno').html('');
    $('.deletarEquipetd').html('Deletar');
    $('.editarEquipetd').html('Editar');
    $('.detalhesEquipetd').html('Membros Detalhes');
    int: maxColumn = 5; // Numero máximo de colunas 
    if (document.getElementById('buscaEquipe').value !== '') {
        $.ajax({
            url: '../model/CrudEquipeModel.php',
            data: {
                buscaEquipe: document.getElementById('buscaEquipe').value
            },
            cash: false,
            type: 'POST',
            beforeSend: function () {
                $('.divMsgBuscaEquipe').html('Carregando ...');
            },
            success: function (response) {
                // alert(response);
                $('.divMsgBuscaEquipe').html(''); // Resetando Mensagens
                var html = '';
                try {
                    response = JSON.parse(response); //Convertendo dados para Json
                    for (i = 0; i < response.length; i++) {
                        html += '<tr>';
                        html += '<td>';
                        html += response[i].idEquipe;
                        html += '</td>';
                        html += '<td>';
                        html += response[i].nomeEquipe;
                        html += '</td>';
                        html += '<td>';
                        html += '<a href="#" class="btn btn-info" onclick="detalheEquipe(' + response[i].idEquipe + ');">';
                        html += 'Detalhes';
                        html += '</a>';
                        html += '</td>';
                        html += '<td>';
                        html += '<button value=' + response[i].nomeEquipe + ' class="btn nameEquipe ' + response[i].idEquipe + ' " onclick="editaEquipe(' + response[i].idEquipe + ');">';
                        html += '✏️';
                        html += '</button>';
                        html += '</td>';
                        html += '<td>';
                        html += '<a href="#" class="btn" onclick="deleteEquipe(' + response[i].idEquipe + ');">';
                        html += '❌';
                        html += '</a>';
                        html += ' </button>';
                        html += '</td>';
                        html += '</tr>';
                    }
                    $("#tableAluno").append(html);
                } catch (e) {
                    alert('Não existem dados cadastrados !');
                }

            }
        });
    }
    return false;
}
function deleteEquipe(value) {
    // $('.buscaEquipe').css('display', 'none');
    var html = '';
    html += '<form>';
    html += '<label>';
    html += 'Deseja realmente deletar a equipe de ID: ' + value;
    html += '</label>';
    html += '<br>';
    html += '<input type="button" class="btn btn-danger cancelaDelete" value = "cancela"/>';
    html += '&nbsp;';
    html += '<input type="button" class="btn btn-success confirmDelete" value = "confirma"/>';
    html += '</form>';
    $('.divMsgBuscaEquipe').html(html);
    $('.cancelaDelete').click(function () {
        $('.divMsgBuscaEquipe').html('');
    });
    $('.confirmDelete').click(function () {
        $.ajax({
            url: '../model/CrudEquipeModel.php',
            data: {
                idEquipeDelete: value
            },
            cash: false,
            type: 'POST',
            success: function () {
                $('#tableAluno').html('');
                $('.divMsgBuscaEquipe').html(' <label>Equipe deletada com sucesso ! </label>');
                setTimeout(function () {
                    $('.divMsgBuscaEquipe').html('');
                }, 2000);
            }
        });
        $('.divMsgBuscaEquipe').html('');
    });
}

function editaEquipe(idEquipe) {
    statusTableAluno = $("#tableAluno").clone();
    $("#tableAluno").html('');
    $('.deletarEquipetd').html('');
    $('.editarEquipetd').html('');
    $('.detalhesEquipetd').html('');
    var html = '';
    html += '<tr>';
    html += '<td>';
    html += idEquipe;
    html += '</td>';
    html += '<td>';
    html += '<input type="text" placeholder="Digite o novo nome da equipe" class="form-control text-center editEquipeField" align = "center">';
    html += '</td>';
    html += '<td>';
    html += 'Edição da equipe: ' + idEquipe;
    html += '</td>';
    html += '<td>';
    html += '<a href="#" class="btn btn-danger cancelaEdicao">';
    html += 'cancelar';
    html += '</a>';
    html += '</td>';
    html += '<td>';
    html += '<a href="#" class="btn btn-success confirmEditarEquipe">';
    html += 'confirma';
    html += '</a>';
    html += '</td>';
    html += '</tr>';
    $("#tableAluno").append(html);

    $('.cancelaEdicao').click(function () {
        $('.deletarEquipetd').html('Deletar');
        $('.editarEquipetd').html('Editar');
        $('.detalhesEquipetd').html('Membros Detalhes');
        $("#tableAluno").replaceWith(statusTableAluno.clone());
    });

    $('.confirmEditarEquipe').click(function () {
        if ($('.editEquipeField').val()) {

            var newEquipeName = {
                idEquipe: idEquipe,
                editEquipeField: $('.editEquipeField').val()
            };
            var newEquipeNameJson = JSON.stringify(newEquipeName);
            $.ajax({
                url: '../model/CrudEquipeModel.php',
                data: {
                    editEquipe: newEquipeNameJson
                },
                cash: false,
                type: 'POST',
                success: function () {
                    alert("Nome da equipe Atualizado com sucesso !");
                }
            });

            $('.editarEquipetd').html('Editar');
            $('.deletarEquipetd').html('Deletar');
            $('.detalhesEquipetd').html('Membros Detalhes');

            var html = '';
            html += '<tr>';
            html += '<td>';
            html += idEquipe;
            html += '</td>';
            html += '<td>';
            html += $('.editEquipeField').val();
            html += '</td>';
            html += '<td>';
            html += '<a href="#" class="btn btn-info" onclick="detalheEquipe(' + idEquipe + ');">';
            html += 'Detalhes';
            html += '</a>';
            html += '</td>';
            html += '<td>';
            html += '<button value=' + $('.editEquipeField').val() + ' class="btn nameEquipe ' + idEquipe + ' " onclick="editaEquipe(' + idEquipe + ');">';
            html += '✏️';
            html += '</button>';
            html += '</td>';
            html += '<td>';
            html += '<a href="#" class="btn" onclick="deleteEquipe(' + idEquipe + ');">';
            html += '❌';
            html += '</a>';
            html += ' </button>';
            html += '</td>';
            html += '</tr>';
            $("#tableAluno").html(html);

        } else {
            alert('Campo não informado !');
        }
    });
}

function detalheEquipe(value) {
    $.ajax({
        url: '../model/CrudAlunoEquipeModel.php',
        data: {
            idDetalheEquipe: value
        },
        cash: false,
        type: 'POST',
        success: function (response) {
            $('.buscaEquipe').css('display', 'none');
            $('.divMsgBuscaEquipe').html(''); // Resetando Mensagens
            var html = '';
            try {
                response = JSON.parse(response); //Convertendo dados para Json
                var html = '';
                html += '<br>';

                html += '<button class="btn btn-dark text-light voltarBuscaEquipe" title="Voltar">';
                html += '<img src="../fotoSistema/voltar.png" width="20" height="20"> ';
                html += '<strong>';
                html += 'voltar';
                html += '</strong>';
                html += '</button>';

                html += '<h1>';
                html += 'Detalhes Equipe';
                html += '</h1>';

                html += '<div class="row">';

                html += '<div class="col align-self-start">'; //Label de alinhamento
                html += ' ';
                html += '</div>';

                html += '<div class="col align-self-center table-warning">';

                html += '<label>';
                html += '<h4> Alunos </h4>';
                html += '</label>';

                for (i = 0; i < response.length; i++) {
                    html += '<div class="row">';

                    html += '<label class="col-2">';//Label de alinhamento
                    html += ' ';
                    html += '</label>';

                    html += '<input type="text" value=" ' + response[i].nomeAluno + ' " class="form-control text-center col-8">';
                    html += '</div>';
                }
                html += '<br>';

                html += '<button type="submit" class="btn btn-success salvarEditarAlunosEquipe" algin="left"> ';
                html += 'salvar';
                html += '</button>';

                html += '&nbsp;';

                html += '<br>';

                html += '</div>';

                html += '<div class="col align-self-end> ';
                html += ' ';
                html += '</div>" ';

                html += '</div>';

                $('.msgIndex').html(html);
            } catch (e) {
                alert('Não existem dados cadastrados !');
            }

            $('.salvarEditarAlunosEquipe').click(function () {
                JSON.stringify(response);
                $.ajax({
                    url: '../model/CrudAlunoEquipeModel.php',
                    data: {
                        editAlunosEquipe: response
                    },
                    cash: false,
                    type: 'POST',
                    success: function (response) {
                        alert(response);
                    }
                });
            });

            $('.voltarBuscaEquipe').click(function () {
                $('.msgIndex').html('');
                $('.buscaEquipe').css('display', 'block');
            });

        }
    });

}