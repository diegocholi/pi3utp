<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        //Includes
        include_once 'required/includes.php';
        include_once 'required/Menu.php';
        include_once 'required/Rodape.php';



        if (isset($_GET['sair'])) {
            session_destroy();
        }
        ?>

    <title>Home</title>
    </head>
    <body>
        <div class = "row bg-dark">
            <div class = "col-md-8 col-md-offset-3 table-overflow-responsive bg-secondary text-light">
                <!--Alinhado a esquerda-->      
                <p align="center">Anúncios</p>
            </div>

            <div class = "col-md-4 col-md-offset-3 bg-light table-overflow-responsive">
                <!--Alinhado ao direita-->
                <br>
                <form method='post' action='index.php'>
                    <div class="form-group">
                        <label for="exampleInputEmail1" align='center'>Usuário</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Usuário" name='usuario' required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Lembrar
                        </label>
                    </div>
                    <button type="submit" class="btn btn-dark" name='subimit'>Entrar</button>
                </form>
            </div>
        </div>
        <?php
        $rodape = new Rodape();
        ?>
    </body>
</html>
