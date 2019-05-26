/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".deleteEquipe").click(function () {
    alert("Teste Delete Cliente");
});

function buscaEquipe() {
    var buscaEquipe = document.getElementById("buscaCliente");

    if (buscaEquipe.value !== "") {
        alert("Busca: " + buscaEquipe.value);
    }
}