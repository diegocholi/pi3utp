/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".ClickProvaTracao").click(function () {
    $(".provaTracao").css("display", "block");


    if ($(".cadastroEquipes").css("display", "block")
            && $(".configuracaoProvas").css("display", "block")
            && $(".provaRampa").css("display", "block")
            && $(".provaVelocidade").css("display", "block")
            && $(".provaPista").css("display", "block")
            && $(".buscaEquipe").css("display", "block")
            ) {
        $(".buscaEquipe").css("display", "none");
        $(".cadastroEquipes").css("display", "none");
        $(".configuracaoProvas").css("display", "none");
        $(".provaRampa").css("display", "none");
        $(".provaVelocidade").css("display", "none");
        $(".provaPista").css("display", "none");
    }
});

