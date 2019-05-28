/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".deleteEquipe").click(function () {
    alert("Teste Delete Cliente");
});

function getAluno(idTable)
{
    int: maxColumn = 5; // Numero de colunas 
    // Criando Linhas
    for (var j = 0; j < 15; j++) {
        var newRow = document.createElement("tr"); // Criador de linhas
        for (var i = 0; i < maxColumn; i++) {
            // é no td que chamamos o evento onclick EX: cell.onclick = function () { alert('Edit ID: ' + j); }
            var cell = document.createElement("td");  // Criando colunas
            var cellText; // Variavel que leva o valor da linha 
            //
            //Switch que define em qual coluna será exibida a informação
            switch (i) {
                case 0: // Coluna ID
                    cellText = document.createTextNode(j);
                    break;
                case 3: // Coluna Edição
                    cell.onclick = function () {
                        alert('Edit ID: ' + j);
                    }
                    cellText = document.createTextNode("✏️");
                    break;
                case 4: // Coluna Delete
                    cell.onclick = function () {
                        alert('Delete ID: ' + j);
                    };
                    cellText = document.createTextNode("❌");
                    break;
                default:
                    cellText = document.createTextNode("Test Escrever Coluna " + i);
                    break;
            }
            cell.style.cursor = 'pointer'; // Definindo o stilo do ponteiro do mouse
            cell.appendChild(cellText);
            newRow.appendChild(cell);
        }
    }
    // add the row to the end of the table body
    document.getElementById(idTable).appendChild(newRow);
    return false;
}
