<?php

/* ====== Configuração DB ======= */
$host = "localhost";
$dbName = "pi3utp";
$user = "root";
$password = "";


try {
    $con = new PDO('mysql:host=' . $host . '; dbname=' . $dbName, $user, $password);
} catch (PDOExceptionException $e) {
    ?>
    <script>
        alert("Erro Conexão com o banco de dados");
    </script>>
    <?php

}