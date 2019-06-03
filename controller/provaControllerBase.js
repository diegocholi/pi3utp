/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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

        $('.allEquipesProvaTracao').html(html);
        $('.allEquipesProvaVelocidade').html(html);
        $('.allEquipesProvaPista').html(html);
        $('.allEquipesProvaRampa').html(html);

        $('.buttonProvaRampa').unbind().bind('click', function () {
            var valuesForm = {
                idEquipe: $('.allEquipesProvaRampa').val(),
                distancia: $('.distanciaProvaRampa').val()
            };

            var valuesFormJson = JSON.stringify(valuesForm);

            $.ajax({
                url: '../model/CrudProvarampa.php',
                cache: false,
                type: 'POST',
                data: {
                    provaRampa: valuesFormJson
                },
                success: function (response) {
                    alert(response);
                    $('.distanciaProvaRampa').val('');
                    $('.allEquipesProvaRampa').val('');
                }
            });
        });

        $('.buttonProvaTracao').unbind().bind('click', function () {
            var valuesForm = {
                idEquipe: $('.allEquipesProvaTracao').val(),
                peso: $('.pesoProvaTracao').val()
            };

            var valuesFormJson = JSON.stringify(valuesForm);

            $.ajax({
                url: '../model/CrudProvaTracao.php',
                cache: false,
                type: 'POST',
                data: {
                    provaTracao: valuesFormJson
                },
                success: function (response) {
                    alert(response);
                    $('.pesoProvaTracao').val('');
                    $('.allEquipesProvaTracao').val('');
                }
            });
        });

        $('.buttonProvaVelocidade').unbind().bind('click', function () {
            // alert($('.allEquipesProvaVelocidade').val()); // o valor que procuras é: e.target.value
            var velMS = $('.distanciaProvaVelocidade').val() / $('.tempoProvaVelocidade').val();
            var velKH = velMS * 3.6;
//            alert('Velocidade(m/s): ' + velMS); // o valor que procuras é: e.target.value
//            alert('Velocidade(k/h): ' + velKH); // o valor que procuras é: e.target.value

            var valuesForm = {
                idEquipe: $('.allEquipesProvaVelocidade').val(),
                velMS: velMS,
                velKH: velKH
            };

            var valuesFormJson = JSON.stringify(valuesForm);

            $.ajax({
                url: '../model/CrudProvaVelocidade.php',
                cache: false,
                type: 'POST',
                data: {
                    provaTracao: valuesFormJson
                },
                success: function (response) {
                    alert(response);
//                    $('.pesoProvaTracao').val('');
//                    $('.allEquipesProvaTracao').val('');
                }
            });

        });

        $('.buttonProvaPista').unbind().bind('click', function () {
            alert($('.allEquipesProvaPista').val()); // o valor que procuras é: e.target.value

        });
    }
});