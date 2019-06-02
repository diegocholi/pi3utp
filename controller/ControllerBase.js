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
            getAllEquipes();
            $(".provaVelocidade").css("display", "block");
            break;
        case "provaPista":
            getAllEquipes();
            $(".provaPista").css("display", "block");
            break;
        case "provaTracao":
            getAllEquipes();
            $(".provaTracao").css("display", "block");
            break;
        case "provaRampa":
            getAllEquipes("provaRampa");
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

function getAllEquipes() {
    $.ajax({
        url: '../model/CrudEquipeModel.php',
        data: {
            getAllEquipes: 'getAllEquipes'
        },
        cache: false,
        type: 'POST',
        success: function (response) {
            //alert(response);
            response = JSON.parse(response);
            var html = '';
            for (i = 0; i < response.length; i++) {
                html += '<option value=' + response[i].idEquipe + '>';
                html += response[i].nomeEquipe;
                html += '</option>';
            }

            $('.allEquipesProvaRampa').html(html);
            $('.allEquipesProvaTracao').html(html);
            $('.allEquipesProvaVelocidade').html(html);
            $('.allEquipesProvaPista').html(html);

            $('.buttonProvaRampa').unbind().bind('click', function () {
                alert($('.allEquipesProvaRampa').val()); // o valor que procuras é: e.target.value
            });

            $('.buttonProvaTracao').unbind().bind('click', function () {
                alert($('.allEquipesProvaTracao').val()); // o valor que procuras é: e.target.value
            });

            $('.buttonProvaVelocidade').unbind().bind('click', function () {
                alert($('.allEquipesProvaVelocidade').val()); // o valor que procuras é: e.target.value
            });

            $('.buttonProvaPista').unbind().bind('click', function () {
                alert($('.allEquipesProvaPista').val()); // o valor que procuras é: e.target.value
            });
        }
    });
}

