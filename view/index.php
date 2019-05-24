<!DOCTYPE html>
<html>
    <head>

        <?php
        session_start();
        //Includes
        include_once 'required/includes.php';
        include_once 'required/Menu.php';
        include_once 'required/Rodape.php';

        if (isset($_POST['usuario']))
        {
            $_SESSION['usuario'] = $_POST['usuario'];
        }
        ?>
        <title>PI lll</title>
    </head>
    <body>


        <?php
        if (isset($_SESSION['usuario']))
        {
            $menu = new Menu();
            $menu->MenuPrincipal();
            ?>
            <div class = "row">
                <div class = "col-md-2 text-light colorLeft" align='center' >
                    <!--Alinhado a esquerda-->
                    <br>
                    <?php
                    $menu->MenuLateral();
                    ?>
                    <br>
                </div>
                <!--Alinhado ao centro-->
                <div class = "col-md-8 colorCenter table-overflow-responsive" >
                    <?php
                    include_once 'confProvas.php';
                    include_once 'cadastroEquipes.php';
                    include_once 'provaRampa.php';
                    include_once 'provaTracao.php';
                    include_once 'provaVelocidade.php';
                    include_once 'provaPista.php';
                    include_once 'buscaEquipe.php';
                    ?>
                </div>
                <div class = "col-md-2 colorRight" align="center">
                    <!--Alinhado a direita-->
                    <br>
                    <h5 align='center' class="text-light">Ranking</h5>
                    <table class="table table-info">
                        <thead class="thead-dark">
                            <tr>
                                <th>Equipe</th>
                                <th>Posição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Equipe 1</td>
                                <td>1° Lugar</td>
                            </tr>
                            <tr>
                                <td>Equipe 2</td>
                                <td>2° Lugar</td>
                            </tr>
                            <tr>
                                <td>Equipe 3</td>
                                <td>3° Lugar</td>
                            </tr>
                            <tr>
                                <td>Equipe 4</td>
                                <td>4° Lugar</td>
                            </tr>
                            <tr>
                                <td>Equipe 5</td>
                                <td>5° Lugar</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
            <?php
        }
        else
        {
            header('Location: ../login.php');
        }
        $rodape = new Rodape();
        ?>

    </body>
</html>
