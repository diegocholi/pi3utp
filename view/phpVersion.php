<?php
if (isset($_SESSION['user']))
{
    echo
    'Versão do PHP instalada no sistema: ' . phpversion() .
    '<br>Versão necessária: maior ou igual à 7.3.0';
}
else
{
    header('Location: ../login.php');
}
//phpinfo();
?>