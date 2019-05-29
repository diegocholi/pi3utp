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
                $('.divMsg').html('Carregando ..');
            },
            success: function (response) {
                // alert(response);
                $('.divMsg').html(''); // Resetando Mensagens
                $html = '';
                try {
                    response = JSON.parse(response); //Convertendo dados para Json
                    for (i = 0; i < response.length; i++) {
                        $html += '<tr>';
                        $html += '<td>';
                        $html += response[i].idEquipe;
                        $html += '</td>';
                        $html += '<td>';
                        $html += response[i].nomeEquipe;
                        $html += '</td>';
                        $html += '<td>';
                        $html += '<a href="#" class="btn btn-info" onclick="detalheEquipe(' + response[i].idEquipe + ');">';
                        $html += 'Detalhes';
                        $html += '</a>';
                        $html += '</td>';
                        $html += '<td>';
                        $html += '<a href="#" class="btn" onclick="editaEquipe(' + response[i].idEquipe + ');">';
                        $html += '✏️';
                        $html += '</a>';
                        $html += '</td>';
                        $html += '<td>';
                        $html += '<a href="#" class="btn" onclick="deleteEquipe(' + response[i].idEquipe + ');">';
                        $html += '❌';
                        $html += '</a>';
                        $html += ' </button>';
                        $html += '</td>';
                        $html += '</tr>';
                    }
                    $("#tableAluno").append($html);
                } catch (e) {
                    alert('Não existem dados cadastrados !');
                }

            }
        });
    }
    return false;
}
function deleteEquipe(value) {
    alert(value);
}

function editaEquipe(value) {
    alert(value);
}

function detalheEquipe(value) {
    alert(value);
}