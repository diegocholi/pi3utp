<!DOCTYPE html>
<html>
    <head>
        <title>PI lll</title>
        <?php
        include_once 'required/Rodape.php';
        include_once 'required/includesRelatorio.php';
        ?>
    </head>
    <body>

        <div class = "row">
            <div class = "col-md-1 text-light colorLeft" align='center' >
                <!--Alinhado a esquerda-->
            </div>
            <!--Alinhado ao centro-->
            <div class = "col-md-10 colorCenter table-overflow-responsive" >
                <div class="msgIndex"></div>
                <h1 align='center' class="text-darkt">Ranking</h1>

                <table class="table table-info" aligin="center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Equipe</th>
                            <th>Nota Final</th>
                            <th>Posição</th>
                        </tr>
                    </thead>
                    <tbody class="ranking">
                        
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <h4 align='center' class="text-darkt">Prova Rampa</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 align='center' class="text-darkt">Prova Tração</h4>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-info col-md-6" aligin="center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Equipe</th>
                                <th>Distância percorrida</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody class="relatorioRampa">

                        </tbody>
                    </table>

                    <table class="table table-info col-md-6" aligin="center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Equipe</th>
                                <th>Posição</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody class="relatorioTracao">

                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h4 align='center' class="text-darkt">Prova Velocidade</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 align='center' class="text-darkt">Prova Pista & Manobrabilidade</h4>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-info col-md-6" aligin="center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Equipe</th>
                                <th>M/S</th>
                                <th>KM/H</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody class="relatorioProvaVelocidade">

                        </tbody>
                    </table>

                    <table class="table table-info col-md-6" aligin="center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Equipe</th>
                                <th>Passou Cone</th>
                                <th>Bateu</th>
                                <th>Saiu da Pista</th>
                                <th>Tempo líquido</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody class="relatorioProvaPista">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class = "col-md-1 colorRight">
                <!--Alinhado a direita-->

            </div>
        </div>
    </body>
    <?php
    $rodape = new Rodape();
    ?>
</html>
