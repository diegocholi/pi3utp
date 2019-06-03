<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        //Includes
        include_once 'required/includes.php';
        include_once 'required/Menu.php';
        include_once 'required/Rodape.php';
        include_once 'model/LoginModel.php';
        include_once 'mensagens/mensage.php';

        //lógica de Login
        if (isset($_POST['usuario']))
        {
            $login = new LoginModel($_POST['usuario'], $_POST['password']);
            $statusLogin = $login->getStatusLogin();

            if ($statusLogin == true)
            {
                header('Location: index.php');
            }
            else
            {
                erroLoginMensage();
            }
        }

        //lógica de saída
        if (isset($_GET['sair']))
        {
            mysql_close($this->con);
            session_destroy();
        }
        ?>

        <title>Home</title>
    </head>

    <body class="backgroundLogin">
        <br><br><br>
        <div class = "row table-overflow-responsive">
            <div class="col">
                <!-- div de alinhamento-->
            </div>
            <div class="col-md-6 login containerLogin transbox backgroundOpacy" onmouseover="shine();" onmouseout="turnOff();" id="shine" >
                <h1>Login</h1>
                <form method='post' action='login.php'>
                    <div class="form-group">
                        <label align='center'>Seu  Usuário</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Usuário" name='usuario' required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sua  Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='password' required>
                    </div>
                    <br>
                    <div align="right">
                        <button type="submit" class="btn btn-primary" align="right"  name='subimit'>Entrar</button>
                    </div>
                </form>
                <br>
            </div>
            <div class="col">
                <!-- div de alinhamento-->
            </div>
        </div>


    </body>

</html>

