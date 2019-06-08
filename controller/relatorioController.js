/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$.ajax({
    url: 'model/relatorioModel.php',
    data: 'getProvaRampa',
    cache: false,
    type: 'POST',
    success: function (response) {
        // Resetando Ranking
        $.ajax({
            url: 'model/relatorioModel.php',
            data: 'resetRelatorio',
            cache: false,
            type: 'POST',
            success: function () {
            }
        });
        
        response = JSON.parse(response);
        var equipeNota = response.length;

        for (var i = 0; i < response.length; i++) {
            var html = '<tr>';
            html += '<td>';
            html += response[i].nomeEquipe;
            html += '</td>'
            html += '<td>';
            html += response[i].distancia;
            html += '</td>';
            html += '<td>';
            html += equipeNota;
            html += '</td>';
            html += '</tr>';
            html += '</tr>';
            $('.relatorioRampa').append(html);

            var ranking = {
                idEquipe: response[i].idEquipe,
                nota: equipeNota
            };

            var rankingJson = JSON.stringify(ranking);

            $.ajax({
                url: 'model/relatorioModel.php',
                data: {
                    setRankingEquipe: rankingJson
                },
                cache: false,
                type: 'POST',
                success: function () {
                }
            });
            equipeNota--;
        }
    }
});



$.ajax({
    url: 'model/relatorioModel.php',
    data: 'getProvaTracao',
    cache: false,
    type: 'POST',
    success: function (response) {
        response = JSON.parse(response);
        var notaEquipe = response.length;
        for (var i = 0; i < response.length; i++) {
            var html = '<tr>';
            html += '<td>';
            html += response[i].nomeEquipe;
            html += '</td>';
            html += '<td>';
            html += response[i].peso;
            html += '</td>';
            html += '<td>';
            html += notaEquipe;
            html += '</td>';
            html += '</tr>';
            html += '</tr>';
            $('.relatorioTracao').append(html);

            var ranking = {
                idEquipe: response[i].idEquipe,
                nota: notaEquipe
            };

            var rankingJson = JSON.stringify(ranking);

            $.ajax({
                url: 'model/relatorioModel.php',
                data: {
                    setRankingEquipe: rankingJson
                },
                cache: false,
                type: 'POST',
                success: function () {
                }
            });
            notaEquipe--;
        }

    }
});

$.ajax({
    url: 'model/relatorioModel.php',
    data: 'getProvaVelocidade',
    cache: false,
    type: 'POST',
    success: function (response) {
        response = JSON.parse(response);
        var notaEquipe = response.length;
        for (var i = 0; i < response.length; i++) {
            var html = '<tr>';
            html += '<td>';
            html += response[i].nomeEquipe;
            html += '</td>'
            html += '<td>';
            html += response[i].KMH;
            html += '</td>';
            html += '<td>';
            html += response[i].MS;
            html += '</td>';
            html += '<td>';
            html += notaEquipe;
            html += '</td>';
            html += '</tr>';
            html += '</tr>';
            $('.relatorioProvaVelocidade').append(html);

            var ranking = {
                idEquipe: response[i].idEquipe,
                nota: notaEquipe
            };

            var rankingJson = JSON.stringify(ranking);

            $.ajax({
                url: 'model/relatorioModel.php',
                data: {
                    setRankingEquipe: rankingJson
                },
                cache: false,
                type: 'POST',
                success: function () {
                }
            });
            notaEquipe--;
        }

    }
});

$.ajax({
    url: 'model/relatorioModel.php',
    data: 'getProvaPistaManobrabilidade',
    cache: false,
    type: 'POST',
    success: function (response) {
        response = JSON.parse(response);
        var notaEquipe = response.length;
        for (var i = 0; i < response.length; i++) {
            var html = '<tr>';
            html += '<td>';
            html += response[i].nomeEquipe;
            html += '</td>'
            html += '<td>';
            html += response[i].furarCone;
            html += '</td>';
            html += '<td>';
            html += response[i].bater;
            html += '</td>';
            html += '<td>';
            html += response[i].sairPista;
            html += '</td>';
            html += '<td>';
            html += response[i].tempoLiquido;
            html += '</td>';
            html += '<td>';
            html += notaEquipe;
            html += '</td>';
            html += '</tr>';
            html += '</tr>';
            $('.relatorioProvaPista').append(html);
            var ranking = {
                idEquipe: response[i].idEquipe,
                nota: notaEquipe
            };

            var rankingJson = JSON.stringify(ranking);

            $.ajax({
                url: 'model/relatorioModel.php',
                data: {
                    setRankingEquipe: rankingJson
                },
                cache: false,
                type: 'POST',
                success: function () {
                }
            });
            notaEquipe--;

        }

    }
});

$.ajax({
    url: 'model/relatorioModel.php',
    data: 'getRanking',
    cache: false,
    type: 'POST',
    success: function (response) {
        response = JSON.parse(response);

        for (var i = 0; i < response.length; i++) {
            var html = '<tr>';
            html += '<td>';
            html += response[i].nomeEquipe;
            html += '</td>'
            html += '<td>';
            html += response[i].notaEquipe;
            html += '</td>';
            html += '<td>';
            html += i + 1 + '° lugar';
            html += '</td>';
            html += '</tr>';
            html += '</tr>';
            $('.ranking').append(html);
        }
    }
});