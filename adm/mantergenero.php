<!DOCTYPE html>
<html lang="en">
<?php
$salvar = null;
?>

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
    <title>Document</title>
</head>

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

        <h1>Manter Gênero</h1>
        <form method="post">
            <!-- inputs -->
            <input style="width: 90%;" type="text" name="descgenero" id="desctipoitem" placeholder="Descrição da plataforma" />
            <!-------->

            <div style="float: right;">
                <button title="Inserir" name="salvargenero" class="reload" type="submit">
                    <div class="imginsert"></div>
                </button>


                <!--Botão de reload-->
                <button class="reload" name="" type="submit" id="reload">
                    <div class="imgreload" id="imgreload"></div>
                </button>
            </div>
            <!------------------->

            <?php
            // if (isset($_POST['salvargenero'])) {
                
            // }


            ?>
            <!-- Tabela -->
            <div style="margin-top: 15px">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Id_Gênero</th>
                                <th>Descrição</th>
                                <th>Ação</th>
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
                                        <td align="right">
                                            <button type="submit" class="btn btn-outline-danger" name="excluirgenero" value=<?php echo $rs->idgenero ?>>Excluir</button>
                                        </td>
                                    </tr>

                                <?php
                                }
                            } else {
                                echo "Erro: Não foi possível recuperar os dados do banco de dados";
                            }

                            if (isset($_POST['excluirgenero'])) {
                                $id = $_POST['excluirgenero'];

                                echo "<p class=\"bg-warning\">Tem certeza que deseja excluir o id: $id </p>"; ?>
                                <form method="post">
                                    <button type="submit" name="simgenero" value="<?php echo $id ?>">Sim</button>
                                    <button type="submit" name='nao'>Não</button>
                                </form>
                            <?php


                            }

                            // if (isset($_POST['simgenero'])) {
                            // } elseif (isset($_POST['nao'])) {
                            // }
                            ?>
                        </tbody>

                    </table>
        </form>
    </div>
    </div>
    <!-------------------------->
    </div>
</body>

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