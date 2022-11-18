<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method=post>
        <input type="text" name="descformapagamento" />
        <button type="submit" name="salvarformapagamento">salvar</button>
        <button type="submit" name="buscarformapagamento">mostrar</button><br />



        <?php
       // error_reporting(0);
        if (isset($_POST['salvarformapagamento'])) {
            if (!empty($_POST['descformapagamento'])) {
                include_once('../classe/formapagamentoSQL.php');
            } else {
                echo "preencha os dados";
            }
        }

        if (isset($_POST['buscarformapagamento'])) {
            include_once('../classe/formapagamentoSQL.php');
        ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>idforma_pagamento</th>
                        <th>descrição</th>
                        <th>descrição</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($SQL->execute()) {
                        while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
                    ?>
                            <tr>
                                <td><?php echo $rs->idforma_pagamento; ?></td>
                                <td><?php echo $rs->descricao; ?></td>
                                <td>
                                    <button type="submit" name=excluirformapagamento value=<?php echo $rs->idforma_pagamento ?>>EXCLUIR</button>
                                </td>
                            </tr>

                <?php
                        }
                    } else {
                        echo "Erro: Não foi possível recuperar os dados do banco de dados";
                    }
                }




                
                if (isset($_POST['excluirformapagamento'])) {
                    $id = $_POST['excluirformapagamento'];
            
                    echo $id ;
                    echo "tem certeza?"; ?>
                    <form method="post">
                        <button type="submit" name="simformapagamento" value = "<?php echo $id?>">sim</button>
                        <button type="submit" name='nao'>não</button>
                    </form>
                <?php

                    
                }

                if (isset($_POST['simformapagamento'])) {
                    include_once('../classe/formapagamentoSQL.php');
                } elseif (isset($_POST['nao'])) {
                    echo "ok";
                    
                }
                ?>
                </tbody>
            </table>
    </form>

</body>

</html>