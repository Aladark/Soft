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
        <input type="text" name="descgenero" />
        <button type="submit" name="salvargenero">salvar</button>
        



        <?php
        error_reporting(0);
        if (isset($_POST['salvargenero'])) {
            if (!empty($_POST['descgenero'])) {
                include_once('../classe/GeneroSQL.php');
            } else {
                echo "preencha os dados";
            }
        }

           
        ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>idgenero</th>
                        <th>descrição</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $gene = "buscar";
                     include_once('../classe/GeneroSQL.php');
                    if ($SQL->execute()) {
                        while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
                    ?>
                            <tr>
                                <td><?php echo $rs->idgenero; ?></td>
                                <td><?php echo $rs->desc_genero; ?></td>
                                <td>
                                    <button type="submit" name=excluirgenero value=<?php echo $rs->idgenero ?>>EXCLUIR</button>
                                </td>
                            </tr>

                <?php
                        }
                    } else {
                        echo "Erro: Não foi possível recuperar os dados do banco de dados";
                    }
         




                
                if (isset($_POST['excluirgenero'])) {
                    $id = $_POST['excluirgenero'];
            
                    echo $id  ;
                    echo "tem certeza?"; ?>
                    <form method="post">
                        <button type="submit" name="simgenero" value = "<?php echo $id?>">sim</button>
                        <button type="submit" name='nao'>não</button>
                    </form>
                <?php

                    
                }

                if (isset($_POST['simgenero'])) {
                    include_once('../classe/GeneroSQL.php');
                } elseif (isset($_POST['nao'])) {
                    echo "ok";
                    
                }
                ?>
                </tbody>
            </table>
    </form>

</body>

</html>