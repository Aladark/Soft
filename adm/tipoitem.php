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
        <input type="text" name="desctipoitem" />
        <button type="submit" name="salvartipoitem">salvar</button>
        <button type="submit" name="buscartipoitem">buscar</button>
     

</form>

        <?php
        //error_reporting(0);
        if (isset($_POST['salvartipoitem'])) {
            if (!empty($_POST['desctipoitem'])) {
                $salvar = 'sim';
                include_once('../classe/tipoitemSQL.php');
            } else {
                echo "preencha os dados";
            }
        }

     
           if(isset($_POST['buscartipoitem'])){
            include_once('../classe/tipoitemSQL.php');
        ?>
        <form method=post>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id_tipo_item</th>
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
                                <td><?php echo $rs->id_tipo_item; ?></td>
                                <td><?php echo $rs->desc_tipo_item; ?></td>
                                <td>
                                    <button type="submit" name=excluirtipoitem value=<?php echo $rs->id_tipo_item ?>>EXCLUIR</button>
                                </td>
                            </tr>

                <?php
                        }
                    } else {
                        echo "Erro: Não foi possível recuperar os dados do banco de dados";
                    }}
                




                
                if (isset($_POST['excluirtipoitem'])) {
                    $idtipoitem = $_POST['excluirtipoitem'];
            
                    echo $id ;
                    echo " tem certeza?"; ?>
                    <form method="post">
                        <button type="submit" name="simtipoitem" value = "<?php echo $idtipoitem?>">sim</button>
                        <button type="submit" name='nao'>não</button>
                    </form>
                <?php

                    
                }

                if (isset($_POST['simtipoitem'])) {
                    include_once('../classe/tipoitemSQL.php');
                } elseif (isset($_POST['nao'])) {
                    echo "ok";
                    
                }
                ?>
                </tbody>
            </table>
    </form>

</body>

</html>