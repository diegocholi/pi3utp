/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function navigate(navigate) {

    $('.msgIndex').html(''); //Resetando Div Index mensagens

    $(".buscaEquipe").css("display", "none");
    $(".cadastroEquipes").css("display", "none");
    $(".configuracaoProvas").css("display", "none");
    $(".provaRampa").css("display", "none");
    $(".provaTracao").css("display", "none");
    $(".provaPista").css("display", "none");
    $(".provaVelocidade").css("display", "none");
    $(".cadastroEquipes").css("display", "none");

    switch (navigate) {
        case  "provaVelocidade":
            $(".provaVelocidade").css("display", "block");
            break;
        case "provaPista":
            $(".provaPista").css("display", "block");
            break;
        case "provaTracao":
            $(".provaTracao").css("display", "block");
            break;
        case "provaRampa":
            $(".provaRampa").css("display", "block");
            break;
        case "buscaEquipes":
            $('#tableAluno').html('');
            $(".buscaEquipe").css("display", "block");
            break;
        case "configuracaoProvas":
            $(".configuracaoProvas").css("display", "block");
            break;
        case "cadastroEquipe":
            $(".cadastroEquipes").css("display", "block");
            break;
        default:
            break;
    }

}



