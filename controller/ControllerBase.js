/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var buscaEquipeOriginalState;
var cadastroEquipeOriginalState;
function saveStateDiv(divId, varName) {
    switch (varName) {
        case 'buscaEquipeOriginalState':
            buscaEquipeOriginalState = $(divId).clone();
            break;
        case 'cadastroEquipeOriginalState':
            cadastroEquipeOriginalState = $(divId).clone();
            break;
        default:
            break;
    }
}

function getStateDiv(divId, varName) {
    switch (varName) {
        case 'buscaEquipeOriginalState':
            $(divId).replaceWith(buscaEquipeOriginalState.clone()); // Voltando o estado original da div com id buscaEquipe
            break;
        case 'cadastroEquipeOriginalState':
            $(divId).replaceWith(cadastroEquipeOriginalState.clone()); // Voltando o estado original da div com id buscaEquipe
            break;
        default:
            break;
    }
}

function navigate(navigate) {
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
            if (!buscaEquipeOriginalState) {
                saveStateDiv('#tableAluno', 'buscaEquipeOriginalState');
                $(".buscaEquipe").css("display", "block");
            } else {
                getStateDiv('#tableAluno', 'buscaEquipeOriginalState');
                $(".buscaEquipe").css("display", "block");
            }
            break;
        case "configuracaoProvas":
            $(".configuracaoProvas").css("display", "block");
            break;
        case "cadastroEquipe":
            saveStateDiv('#imendaHTMLaluno', 'cadastroEquipeOriginalState');
            $(".cadastroEquipes").css("display", "block");
            break;
        default:
            break;
    }

}



