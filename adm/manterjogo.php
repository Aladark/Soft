<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/manter.css" />
    <link rel="stylesheet" href="../css/bootsrap.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Manter jogo</title>
</head>

<!-- // =================================== TELA JOGO ================================================================================= -->


<body>
    <!--Inicio da header (cabeçalho)-->
    <div class="section">
        <header id="nav" class="sticky-nav">
            <!-- Botão do menu lateral -->
            <button class="w3-button w3-teal w3-xlarge" style="
            position: absolute;
            background-color: transparent !important;
            color: white !important;
          " onclick="myFunction()">
                ☰
            </button>
            <!--------------------------->
            <nav class="container">
                <ul role="list" class="nav-grid">
                    <li id="w-node-_151d960c-bb04-cfc3-fd7d-356ce1fa0176-31e55b4d" class="list-item-3">
                        <!--link junto com a logo-->
                        <a href="../index.html" class="nav-logo-link">
                            <img src="../img/logo.png" sizes="(max-width: 479px) 80.296875px, 81.65625px" srcset="../img/logo.png 735w" alt="HomePage" class="nav-logo" /></a>
                        <!--Fim link junto com a logo-->
                    </li>
                    <!--link do cadastrar e login-->
                    <li class="list-item">
                        <a href="#" class="nav-link">Cadastrar</a>
                    </li>
                    <li class="list-item">
                        <a href="../logar/login.php" class="nav-link">Login</a>
                    </li>
                    <!--Fim link do cadastrar e login-->
                </ul>
            </nav>
        </header>
    </div>
    <!--Fim da header (cabeçalho)-->

    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display: none" id="mySidebar">
        <a href="manteritem.php" class="w3-bar-item w3-button">Manter Item</a>
        <a href="mantertipoitem.php" class="w3-bar-item w3-button">Manter Tipo Item</a>
        <a href="manterjogo.php" class="w3-bar-item w3-button">Manter Jogo</a>
        <a href="manterplataforma.php" class="w3-bar-item w3-button">Manter Plataforma</a>
        <a href="mantergenero.php" class="w3-bar-item w3-button">Manter Gênero</a>
    </div>
    <!------------->

    <!-- Manter Item / pode ser qualquer manter -->
    <div style="margin: 50px">
        <h1>Manter Jogo</h1>
        <form method="post" enctype="multipart/form-data">
            <?php
            session_start();
            $buscarjogo = 'buscar';
            $deleta = null;
            $buscarjogouser = null;
            $estapreenchido = null;
            $gener = null;
            $pla = null;
            include('../classe/JogoSQL.php');
            ?>
            <!-- inputs -->
            <input style="width: 27%;" name=nomejogo type="text" placeholder="Nome do jogo" value=<?php
                                                                                                    echo ($Jog->getNomeJogo() != null || $Jog->getNomeJogo() != "") ? $Jog->getNomeJogo() : '';
                                                                                                    ?>>

            <input style="width: 27%" name=descricaojogo type="text" placeholder="Descrição do jogo" value=<?php
                                                                                                            echo (($Jog->getDescJogo() != null || $Jog->getDescJogo() != "")) ? $Jog->getDescJogo() : '';
                                                                                                            ?>>
            <input style="width: 27%" name=faixaetariajogo type="text" placeholder="Faixa etária" value=<?php
                                                                                                        echo ($Jog->getFaixaEtaria() != null || $Jog->getFaixaEtaria() != "") ? $Jog->getFaixaEtaria() : '';
                                                                                                        ?>>

            <input style="width: auto" type=file name=arquivo >

            <!-------->
            <!-- combobox -->

            <!-- =====================================TELA PLATAFORMA JOGO ========================================================================================== -->
            <div style="display: flex;">
                <label>Plataforma</label><br><label style="margin-left: 100px;">Gênero</label>
            </div>
            <div style="display: flex; margin-bottom: 20px;">
                <div style="max-height: 100px; width: 200px; overflow: auto;  margin-right: 30px; border: 2px solid black; padding: 10px;">
                    <?php
                    $plata = "buscar";
                    $contagem = 0;
                    include('../classe/PlataformaSQL.php');
                    if ($SQL->execute()) {
                        while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
                            $contagem++;   ?>
                            <input style="width: auto;" name='plataforma[<?php echo $contagem; ?>]' id="<?php echo $rs->idplataforma; ?>" value=<?php echo $rs->idplataforma; ?> type="checkbox"> <label for="<?php echo $rs->idplataforma; ?>"> <?php echo $rs->desc_platafoma; ?></label><br>


                    <?php   }
                    } ?>
                </div>

                <div style="max-height: 100px; width: 100%; overflow: auto; border: 2px solid black; padding: 10px;">
                    <!-- =================================== TELA GENERO JOGO ========================================================================================================= -->
                    <?php
                    $gene = "buscar";
                    $contagemg = 0;
                    include('../classe/GeneroSQL.php');
                    if ($SQL->execute()) {
                        while ($rg = $SQL->fetch(PDO::FETCH_OBJ)) {
                            $contagemg++;   ?>
                            <input style="width: auto;" id="<?php echo $rg->idgenero; ?>" name='genero[<?php echo $contagemg; ?>]' value=<?php echo $rg->idgenero; ?> type="checkbox"> <label for="<?php echo $rg->idgenero; ?>"> <?php echo $rg->desc_genero; ?></label>

                    <?php   }
                    }
                    ?>
                </div>
            </div>

            <span style="position: absolute; right: 115px; top: 240px;">
                <button title="Inserir" name="salvarjogo" class="reload" type="submit">
                    <div class="imginsert"></div>
                </button>
            </span>

            <!--Botão de reload-->
            <span title="Atualizar" style="position: absolute; top: 240px; right: 50px">
                <button class="reload" name="buscarjogo" type="submit" id="reload">
                    <div class="imgreload" id="imgreload"></div>
                </button>
            </span>
            <!------------------->

            <?php
            $buscarjogo = 'buscar';
            include_once('../classe/jogoSQL.php');
            ?>
            <!-- Tabela -->
            <div style="margin-top: 15px">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome Jogo</th>
                                <th scope="col">Faixa Etária</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Id Plataforma</th>
                                <th scope="col">Descrição Plataforma</th>
                                <th scope="col">Id Gênero</th>
                                <th scope="col">Descrição Gênero</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($SQLj->execute()) {
                                while ($rj = $SQLj->fetch(PDO::FETCH_OBJ)) {
                            ?>

                                    <td><?php echo $rj->idjogo; ?></td>
                                    <td><?php echo $rj->nome_jogo; ?></td>
                                    <td><?php echo $rj->faixa_etaria; ?></td>
                                    <td><?php echo $rj->desc_jogo; ?></td>
                                    <td><?php echo $rj->idplataforma; ?></td>
                                    <td><?php echo $rj->desc_platafoma; ?></td>
                                    <td><?php echo $rj->idgenero; ?></td>
                                    <td><?php echo $rj->desc_genero; ?></td>
                                    <td><img style="width: 100px;" src="../img/<?php echo $rj->foto; ?>"></td>
                                    <td align="right">
                                        <button type="submit" class="btn btn-outline-warning" name=alterarjogo value=<?php echo $rj->idjogo ?>>ALTERAR</button>
                                        <button type="submit" class="btn btn-outline-danger" name=excluirjogo value=<?php echo $rj->idjogo ?>>EXCLUIR</button>
                                    </td>
                                    </tr>
                                <?php
                                }
                            }
                            //==========================================================================================

                            if (isset($_POST['excluirjogo'])) {
                                $id = $_POST['excluirjogo'];
                                echo "<p class=\"bg-warning\">Tem certeza que deseja excluir o id: $id </p>";

                                $_SESSION['idjogodel'] = $_POST['excluirjogo'];
                                ?>
                                <form method="post">
                                    
                                    <button type="submit" name="simjogo" value=<?php echo $id; ?>>sim</button>
                                    <button type="submit" name='nao'>não</button>
                                <?php

                            }

                            if (isset($_POST['simjogo'])) {
                                $_SESSION['idjogodel'] = $_POST['simjogo'];
                                $excluijogo = 'sim';
                                include_once("../classe/JogoSQL.php");
                            } elseif (isset($_POST['nao'])) {
                            }

                            // ==================== inicio da função para salvar as informações do jogos ===================================================================
                            // Se o usuario estiver preenchidos corretamente o campos e escolhido pelo menos uma plataforma e um genero 
                            // o godigo preenche o banco com as informações.
                            // Se NÃO ele mostra uma mensagem 
                            if (isset($_POST['salvarjogo'])) {
                                if (!empty($_POST['nomejogo']) && !empty($_POST['descricaojogo']) && !empty($_POST['faixaetariajogo'])) {
                                    var_dump($_FILES['arquivo']['name']);

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
                                            $foto = carrega();
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
                    </table>
                </div>
            </div>
            <!-------------------------->
        </form>
    </div>
</body>

<?php
// Função carrega.
function carrega()
{
$arg['pasta']   = "../img/";
$arg['tamanho'] = 1024*1024*2;
$arg['ext']     = array('jpeg','jpg','png');

$arg['error'][0]="Não houve erro";
$arg['error'][1]="Tamanho execede limete do PHP";
$arg['error'][2]="Tamanho execede limete do HTML";
$arg['error'][3]="Arquivo carregado parcialmente";
$arg['error'][4]="Nenhum arquivo enviado";

if ($_FILES['arquivo']['erro'] = ![0])
{
	die("Não foi possivel cerregar o arquivo ".$arg['error'][$_FILES['arquivo']['error']]);

}
$tmp = explode(".",$_FILES['arquivo']['name']);
$extensao = strtolower(end($tmp));

if(array_search($extensao,$arg['ext']) === false){
	//verifica se é do tipo esperado
	echo"Arquivo inesperado";
	exit;
}elseif($arg['tamanho'] < $_FILES['arquivo']['size']){
	//tamanho excede
	echo"Tamanho não permitido";
	exit;
}else{
	//mover o arquivo
	$novonome = time().'.'.$extensao;
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$arg['pasta'].$novonome)){
		echo "sucesso";
		
	}else{
		echo "erro";
	}	
}
return $novonome;
}
?>


<script>
    var seta = document.getElementById("imgreload");

    function girar() {
        seta.style.animation = "girar 0.6s normal";

        seta.onanimationend = () => {
            window.location.reload();
        };
    }
</script>

<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }

    function myFunction() {
        var x = document.getElementById("mySidebar");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>

</html>