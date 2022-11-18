<?php
//error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method=post>
        <input type="text" name="descplataforma" />
        <button type="submit" name="salvarplataforma">salvar</button>
        <button type="submit" name="buscarplataforma">buscar</button>
    </form>


    <?php

    if (isset($_POST['salvarplataforma'])) {
        if (!empty($_POST['descplataforma'])) {
            include_once('../classe/PlataformaSQL.php');
        } else {
            echo " preencher os dados";
        }
    }


    $plata = "buscar";
        include_once('../classe/PlataformaSQL.php');
    ?>
        <form method=post>
            <table>
                <thead>
                    <tr>
                        <th>descrição</th>
                        <th>descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($SQL->execute()) {
                        while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {

                    ?>
                            <tr>
                                <td><?php echo $rs->desc_platafoma; ?></td>
                                <td><?php echo $rs->idplataforma; ?></td>
                                <td>
                                    <button type="submit" name=excluirplataforma value=<?php echo $rs->idplataforma ?>>EXCLUIR</button>
                                </td>
                            </tr>

                    <?php
                        }
                    }
                



                if (isset($_POST['excluirplataforma'])) {
                    $id = $_POST['excluirplataforma'];
            
                    echo $id  ;
                    echo "tem certeza?"; ?>
                    <form method="post">
                        <button type="submit" name="simplataforma" value = "<?php echo $id?>">sim</button>
                        <button type="submit" name='nao'>não</button>
                    </form>
                <?php

                    
                }

                if (isset($_POST['simplataforma'])) {
                    include_once('../classe/PlataformaSQL.php');
                } elseif (isset($_POST['nao'])) {
                    echo "ok";
                    
                }
                ?>
                </tbody>
        </form>









</body>

</html>