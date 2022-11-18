<?php
include_once('chat.php');
?>

<!DOCTYPE html>
<html lang="pt-br">


  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/chat.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Document</title>
  </head>

  <body>


    <!--Abaixo está a linha que cria a aba do amigo, no "bloco de amigo selecionado" será descrito exatamente dessa forma
    "<a href="Insira o link" class="list-grou(usuario1)p-item (a classe list-group-item deve estar em qualquer bloco, independente
    se for selecionado ou não) (se quiser deixar o usuario como "selecionado", adicione a propriedade "active" a class
    <img src="link da imagem do usuario" alt"de preferencia, coloque o nick do usuario aqui" <span class="não mexa em
    nada"> agora você coloca o nick do usuario </span></a>"-->

    <!--Se quiser que o usuario indique apareça a borda de notificação, faça que nem com a classe active, adicione a
    classe "notify", lembrando que se o usuario estiver ativo, você vai ter lido a mensagem, logo não precisa da
    notificação-->





    <!--====================AMIGO EXEMPLO===============================================================================-->
    <div class="section">
      <div class="columns">
        <!--Aba de amigos-->
        <div class="col-nick">
          <div class="friend-list">
              <?php
              $apagar = null;
              $amizade = 'buscar';

              include_once('../classe/amizadeSQL.php');
              if ($SQL->execute()) {
                while ($ra = $SQL->fetch(PDO::FETCH_OBJ)) {
              ?>
                  <a value=<?php echo $ra->fk_idamigo ?> onclick="loadDoc()" name='amiguinho' href="" class="list-group-item"><img src="../img/verde.jpg" alt="" />
                    <span class="text-distance-icon">Verde</span></a>


              <?php
                }
              }
              if (isset($_POST['amiguinho'])) {
                $_SESSION['amigochat'] = $_POST['amiguinho'];
              }




              ?>


          </div>
        </div>
        <!--Fim da aba de amigos-->





        <!--========================== CHAT ===============================================================================-->


        <!--Aba de chat-->
        <div class="col-chat" id="painel">
          <div class="scroll" id="teste" style="">

            <?php
            $idamigo = 2;
            $mensagem = 'buscar';

            while ($rm = $SQL->fetch(PDO::FETCH_OBJ)) {
              if ($rm->fk_idusuario == 1 && $rm->fk_idusuarioreceptor == 2) { ?>
                <!--Bloco de mensagem do proprio usuario-->
                <div class="contain myuser">
                  <!--A classe "right, está deixando o icone na direita, e a mensagem a esquerda"-->
                  <img src="../img/among-us-icon-png-02.png" alt="Avatar" class="right" style="width: 100%" />
                  <!--Mensagem do proprio usuario-->
                  <p><?php echo $rm->mensagem; ?></p>
                  <!--Fim da mensagem do proprio usuario-->

                  <!--Hora da mensagem-->
                  <span class="time-left"><?php echo $rm->hora_mensagem; ?></span>
                  <!--Fim da hora da mensagem-->
                </div>
                <!--Fim do bloco de mensagem do proprio usuario-->
              <?php

              } elseif ($rm->fk_idusuarioreceptor == 1 && $rm->fk_idusuario == 2) {
              ?>
                <!--Bloco de mensagem de amigo-->
                <div class="contain">
                  <img src="../img/verde.jpg" alt="Coloque o nick do usuario aqui" style="width: 100%" />
                  <!--Mensagem do usuario-->
                  <p><?php echo $rm->mensagem; ?></p>
                  <!--Fim da mensagem do usuario-->

                  <!--Hora da mensagem-->
                  <span class="time-right"><?php echo $rm->hora_mensagem; ?></span>
                  <!--Fim da hora da mensagem-->
                  <!--Bloco de mensagem de amigo-->

                </div>

            <?php }
            }
            ?>
          </div>
          <!--========================== IMPUT MENSAGEM================================================================================-->
          <!--Input de texto, para o usuario inserir a mensagem-->
          <input name='mensagem' id="mensagem" class="chat-input" contenteditable="" style="margin-top: 15px"></input>
          <!--Fim do Input de texto, para o usuario inserir a mensagem-->
          <button id="enviamsg" type="submit" onclick="verifica()" style="border: none;background-color: transparent; outline: none;"><svg style="position: absolute; right: 20; bottom: 10px; cursor: pointer;" id="enviar" xmlns="
http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
          </button>
          <!--Fim da aba de chat-->


        </div>
      </div>
      <?php
      if (isset($_POST['enviarmensage'])) {
        if (!empty($_POST['mensagem'])) {
          $mensagemuser = $_POST['mensagem'];
        }
      }
      ?>
</body>


<script>
  //inserir
  $(function() {
    $("#enviamsg").click(function() {
      msg = $("#mensagem").val();

      if (msg.trim() != '') {
        $.post('chat.php', {
          mensagem: msg,
          acao: 'inserir'
        }, function(retorno) {
          $("#teste").prepend(retorno);
          $("#mensagem").val('');
        })
      }


    });


    $(function() {

$.post('chat.php', {
  acao: "atualizar"
}, function(retorno) {
  $("#teste").html(retorno)
});
    });
    //atualizar
    $alt = '20000px'
    setInterval(function() {

      $.post('chat.php', {
        acao: "atualizar"
      }, function(retorno) {
        $("#teste").html(retorno)
      });


     
//     $('#teste').animate({
//   scrollTop: $alt // aqui introduz o numero de px que quer no scroll, neste caso é a altura da propria div, o que faz com que venha para o fim
// }, 100);
    }, 500);

    $alt = '20000px'

    $('#teste').animate({
      scrollTop: $alt // aqui introduz o numero de px que quer no scroll, neste caso é a altura da propria div, o que faz com que venha para o fim
    }, 100);
  });

  $alt = '20000px'
  function verifica() {
    $('#teste').animate({
      scrollTop: $alt // aqui introduz o numero de px que quer no scroll, neste caso é a altura da propria div, o que faz com que venha para o fim
    }, 100);
  }

</script>

</html>