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
        <a href="#" class="w3-bar-item w3-button">Link 1</a>
        <a href="#" class="w3-bar-item w3-button">Link 2</a>
        <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
    <!------------->

    <!-- Manter Item / pode ser qualquer manter -->
    <div style="margin: 50px">
        <h1>Manter Item</h1>
        <form method="post">
            <!-- inputs -->
            <input type="text" name="descitem" id="descitem" placeholder="Descrição do Item" />
            <input type="number" name="valor" id="valor" placeholder="Valor do Item" />
            <!-------->
            <!-- combobox -->


            <?php
            error_reporting(0);
            $buscartipoitem = 'buscar';
            include_once('../classe/tipoitemSQL.php');
            ?> <select name='tipoitem' style="width: 220px; height: 30px">
                <option value=0> </option>
                <option value=<?php echo $rs->id_tipo_item ?>><?php echo $rs->desc_tipo_item ?></option>
                <?php
                while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
                ?>

                    <option value=<?php echo $rs->id_tipo_item ?>><?php echo $rs->desc_tipo_item ?></option>

                <?php
                } ?>
            </select>

            <span style="position: absolute; right: 115px">
                <button title="Inserir" name="salvaritem" class="reload" type="submit">
                    <div class="imginsert"></div>
                </button>
            </span>

            <!--Botão de reload-->
            <span title="Atualizar" style="position: absolute; right: 50px">
                <button class="reload" name="buscaritem" onclick="girar()" type="submit" id="reload">
                    <div class="imgreload" id="imgreload"></div>
                </button>
            </span>
            <!------------------->

            <?php
            $buscaritem = 'buscar';
            include_once('../classe/itemSQL.php');
            ?>
                <!-- Tabela -->
                <div style="margin-top: 15px">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">desc_tipo_item</th>
                                    <th scope="col">iditem</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($SQL->execute()) {
                                    while ($ri = $SQL->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                        <tr>
                                            <td><?php echo $ri->desc_tipo_item; ?></td>
                                            <td><?php echo $ri->IdItem; ?></td>
                                            <td><?php echo $ri->valor; ?></td>
                                            <td><?php echo $ri->desc_item; ?></td>
                                            <td align="right">
                                                <button type="submit" class="btn btn-outline-danger" name=excluiritem value=<?php echo $ri->IdItem ?>>EXCLUIR</button>
                                            </td>
                                        </tr>

                                <?php


                                    }
                                }
                            




                            if (isset($_POST['excluiritem'])) {
                                $iditem = $_POST['excluiritem'];

                                echo " <br><br><p class=\"bg-warning\">tem certeza?</p>"; ?>
                                <form method="post">
                                    <button type="submit" name="simitem" value="<?php echo $iditem ?>">Sim</button>
                                    <button type="submit" name='nao'>Não</button>
                                </form>
                            <?php
                            }
                            if (isset($_POST['simitem'])) {

                                include_once("../classe/itemSQL.php");

                            } elseif (isset($_POST['nao'])) {
                            }
                            if (isset($_POST['salvaritem'])) {
                                if (!empty($_POST['descitem']) && !empty($_POST['valor'])) {
                                    if ($_POST['tipoitem'] != 0) {
                                        include_once('../classe/ItemSQL.php');
                                    } else {
                                        echo "<br><br><p class=\"bg-warning\">Escolha o Tipo do Item</p>";
                                    }
                                } else {
                                    echo "<br><br><p class=\"bg-warning\">Preencha os dados</p>";
                                }
                            }

                            ?>
                        </table>
                    </div>
                </div>
                <!-------------------------->
        </form>
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