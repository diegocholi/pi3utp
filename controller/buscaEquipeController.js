/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var imported = document.createElement('script');
imported.src = '../controller/ControllerBase.js';
document.head.appendChild(imported);

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
        $("#tableAluno").html('');
    });

    $('.confirmEditarEquipe').click(function () {
        if ($('.editEquipeField').val()) {


            // alert($('.editEquipeField').val());

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
            $("#tableAluno").html('');
        } else {
            alert('Campo não informado !');
        }
    });
}

function detalheEquipe(value) {
    // $('.buscaEquipe').css('display', 'none');
    $.ajax({
        url: '../model/AlunoEquipeModel.php',
        data: {
            idDetalheEquipe: value
        },
        cash: false,
        type: 'POST',
        success: function (response) {
            $('#tableAluno').html('');
            $('.buscaEquipe').css('display', 'none');
            $('.divMsgBuscaEquipe').html(''); // Resetando Mensagens
            var html = '';
            try {
                response = JSON.parse(response); //Convertendo dados para Json
                var html = '';
                html += '<br>';

                html += '<h1>';
                html += 'Detalhes Equipe';
                html += '</h1>';

                html += '<label class="col-2">';
                html += '<h4> Alunos </h4>';
                html += '</label>';

                for (i = 0; i < response.length; i++) {
                    html += '<div class="row">';
                    html += '<label class="col-2">';
                    html += ' ';
                    html += '</label>';
                    html += '<input type="text" value=" ' + response[i].nomeAluno + ' " class="form-control text-center col-8">';
                    html += '</div>';
                }
                html += '<br>';

                html += '<button type="submit" class="btn btn-primary" > ';
                html += 'salvar';
                html += '</button>';

                $('.msgIndex').html(html);

            } catch (e) {
                alert('Não existem dados cadastrados !');
            }
        }
    });

    $('.divMsgBuscaEquipe').html('detalhe Equipe: ' + value);
}