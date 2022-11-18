<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/perfil.css" />
  <link rel="stylesheet" href="
https://www.w3schools.com/w3css/4/w3.css
">

  <title>Nome do usuario</title>
</head>
<?php
error_reporting(0);
$buscamigo = null;
$venda = null;
$perfil = 'sim';
include('../classe/UsuarioSQL.php');
if ($SQL->execute()) {
  if ($SQL->rowCount() > 0) {
?>

    <body>


      <!-- Foto de background -->
      <!-- Aqui é onde o usuario irá escolher a foto de fundo, onde está o background-image -->
      <div style="background-color: white; background-image: url(../img/Background_Layout.png);" class="backimg">

        <div class="container containerbg">

          <div class="headerperfil">
            <!-- Imagem do icone do usuario, onde está o src -->
            <img src="../img/Kreobio.jpg" alt="">

            <div style="display: block; width: 100%;">
              <div style="display: flex;">
                <!-- Nick do usuario -->
                <p2><?php echo $usu->getNome(); ?></p2>

                <!-- na classe abaixo você quem define qual emoji e a cor quer. abaixo 
                        terá um exemplo junto com a lista de emojis e cores disponiveis

                    #lista de cores
                    *verde
                    *verde-claro
                    *amarelo
                    *laranja
                    *laranja-escuro
                    *vermelho
                    *branco
                    *azul
                    *azul-claro

                    #lista de emojis
                    *muito-feliz
                    *feliz
                    *neutro
                    *desconfiado
                    *triste
                    *raiva
                    *adm
                    *invertido
                    *morto
                -->
                <?php
                if ($usu->getFk_IdTipo_Conta() == 1) {
                ?>

                  <p2>
                    <p3 class="adm laranja-escuro">
                  </p2> <?php
                      } elseif ($usu->getFk_IdTipo_Conta() == 2) {
                        ?>
                  <p2>
                    <p3 class="neutro amarelo">
                  </p2> <?php
                      } elseif ($usu->getFk_IdTipo_Conta() == 3) {
                        ?>
                  <p2>
                    <p3 class="feliz amarelo">
                  </p2> <?php
                      }
                        ?>
                    <a class="editarperfil" style="margin-left: 400px" href="../">Editar Perfil</a>
              </div>
              <div class="w3-light-grey w3-tiny" style="margin: 0 50px 0 25px; border: 2px solid black; margin-top: 95px;">

                <!-- Level atual do usúario -->
                <div class="lvl"><?php echo $usu->getlevel() ?></div>
                <?php

                $valor1 = $usu->getlevel() * 10;
                $porcentagem = $valor1;
                ?>
                <!-- Onde está escrito "width: 50%" é o nível de xp do usuario, fazer alguma logica de quando estiver
    em 100%, ele passar para o proximo nivel -->
                <div class="w3-container w3-green" id="xp" style="width:50%; border: 2px solid #91e594;">&nbsp</div>

                <!-- Proximo nivel do usuario -->
                <div class="lvl lvlrgt" id="lvl"><?php echo $usu->getlevel() + 1 ?>
                </div>
              </div>
            </div>
          </div>

      <?php
    }
  } ?>


      <div class="bodyperfil">


        <!-- No caso, este botão só irá aparecer para o usuario logado, para adicionar os jogos a propria conta 
                ele está redirecionando para a pagina de adicionar os jogos-->

        <a class="addjogo" href="index.php?mr=adicionarjogos">Add jogos</a>


        <h2 class="meusjogos">Meus Jogos</h2>

        <!-- para adicionar os jogos, primeiramente você precisa colocar a <div class="divisao", logo após isso
                colocar o limite maximo de jogos de 6, quando você coloca uma nova <div class="divisao", você coloca
                uma nova linha no "Meus Jogos" -->

        <!-- div com a class divisao -->



        <!-------------------------------------------->

        <?php

        $buscarmeujogo = 'buscar';
        $oq = null;
        $divisao = 0;
        include_once("../classe/MeuJogoSQL.php");
        if ($SQLu->execute()) {
        ?><div class="divisao"><?php
                                while ($rb = $SQLu->fetch(PDO::FETCH_OBJ)) {
                                  if ($divisao < 6) {
                                    $divisao++;
                                ?>

                <div class="jogo">
                  <!-- mudar a url dessa "background-image" e colocar a imagem atribuida ao jogo-->
                  <!-- O id="opnmodal, faz com que seja aberto a modal com as informações do jogo e do usuario" -->
                  <a style="background-image: url(../img/Kreobio.jpg);" href="index.php?mr=perfil&id=<?php echo $rb->fk_idjogo; ?>&opnmodal" type='button' name=alterarjogo></a>
                  <!-- Nome do jogo -->
                  <p><?php echo $rb->nome_jogo; ?></p>
                </div>
                <!-- Fim do bloco de codigo de exemplo, lembrando, nunca coloque mais de 6 jogos em uma divisao -->
              <?php
                                  } else {
              ?>
          </div>
          <div class="divisao">
          <div class="jogo">
                  <!-- mudar a url dessa "background-image" e colocar a imagem atribuida ao jogo-->
                  <!-- O id="opnmodal, faz com que seja aberto a modal com as informações do jogo e do usuario" -->
                  <a style="background-image: url(../img/Kreobio.jpg);" href="index.php?mr=perfil&id=<?php echo $rb->fk_idjogo; ?>&opnmodal" type='button' name=alterarjogo></a>
                  <!-- Nome do jogo -->
                  <p><?php echo $rb->nome_jogo; ?></p>
                </div>
                <!-- Fim do bloco de codigo de exemplo, lembrando, nunca coloque mais de 6 jogos em uma divisao -->
          <?php
                                    $divisao = 0;
                                  }
          ?>


      <?php }
                              }
      ?>
          </div>

      </div>
      <form method=post></form>
      <?php

      if (isset($_GET['id'])) {
        $id = $_GET['id'];


      ?>
        </form>
        </div>
        <!-- A modal -->
        <div id="myModal" class="modal" style="">

          <!-- Conteudo da modal -->
          <div class="modal-content">
            <?php
            include_once("../classe/conexao.php");
            $SQL = $conexao->prepare("SELECT idjogo,nome_jogo,desc_jogo,faixa_etaria,foto
 FROM jogo WHERE idjogo = 	$id");
            $SQL->execute();
            $ra = $SQL->fetch(PDO::FETCH_OBJ);
            ?>
            <!-- Cabeçalho da modal -->
            <div class="modal-header">
              <span class="close">&times;</span>
              <!-- Nome do jogo -->
              <h2><?php echo $ra->nome_jogo; ?></h2>
            </div>

            <!-- Body da modal -->
            <div class="modal-body" style="display: flex;">
              <div class="secao">

                <!-- Game id do usuario dentro do jogo -->
                <h2>Game id: Kreobio</h2>

                <!-- Avaliação pessoal do usuario quanto ao jogo -->
                <h3>Avaliação Pessoal do Jogo: 9.0</h3>

                <!-- Quaisquer observações que o usuario queira atribuir ao jogo em questão -->
                <p>Obs: Sou ouro platina grão-mestre mestre
                  challenger ultra mega power mono mordekaiser</p>
                <!-- Lista de plataformas -->
                <h3>Plataformas</h3>
                <div class="plataforma">
                  <!-- Aqui neste caso, irá trocar a imagem da plataforma, apenas isso, tambem lembre-se de 
                            colocar o alt, com o nome da plataforma em questão -->
                  <img src="../img/arrow-repeat.svg" alt="">
                  <img src="../img/arrow-repeat.svg" alt="">
                  <img src="../img/arrow-repeat.svg" alt="">
                  <img src="../img/arrow-repeat.svg" alt="">
                </div>
              </div>
              <div class="barra"></div>
              <div class="secao" style="display: flex;">
                <div class="imagemjogo" style="background-image: url(../img/lolback.jpg);">
                </div>
                <div class="descjogo">
                  <h2>Sobre:</h2>
                  <!-- Descrição do jogo -->
                  <p><?php
                      echo $ra->desc_jogo;
                      ?></p>
                  <!-- Avaliação geral do jogo -->
                  <h3>Avaliação Geral do Jogo: 9.0</h3>
                </div>
              </div>
            </div>

            <!-- Rodapé da modal -->
            <div class="modal-footer" style="display: flex;">

            </div>

          </div>
        <?php
      } ?>

        </div>
      </div>

      </div>
    </body>

    <script>
      var level = document.getElementById("xp").style.width;

      if (level == "98%" || !level) {
        document.getElementById('lvl').style.backgroundColor = '#4CAF50';
        document.getElementById('lvl').style.borderRight = '2px solid #91e594';
        document.getElementById('lvl').style.borderTop = '2px solid #91e594';
        document.getElementById('lvl').style.borderBottom = '2px solid #91e594';
        document.getElementById('lvl').style.color = 'white';
      }
    </script>


    <!-- ele tá vendo se a opnmodal está sendo escrita no link da pagina, se estiver com o opnmodal, ele vai
rodar o script de abrir a modal, que a primeira linha está pegando a modal, e a segunda linha está 
fazendo aparecer a modal -->
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
    <script>
      // Modal
      // Pega a modal
      var modal = document.getElementById("myModal");

      // Pega o botão e abre a modal
      var btn = document.getElementById("opnmodal");

      // Pega o elemento <span> que fecha a modal
      var span = document.getElementsByClassName("close")[0];

      // Quando clicar no botão, abre a modal

      function opnmodal() {
        // modal.style.display = "block";

      }

      // Quando o usuario cliclar no <span> (x), fechará a modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // Quando o usuario cliclar em qualquer lugar fora da modal, irá fechar
      window.onclick = function(event) {
        if (
event.target
 == modal) {
          modal.style.display = "none";
        }
      }
    </script>

</html> 