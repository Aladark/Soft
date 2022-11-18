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
        <button name='buscar'>buscar meus jogos</button>
        <?php
        $oq = null;
        if(isset($_POST['buscar'])){
            ?>
            <table>
                <thead>
                    <tr>
                        <th>nome</th>
                        <th>descrição</th>
                        <th>faixa etaria</th>
                        <th>foto</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                     $buscarmeujogo = 'buscar';
                    include_once("../classe/MeuJogoSQL.php");
                    if ($SQLu->execute()) {
                        while ($rs = $SQLu->fetch(PDO::FETCH_OBJ)) {
                    ?>
                            <tr>
                                <td><?php echo $rs->nome_jogo; ?></td>
                                <td><?php echo $rs->nick_jogo; ?></td>
                                <td>
                                    <button type="submit"  name=deletejogo value=<?php echo $rs->fk_idjogo ?>>excluir jogo</button>
                                </td>
                            </tr>
                </tbody>
    <?php
                        }
                    }}
                
                if (isset($_POST['deletejogo'])) {
                    $oq = 'del';
                    $buscarmeujogo = null;
                    $_SESSION['idjogouser'] = $_POST['deletejogo'];
                    include_once("../classe/MeuJogoSQL.php");
                }

    ?>
    <br><br><br><br><br><br>
    <table>
        <thead>
            <tr>
                <th>id plataforma</th>
                <th>descrição plataforma</th>
                <th>id genero</th>
                <th>descrição genero</th>
                <th>id</th>
                <th>nome</th>
                <th>descrição</th>
                <th>faixa etaria</th>
                <th>foto</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $estapreenchido = null;
            $deleta = null;
            $estapreenchido = null;
            $gener = null;
            $pla = null;
            $buscarjogo = null;
            $buscarjogouser = 'buscar';
            include_once("../classe/JogoSQL.php");
            if ($SQL->execute()) {
                while ($rj = $SQL->fetch(PDO::FETCH_OBJ)) {
            ?>
                    <tr>
                        <td><?php echo $rj->idjogo; ?></td>
                        <td><?php echo $rj->nome_jogo; ?></td>
                        <td><?php echo $rj->desc_jogo; ?></td>
                        <td><?php echo $rj->faixa_etaria; ?></td>
                        <td><?php echo $rj->foto; ?></td>
                        <td>
                            <button type="submit" name=informacoesjogo value=<?php echo $rj->idjogo ?>>informações do jogo</button>
                            <button type="submit"  name=escolherjogo value=<?php echo $rj->idjogo ?>>escolher jogo</button>
                            <button type="submit"  name=avaliarjogo value=<?php echo $rj->idjogo ?>>avaliar jogo</button>
                        </td>
                    </tr>
                <?php
                }
            }
if($_POST['avaliarjogo']){
    $_SESSION['avaliarjogo'] = $_POST['avaliarjogo'];
    $modaljogo = 'buscar';
    include_once('../classe/jogoSQL.php');
    if ($SQL->execute()) {
    $rj = $SQL->fetch(PDO::FETCH_OBJ);
    $iddaavaliacao = $rj->idjogo;
     echo $rj->idjogo; 
     echo $rj->nome_jogo;
     echo $rj->desc_jogo; 
     echo $rj->faixa_etaria; 
     echo $rj->foto; 
     ?>
     <br>
     <input name='descavalia' type="text">
     <select name=avaliacao class='form-select' aria-label='Default select example'>;
     <option value=0 selected></option>;
    <option value=1 >1</option>;
    <option value=2>2</option>;
    <option value=3>3</option>;
    <option value=4>4</option>;
    <option value=5>5</option>;
    <option value=6>6</option>;
    <option value=7>7</option>;
    <option value=8>8</option>;
    <option value=9>9</option>;
    <option value=10>10</option>;
</select>
<button type="submit"  name=avaliar value=<?php echo $iddaavaliacao ?>>avaliar jogo</button>
     <?php
     
    }
}
if(isset($_POST['avaliar'])){
if(!empty($_POST['descavalia']) && $_POST['avaliacao'] =! 0){
include('../classe/AvaliacaoJogoSQL.php');
}else{
    echo'preencha todos os dados';
}
}










            if (isset($_POST['informacoesjogo'])) {
                $idjogo = $_POST['informacoesjogo'];
                $_SESSION['idjogo'] =  $_POST['informacoesjogo'];
                $plata = null;
                $gene = null;
                $platauser = 'buscar';
                echo "PLATAFORMA" . "</br>";
                include_once("../classe/plataformaSQL.php");
                if ($SQLp->execute()) {
                    while ($ri = $SQLp->fetch(PDO::FETCH_OBJ)) {
                        echo  $ri->idplataforma . '<br>';
                        echo  $ri->desc_platafoma . '<br>';
                    }
                }
                echo "GENERO" . "</br>";
                include_once("../classe/generoSQL.php");
                if ($SQLg->execute()) {
                    while ($rg = $SQLg->fetch(PDO::FETCH_OBJ)) {
                        echo  $rg->idgenero . '<br>';
                        echo  $rg->desc_genero . '<br>';
                    }
                } ?>
                <button type="submit"  name=escolherjogo value=<?php echo $idjogo ?>>informações do jogo</button>
            <?php
            }
            if(isset($_POST['escolherjogo'])){
                include_once('../classe/MeuJogoSQL.php');

            }



            ?>



    </form>
</body>

</html>