/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".CliqueBuscaEquipes").click(function () {
    $(".buscaEquipe").css("display", "block");

    if ($(".cadastroEquipes").css("display", "block")
            && $(".configuracaoProvas").css("display", "block")
            && $(".provaRampa").css("display", "block")
            && $(".provaTracao").css("display", "block")
            && $(".provaVelocidade").css("display", "block")
            && $(".provaPista").css("display", "block")
            ) {
        $(".cadastroEquipes").css("display", "none");
        $(".provaVelocidade").css("display", "none");
        $(".configuracaoProvas").css("display", "none");
        $(".provaRampa").css("display", "none");
        $(".provaTracao").css("display", "none");
        $(".provaPista").css("display", "none");
    }
});

$(".deleteEquipe").click(function(){
   alert("Teste Delete Cliente"); 
});

function buscaEquipe (){
    var buscaEquipe = document.getElementById("buscaCliente");
    
    if(buscaEquipe.value != ""){
        alert("Busca: " + buscaEquipe.value);
    }
}