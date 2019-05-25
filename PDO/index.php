<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $con = new PDO('mysql:host=localhost; dbname=sqlsecurity', 'root', '');
        $name = 'diego';
        $senha = 123;
        try {

            //Cada ? é um link dentro da quary
            /*
             * EXTRA: Nomeando LINKS: (?)
             * Para nomear os links usa-se :nomeDoLink
             * Isso ajuda na manutenção do código
             */
            $query = 'INSERT INTO login (user, senha) VALUES (:usuario,:senha)';
            //Preparando a quary
            $insert = $con->prepare($query);
            /*
              // **************************** Inserção de Dados com bindValue ****************************
              //Ordem do link, dado a ser inserido, TIPO DO DADO
              $insert->bindValue(1, $name, PDO::PARAM_STR);
              //Ordem do link, dado a ser inserido, TIPO DO DADO
              $insert->bindValue(2, $senha, PDO::PARAM_INT);
              //Executando a quary
              $insert->execute();
              if ($insert->rowCount()) {
              //$con->lastInsertId() Pega o ultimo ID cadastrado
              echo $con->lastInsertId() . ' - Cadastro com sucesso! <hr>';
              }
             */
            // **************************** Inserção de Dados com bindParam ****************************
            //Ordem do link, dado a ser inserido, TIPO DO DADO, tamanho maximo do dado

            $insert->bindParam(':usuario', $name, PDO::PARAM_STR, 15);

            //Ordem do link, dado a ser inserido, TIPO DO DADO, tamanho maximo do dado
            $insert->bindParam(':senha', $senha, PDO::PARAM_INT, 15);

            //Executando a quary
            $insert->execute();
            if ($insert->rowCount()) {
                //$con->lastInsertId() Pega o ultimo ID cadastrado
                echo $con->lastInsertId() . ' - Cadastro com sucesso! <hr>';
            }

            // **************************** Buscando dados ****************************
            $quary = 'SELECT * FROM login WHERE user = :usuario';
            $select = $con->prepare($quary);

            //link, valor a ser buscado
            $select->bindValue(':usuario', $name);
            //Executando quary
            $select->execute();

            if ($select->rowCount()) {
                $resultado = $select->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_CLASS
                echo '<br>Resultado: ';
                echo '<br>';
                foreach ($resultado as $resultados) {
                    //Os campos user_id, user, senha são referências do banco de dados
                    echo $resultados['user_id'];
                    echo ' ';
                    echo $resultados['user'];
                    echo ' ';
                    echo $resultados['senha'];
                    echo '<br>';
                }
            } else {
                echo 'ERRO na consulta';
            }
        } catch (PDOExceptionException $e) {
            echo 'ERRO';
        }
        ?>
    </body>
</html>
