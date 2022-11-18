<?php
session_start();
//error_reporting(0);
$buscarjogo = 'buscar';
$deleta = null;
$buscarjogouser = null;
$estapreenchido = null;
$gener = null;
$pla = null;
include('../classe/JogoSQL.php');

// =================================== TELA JOGO =================================================================================
?>
<form method=post>

    <label>nome</label>
    <input name=nomejogo type="text" value=<?php
                                            echo ($Jog->getNomeJogo() != null || $Jog->getNomeJogo() != "") ? $Jog->getNomeJogo() : '';
                                            ?>>
    <label>descrição</label>
    <input name=descricaojogo type="text" value=<?php
                                                echo (($Jog->getDescJogo() != null || $Jog->getDescJogo() != "")) ? $Jog->getDescJogo() : '';
                                                ?>>
    <label>faixa etaria</label>
    <input name=faixaetariajogo type="text" value=<?php
                                                    echo ($Jog->getFaixaEtaria() != null || $Jog->getFaixaEtaria() != "") ? $Jog->getFaixaEtaria() : '';
                                                    ?>>
    <label>foto</label>
    <input name=fotojogo type="file">


    <!-- =====================================TELA PLATAFORMA JOGO ========================================================================================== -->
    </br></br></br></br>

    <label>plataforma</label><br>
    <?php
    $plata = "buscar";
    $contagem = 0;
    include('../classe/PlataformaSQL.php');
    if ($SQL->execute()) {
        while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
            $contagem++;   ?>
            <input name='plataforma[<?php echo $contagem; ?>]' value=<?php echo $rs->idplataforma; ?> type="checkbox"> <?php echo $rs->desc_platafoma; ?><br>


    <?php   }
    } ?>




    <!-- =================================== TELA GENERO JOGO ========================================================================================================= -->

    </br></br></br></br>
    <label>genero</label><br>
    <?php
    $gene = "buscar";
    $contagemg = 0;
    include('../classe/GeneroSQL.php');
    if ($SQL->execute()) {
        while ($rg = $SQL->fetch(PDO::FETCH_OBJ)) {
            $contagemg++;   ?>
            <input name='genero[<?php echo $contagemg; ?>]' value=<?php echo $rg->idgenero; ?> type="checkbox"> <?php echo $rg->desc_genero; ?><br>

    <?php   }
    }
    ?>
    <button name=salvarjogo>salvar</button>
    </br></br></br></br>
    <!--================================ MOSTRAR JOGO =========================================================================================== -->

    <br><br><br><br><br><br>
    <table>
        <thead>
            <tr>
                <th>id plataforma</th>
                <th>descrição plataforma</th>
                <th></th>
                <th>id genero</th>
                <th>descrição genero</th>
                <th></th>
                <th>id</th>
                <th>nome</th>
                <th>descrição</th>
                <th>faixa etaria</th>
                <th>foto</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($SQLj->execute()) {
                    while ($rj = $SQLj->fetch(PDO::FETCH_OBJ)) {
                    ?>
              
                    <td><?php echo $rj->idplataforma; ?></td>
                    <td><?php echo $rj->desc_platafoma; ?></td>
                    <td><?php echo $rj->idgenero; ?></td>
                    <td><?php echo $rj->desc_genero; ?></td>
                    <td><?php echo $rj->idjogo; ?></td>
                    <td><?php echo $rj->nome_jogo; ?></td>
                    <td><?php echo $rj->desc_jogo; ?></td>
                    <td><?php echo $rj->faixa_etaria; ?></td>
                    <td><?php echo $rj->foto; ?></td>
                    <td>
                        <button type="submit" name=alterarjogo value=<?php echo $rj->idjogo ?>>ALTERAR</button>
                        <button type="submit" name=excluirjogo value=<?php echo $rj->idjogo ?>>EXCLUIR</button>
                    </td>
                </tr>
            <?php
                    }
                }
                //==========================================================================================




                if (isset($_POST['excluirjogo'])) {
                    echo "tem certeza???";

                    $_SESSION['idjogodel'] = $_POST['excluirjogo'];
                    echo $iddoSjogo;
            ?>
            <form method="post">

                <button type="submit" name="simjogo" value=<?php echo  $_SESSION['idjogo']; ?>>sim</button>
                <button type="submit" name='nao'>não</button>
            <?php

                }









                // ==================== inicio da função para salvar as informações do jogos ===================================================================
                // Se o usuario estiver preenchidos corretamente o campos e escolhido pelo menos uma plataforma e um genero 
                // o godigo preenche o banco com as informações.
                // Se NÃO ele mostra uma mensagem 
                if (isset($_POST['salvarjogo'])) {
                    if (!empty($_POST['nomejogo']) && !empty($_POST['descricaojogo']) && !empty($_POST['faixaetariajogo'])) {

                        $pla = $_POST['plataforma'];
                        if ($pla != null) {
                            $gener = $_POST['genero'];
                            if ($gener != null) {
                                //======================== salva as informações dos jogo =======================================================================================
                                // LEMBAR DE ARRUMAR AS FOTOS
                                include_once("../classe/conexao.php");
                                $nomejogo = $_POST['nomejogo'];
                                $desc_jogo = $_POST['descricaojogo'];
                                $faixa_etaria = $_POST['faixaetariajogo'];
                                $foto = null;
                                $SQLjogo = $conexao->prepare("INSERT INTO jogo (nome_jogo,desc_jogo,faixa_etaria,foto) VALUES ('$nomejogo','$desc_jogo', '$faixa_etaria','$foto')");
                                $SQLjogo->execute();
                                $idjogo = $conexao->lastInsertId();



                                if (!empty($idjogo)) {
                                    //======================== salva as plataformas do jogo ======================================================================================= 


                                    foreach ($pla as $p) {
                                        $plataformaSQL = $conexao->prepare("INSERT INTO plataforma_jogo(fk_idjogo,fk_idplataforma)
                                 VALUES ('$idjogo','$p');");
                                        $plataformaSQL->execute();
                                    }

                                    $pla = null;
                                    $p = null;
                                    //======================== salvar os genero do jogo ============================================================================================
                                    foreach ($gener as $g) {
                                        $generoSQL = $conexao->prepare("INSERT INTO generos_jgo(fk_idjogo,fk_idgenero)
                VALUES ( '$idjogo','$g') ");
                                        $generoSQL->execute();
                                    }
                                    $gener = null;
                                    $idjogo = null;
                                    $g = null;
                                    //========================= else para o usuario saber a merda que esta fazendo =================================================================
                                } else {
                                    echo "$idjogo";

                                    echo "gustavo e corno";
                                }
                            } else {
                                echo "escolha um genero";
                            }
                        } else {
                            echo "escolha uma plataforma";
                        }
                    } else {
                        echo "preencha todos os dados";
                    }
                }
                //====================== fim do if de salvar as informações dos jogos ===========================================================================
            ?>
            </form>