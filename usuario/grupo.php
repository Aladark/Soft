<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/grupos.css">
  <title>Grupos</title>
</head>

<body>
  <!--Inicio da header (cabeçalho)-->
  <div class="section">
    <header id="nav" class="sticky-nav">

      <nav class="container">
      </nav>
    </header>
  </div>
  <div style="display: flex;">
    <div class="secao1">
      <h1>Encontre um grupo</h1>
      <input type="text" placeholder="Procurar nome do grupo" name="" id="">

      <div class="scrollgroup">

        <?php
        if ($_SESSION['buscargrupo'] == null) {
          $buscargrupo = 'buscar';
          $_SESSION['buscargrupo'] = null;
        }
        $grupojogo = null;
        include("../classe/grupoSQL.php");
        $i = 3;
        if ($SQL->execute()) {
          while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
            if ($i < 1) {
              $i++;
        ?>
              <a class="grupo" a style="text-decoration: none;" class="grupo" href="index.php?mr=grupo&id=<?php echo $rs->idgrupos; ?>&opnmodal">

                <div class="imgjogo"></div>
                <div class="infogrupo">
                  <h2><?php echo $rs->nome_grupo; ?></h2>
                  <h3><?php echo $rs->nome_jogo; ?></h3>
                  <p>num. Max:<?php echo $rs->quantidademax; ?></p>

                </div>

              </a>
            <?php
            } else {
              $i = 0;
            ?>
      </div>
      <div class="grupos">
        <a style="text-decoration: none;" class="grupo" href="index.php?mr=grupo&id=<?php echo $rs->idgrupos; ?>&opnmodal">
          <div class="imgjogo"></div>
          <div class="infogrupo">
            <h2><?php echo $rs->nome_grupo; ?></h2>
            <h3><?php echo $rs->nome_jogo; ?></h3>
            <p>num. Max:<?php echo $rs->quantidademax; ?></p>

          </div>
        </a>
    <?php

            }
          } ?>
      </div><?php
          }
            ?>



    </div>

    <div class="secao2">
      <form method=post>
        <h1>Filtar pelo jogo</h1>
        <select name="Jogos" id="">
          <?php
          $buscarjogo = 'buscar';
          $modaljogo = null;
          $buscarjogouser = null;
          $estapreenchido = null;
          include_once("../classe/JogoSQL.php");
          if ($SQL->execute()) {
          ?>
            <option value=0></option>
            <option value=<?php echo $rs->idjogo; ?>><?php echo $rs->nome_jogo; ?></option>
            <?php
            while ($rs = $SQLj->fetch(PDO::FETCH_OBJ)) {
            ?>
              <option value=<?php echo $rs->idjogo; ?>><?php echo $rs->nome_jogo; ?></option>
          <?php
            }
          }
          ?>
        </select>
        <br><br>
        <button name=filtrarjogo>Filtrar</button>
        <?php
        if (isset($_POST['filtrarjogo'])) {
          if ($_POST['Jogos'] != 0) {
            $_SESSION['buscargrupo'] = $_POST['Jogos'];
          } else {
            $_SESSION['buscargrupo'] = null;
          }
        }
        ?>
      </form>

      <br>
      <br><br><br>
      <br><br><br>
      <br><br><br>
      <br><br><br>
      <h1>Criar um grupo</h1>

      <button><a style="text-decoration: none; color: black;" href="index.php?mr=grupo&opnmodalcr">Criar</a></button>

    </div>
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      include_once("../classe/conexao.php");
      $SQL = $conexao->prepare("SELECT idgrupos,nome_grupo,descricao_grupo
            FROM grupos,jogo
            where grupos.fk_idjogo = jogo.idjogo
            and  grupos.idgrupos = $id");
      $SQL->execute();
      $ra = $SQL->fetch(PDO::FETCH_OBJ);
      $_SESSION['idgrupo'] = $ra->idgrupos;
    ?>
      <div id="myModal" class="modal">

        <!-- Conteudo da modal -->
        <div class="modal-content">

          <!-- Cabeçalho da modal -->
          <div class="modal-header">
            <span class="close">&times;</span>
            <!-- Nome do jogo -->
            <h2 style="text-align: center;"><?php echo $ra->nome_grupo ?></h2>
          </div>

          <!-- Body da modal -->
          <div class="modal-body">
            <div class="imagemjogo" style="background-image: url(../img/lolback.jpg);">
              <br><br><br>
              <div style="background-color: rgb(255, 255, 255, 0.8); border-radius: 15px; margin: 10px;">
                <p style="padding: 30px; opacity: 1;"><?php echo $ra->descricao_grupo ?></p>
              </div>
            </div>
            <h2 style="text-align: center;">MEMBROS</h2>
            <div class="scrollmodal">

              <?php
              include_once("../classe/conexao.php");
              $SQL = $conexao->prepare("SELECT login,tipo
          FROM grupos,conf_grupo,usuario
          where grupos.idgrupos = conf_grupo.fk_idgrupos
          and conf_grupo.fk_idusuario = usuario.idusuario
          and grupos.idgrupos = $id;");
              $SQL->execute();
              ?><div class="grupos"><?php
                                    while ($rc = $SQL->fetch(PDO::FETCH_OBJ)) {
                                      if ($i < 2) {
                                        $i++;
                                    ?>


                    <div class="grupo">
                      <div style="background-image: url(../img/among-us-icon-png-02.png);" class="imguser">
                      </div>
                      <div class="infouser">
                        <h2><?php echo $rc->login ?></h2>
                      </div>

                    </div>


                  <?php
                                      } else {
                  ?>
              </div>
              <div class="grupos">

            <?php
                                        $i = 0;
                                      }
                                    }
            ?>


              </div>
            </div>
          </div>

          <!-- Rodapé da modal -->
          <div class="modal-footer" style="display: flex;">
            <button class="entrar"><a href="index.php?mr=conversagrupo&chatgrupo=<?php echo $id; ?>">
                Participar</a>
            </button>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <div id="myModal2" class="modal" style="margin-top: -40px;">

      <!-- Conteudo da modal -->
      <div class="modal-content">

        <!-- Cabeçalho da modal -->
        <div class="modal-header">
          <span class="close" id="close2">&times;</span>
          <!-- Nome do jogo -->
          <h2 style="text-align: center;">Criar Grupo</h2>
        </div>

        <!-- Body da modal -->
        <div class="modal-body">
          <div class="inpmod" style="text-align: center;">
            <form method="post">

              <input style="margin-top: 20px;" type="text" name="nomegrupo" id="" placeholder="Nome do Grupo">
              <textarea name="descricaogrupo" id="" cols="90" placeholder="Descrição do Grupo" rows="10"></textarea>

              <h3 style="margin-top: 0">Quantidade Máxima</h3>
              <div class="quant">
                <label for="1">1</label>
                <input type="radio" name="quantidade" value="1" id="1">
                <label for="2">2</label>
                <input type="radio" name="quantidade" value="2" id="2">
                <label for="3">3</label>
                <input type="radio" name="quantidade" value="3" id="3">
                <label for="4">4</label>
                <input type="radio" name="quantidade" value="4" id="4">
                <label for="5">5</label>
                <input type="radio" name="quantidade" value="5" id="5">
                <label for="6">6</label>
                <input type="radio" name="quantidade" value="6" id="6">
                <label for="7">7</label>
                <input type="radio" name="quantidade" value="7" id="7">
                <label for="8">8</label>
                <input type="radio" name="quantidade" value="8" id="8">
                <label for="9">9</label>
                <input type="radio" name="quantidade" value="9" id="9">
                <label for="10">10</label>
                <input type="radio" name="quantidade" value="10" id="10">
              </div>
              <h3 style="margin-top: 0">Escolha o jogo</h3>
              <select name="jogo" id="">
                <?php
                $buscarjogouser = 'buscar';
                include("../classe/JogoSQL.php");
                ?> <option value=0></option>;<?php
                                  if ($SQL->execute()) {
                                    while ($rj = $SQL->fetch(PDO::FETCH_OBJ)) {
                                  ?>
                <option value=<?php echo $rj->idjogo; ?>><?php echo $rj->nome_jogo; ?></option>;
            <?php
                                    }
                                  }
            ?>
              </select>

          </div>
        </div>

        <!-- Rodapé da modal -->
        <div class="modal-footer" style="display: flex;">

          <button class="entrar" name="grupo">Criar Grupo</button>

          <?php
          if (isset($_POST['grupo'])) {

            if (!empty($_POST['nomegrupo']) && !empty($_POST['descricaogrupo'])) {

              if ($_POST['quantidade'] != 0) {
                $grupojogo = 'inserir';
                include_once("../classe/GrupoSQL.php");
              }
            }
          } ?>
          </form>
        </div>

      </div>

    </div>

</body>
<?php
if (isset($_GET['opnmodal'])) {
?>
  <script>
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
  </script>

<?php
}
?>
<?php
if (isset($_GET['opnmodalcr'])) {
?>
  <script>
    var modal2 = document.getElementById("myModal2");
    modal2.style.display = "block";
  </script>

<?php
}
?>


<script>
  // Modal
  // Pega a modal
  var modal = document.getElementById("myModal");
  var modal2 = document.getElementById("myModal2");

  // Pega o botão e abre a modal
  var btn = document.getElementById("opnmodal");

  // Pega o elemento <span> que fecha a modal
  var span = document.getElementsByClassName("close")[0];
  var span2 = document.getElementById("close2");

  // Quando clicar no botão, abre a modal
  function opnmodal() {
    modal.style.display = "block";
  }

  // Quando o usuario cliclar no <span> (x), fechará a modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  span2.onclick = function() {
    modal2.style.display = "none";
  }

  // Quando o usuario cliclar em qualquer lugar fora da modal, irá fechar
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
    if (event.target == modal2) {
      modal2.style.display = "none";
    }
  }
</script>

</html>