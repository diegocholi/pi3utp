/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".ClickProvaVelocidade").click(function () {
    $(".provaVelocidade").css("display", "block");

    if ($(".cadastroEquipes").css("display", "block")
            && $(".configuracaoProvas").css("display", "block")
            && $(".provaRampa").css("display", "block")
            && $(".provaTracao").css("display", "block")
            && $(".provaPista").css("display", "block")
            && $(".buscaEquipe").css("display", "block")
            ) {
        $(".buscaEquipe").css("display", "none");
        $(".cadastroEquipes").css("display", "none");
        $(".configuracaoProvas").css("display", "none");
        $(".provaRampa").css("display", "none");
        $(".provaTracao").css("display", "none");
        $(".provaPista").css("display", "none");
    }
});

