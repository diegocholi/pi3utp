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
    int: maxColumn = 5; // Numero máximo de colunas 
    setStateDiv('#tableAluno'); //resetando status da div com id tableAluno
    if (document.getElementById('buscaEquipe').value !== '') {
        $.ajax({
            url: '../model/BuscaEquipeModel.php',
            data: {
                buscaEquipe: document.getElementById('buscaEquipe').value
            },
            type: 'POST',
            success: function (response) {
                alert(response);
            }
        });
    }

    var array = {
        '0': '1',
        '1': '2',
        '2': '3',
        '3': '4',
        '4': '5',
        '5': '6',
        '6': '7'
    };
    var len = Object.getOwnPropertyNames(array).length; //Definindo número de linhas do obj JSON
    for (i = 0; i < len; i++) {
        $("#tableAluno").append(" <tr>\n\
                                            <td>  " + array[i] + " </td> \n\
                                            <td>" + "Equipe: " + array[i] + "</td> \n\
                                            <td> Membro 1 , Membros 2, Membros 3 </td> \n\
                                            <td>  <a href='#' onclick='editaEquipe();'> ✏️ <a></td>\n\
                                            <td> \n\
                                                <button href='#' id='deleteEquipe" + array[i] + "' value=" + array[i] + "> \n\
                                                        ❌ \n\
                                            </td>\n\
                                        </tr> ");
    }

    //Chamando a função de leitura de campos para delete
    deleteEquipe(array);

    return false;
}

function deleteEquipe(array) {
    var len = Object.getOwnPropertyNames(array).length;
    for (i = 0; i < len; i++) {// inicializando  Todos os IDs que foi gerado na busca para possível delete
        var idEquipe = '#deleteEquipe' + array[i];
        $(idEquipe).click(function () {
            idEquipe = $(this).val();
            alert(idEquipe);
        });
    }
}

function editaEquipe() {
    alert('Test Edita equipe');
}
