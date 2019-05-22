<?php

/**
 * Description of Menu
 *
 * @author diego
 */
class Menu {

    public function MenuPrincipal()
    {
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary custom">
            <a class="navbar-brand" href="index.php" style="color:#000001">
                <img src="fotoSistema/logo.png" height="30px">
                PI lll
                <br>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">🏠 Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ⚙️ Configurações
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item CliqueConfiguracaoProvas" target="_blank" href='javascript:void(0)'>📃 Provas</a>
                            <a class="dropdown-item CliqueBuscaEquipes" target="_blank" href='javascript:void(0)'>📝 Equipes</a>
                        </div>
                    </li>
                </ul>

            </div>
            &nbsp;&nbsp;&nbsp;
            <form method='get'>
                <a href='login.php?sair=sair' title='Sair'><img src='fotoSistema/sair.png' height="30px"></a>
            </form>
        </nav>
        <?php
    }

    public function MenuLateral()
    {
        ?>
        <h5>Menu de Provas</h5>
        <div class="btn-group-vertical">
            <form>
                <br>
                <a type="button" class="ClickProvaRampa btn btn-primary btn-lg btn-block" ><h6>↗️ Rampa</h6></a>
                <a type="button" class="ClickProvaTracao btn btn-primary btn-lg btn-block"><h6>⛓ Tração</h6></a>
                <a type="button" class="ClickProvaVelocidade btn btn-primary btn-lg btn-block"><h6>🏎 Velocidade</h6></a>
                <a type="button" class="ClickProvaPista btn btn-primary btn-lg btn-block"><h6>🔱 Pista e Manobrabilidade</h6></a>
            </form>
        </div>
        <?php
    }

}
