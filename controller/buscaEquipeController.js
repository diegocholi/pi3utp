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
    statusTableAluno = $("#tableAluno").clone();
    $("#tableAluno").html('');
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
    $('.cancelaDelete').unbind().bind('click', function () {
        $('.divMsgBuscaEquipe').html('');
        $("#tableAluno").replaceWith(statusTableAluno.clone());
    });
    $('.confirmDelete').unbind().bind('click', function () {
        $.ajax({
            url: '../model/CrudEquipeModel.php',
            data: {
                idEquipeDelete: value
            },
            cash: false,
            type: 'POST',
            success: function () {
                $('.divMsgBuscaEquipe').html('');
                $("#tableAluno").html('');
                $('.divMsgBuscaEquipe').html(' <label>Equipe deletada com sucesso ! </label>');
                setTimeout(function () {
                    $('.divMsgBuscaEquipe').html('');
                }, 2000);
            }
        });
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
    $('.cancelaEdicao').unbind().bind('click', function () {
        $('.deletarEquipetd').html('Deletar');
        $('.editarEquipetd').html('Editar');
        $('.detalhesEquipetd').html('Membros Detalhes');
        $("#tableAluno").replaceWith(statusTableAluno.clone());
    });
    $('.confirmEditarEquipe').unbind().bind('click', function () {
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
            html += '<button value=' + $('.editEquipeField').val() + ' class="btn nameEquipe " onclick="editaEquipe(' + idEquipe + ');">';
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
            //Label de alinhamento
            html += '<div class="col align-self-start">';
            html += ' ';
            html += '</div>';
            html += '<div class="col-md-8 align-self-center colorEditAlunosEquipe">';
            html += '<label>';
            html += '<h4> Alunos </h4>';
            html += '</label>';
            for (i = 0; i < response.length; i++) {
                html += '<form action="javascript:void(0)" method="POST">';
                html += '<div class="row">';
                //div de alinhamento esquerda
                html += '<div class="col align-self-start">';
                html += '</div>';
                //div de alinhamento centro
                html += '<div class="row col-8 align-self-center border border-info rounded">';
                html += '<label class="col-9 rounded w-25 p-3 text-dark"> ';
                html += response[i].nomeAluno;
                html += '</label>';
                html += '<button type="submit" value=' + response[i].nomeAluno + ' class="btn col-2 text-white editAlunoEquipe"> ';
                html += '✏️';
                html += '</button>';
                html += '</div>';
                //div de alinhamento Direita
                html += '<div class="col align-self-end">';
                html += ' ';
                html += '</div>';
                html += '</div>';
                html += '<form>';
            }

            html += '<br>';
            html += '&nbsp;&nbsp;';
            html += '<button type="button"  class="btn btn-primary">';
            html += 'Adicionar novo aluno';
            html += '</button>';
            html += '<br><br>';
            html += '</div>';
            html += '<div class="col align-self-end> ';
            html += ' ';
            html += '</div>" ';
            html += '</div>';
            $('.msgIndex').html(html);

            $('.editAlunoEquipe').addClass(function () {
                $(this).unbind().bind('click', function () {
                    alert($(this).val());
                });
            });

            $('.voltarBuscaEquipe').unbind().bind('click', function () {
                $('.msgIndex').html('');
                $('.buscaEquipe').css('display', 'block');
            });
            // MODAL Adiciona novo aluno na equipe
            $('.adicionaAlunoEquipeModal').unbind().bind('click', function () {

                $('#exampleModalCenter').modal('show');
                $('.modal-title').html('Adicionar Aluno');
                $('.modal-body').html('<input type = "text" class="form-control novoAlunoEquipeEdit" placeholder="Digite o nome do aluno">');
                var modalFooter = '<button type="button" class="btn btn-secondary" data-dismiss="modal">cancela</button>';
                modalFooter += '<button type="button" class="btn btn-primary editaAlunoEquipeEdit">salva</button>';
                $('.modal-footer').html(modalFooter);
                //  Salva novo aluno equipe modo edição equipe
                $('.editaAlunoEquipeEdit').unbind().bind('click', function () {
                    $('#editaAlunoEquipeEdit').modal('hide');
                    var addAlunoEquipeEdit = {
                        'idEquipe': value,
                        'addAlunoEquipeEdit': $('.NovoAlunoEquipeEditl').val()
                    };
                    var dataStringJson = JSON.stringify(addAlunoEquipeEdit);
                    $.ajax({
                        url: '../model/CrudAlunoEquipeModel.php',
                        data: {
                            addAlunoEquipeEdit: dataStringJson
                        },
                        cash: false,
                        type: 'POST',
                        success: function (e) {
                            alert(e);
                        }
                    });
                    $(document).ready(function () {
                        $('.addCampoEditAlunoEquipe').append('<input type="text" value=" ' + $('.NovoAlunoEquipeEditl').val() + ' " class="form-control text-center alunoEditEquipe">');
                        $('.NovoAlunoEquipeEditl').val('');
                    });
                });
            });
        }
    });
}
// MODAL Salva edição aluno equipe
function editarAlunosEquipe(idAluno) {
    $('.modal-title').html('Edita Aluno');

    $('.modal-body').html('<input type = "text" value=\"' + idAluno + '" class="form-control editaAlunoEquipeEdit" placeholder="Digite o nome do aluno">');
    $('#exampleModalCenter').modal('show');
    var modalFooter = '<button type="button" class="btn btn-secondary" data-dismiss="modal">cancela</button>';
    modalFooter += '<button type="button" class="btn btn-primary buttonAlunoEquipeEdit">salva</button>';
    $('.modal-footer').html(modalFooter);

    $('.buttonAlunoEquipeEdit').unbind().bind('click', function () {
        $('#exampleModalCenter').modal('hide');

        var alunoEditEquipeJson = {
            'idAlunoEquipe': $('.idAlunoEditEquipe').val(),
            'equipeEdit': $('.alunoEditEquipe').val()
        };
        var dataStringJson = JSON.stringify(alunoEditEquipeJson);
        $.ajax({
            url: '../model/CrudAlunoEquipeModel.php',
            data: {
                editAlunosEquipe: dataStringJson
            },
            cash: false,
            type: 'POST',
            success: function (response) {
                alert(response);
                alert($('.editarAlunosEquipe').val());
//                            alert('Edição concluída!');
//                            $('.buscaEquipe').css('display', 'block');
//                            $('.msgIndex').html('');
            }
        });
    });



}