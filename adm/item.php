<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="text" name="descitem" />
        <input type="number" name="valor" />
        
        <?php
        error_reporting(0);
         $buscartipoitem = 'buscar';
        include_once('../classe/tipoitemSQL.php');
        if($SQL->execude())
        ?> <select name='tipoitem'>
            <option value=0> </option>
            <option value=<?php echo $rs->id_tipo_item ?>><?php echo $rs->desc_tipo_item ?></option>
            <?php
            while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
            ?>

                <option value=<?php echo $rs->id_tipo_item ?>><?php echo $rs->desc_tipo_item ?></option>

            <?php
            } ?>
        </select>
        <button type="submit" name="buscaritem">buscar</button>
        <button type="submit" name="salvaritem">salvar</button>
        <?php
        if(isset($_POST['buscaritem'])){
        include_once('../classe/itemSQL.php');
        ?>
        <form method=post>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>fk_idtipo_item</th>
                        <th>iditem</th>
                        <th>valor</th>
                        <th>descrição</th>
                        <th>EXCLUIR</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($SQL->execute()) {
                        while ($ri = $SQL->fetch(PDO::FETCH_OBJ)) {
                    ?>
                            <tr>
                                <td><?php echo $ri->fk_idtipo_item; ?></td>
                                <td><?php echo $ri->IdItem; ?></td>
                                <td><?php echo $ri->valor; ?></td>
                                <td><?php echo $ri->desc_item; ?></td>
                                <td>
                                    <button type="submit" name=excluiritem value=<?php echo $ri->IdItem ?>>EXCLUIR</button>
                                </td>
                            </tr>

                    <?php


                        }
                    }
                }
                   



                    if (isset($_POST['excluiritem'])) {
                        $iditem = $_POST['excluiritem'];
            
                        echo $iditem;
                        echo " tem certeza?"; ?>
                        <form method="post">
                            <button type="submit" name="simitem" value = "<?php echo $iditem?>">sim</button>
                            <button type="submit" name='nao'>não</button>
                        </form>
<?php
                    }
                    if (isset($_POST['simitem'])) {
                       
                        include_once("../classe/itemSQL.php");
                    } elseif (isset($_POST['nao'])) {
                        echo "ok";
                        
                    }
                    if (isset($_POST['salvaritem'])) {
                        if (!empty($_POST['descitem']) && !empty($_POST['valor'])) {
                            if ($_POST['tipoitem'] != 0) {
                                include_once('../classe/ItemSQL.php');
                            } else {
                                echo 'escolha um tipo do item';
                            }
                        } else {
                            echo "preencha os dados";
                        }
                    }

                    ?>
        </form>

</body>

</html>