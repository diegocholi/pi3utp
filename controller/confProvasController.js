$(".CliqueConfiguracaoProvas").click(function () {
    $(".configuracaoProvas").css("display", "block");

    if ($(".cadastroEquipes").css("display", "block")
            && $(".provaRampa").css("display", "block")
            && $(".provaTracao").css("display", "block")
            && $(".provaVelocidade").css("display", "block")
            && $(".provaPista").css("display", "block")
            && $(".buscaEquipe").css("display", "block")
            ) {
        $(".buscaEquipe").css("display", "none");
        $(".cadastroEquipes").css("display", "none");
        $(".provaRampa").css("display", "none");
        $(".provaTracao").css("display", "none");
        $(".provaVelocidade").css("display", "none");
        $(".provaPista").css("display", "none");
    }
});
