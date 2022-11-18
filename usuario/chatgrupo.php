<!DOCTYPE html>
<html lang="pt-br">

<?php
include_once('chatgrupoAJAX.php');
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" href="../css/chat.css" />
  <title>Chat Grupo</title>
</head>
<?php
if (isset($_GET['chatgrupo'])) {
  $_SESSION['idgrupo'] = $_GET['chatgrupo'];
} else {
  $_SESSION['idgrupo'] = "";
} ?>

<body>


  <!--Abaixo está a linha que cria a aba do amigo, no "bloco de amigo selecionado" será descrito exatamente dessa forma
    "<a href="Insira o link" class="list-group-item (a classe list-group-item deve estar em qualquer bloco, independente
    se for selecionado ou não) (se quiser deixar o usuario como "selecionado", adicione a propriedade "active" a class
    <img src="link da imagem do usuario" alt"de preferencia, coloque o nick do usuario aqui" <span class="não mexa em
    nada"> agora você coloca o nick do usuario </span></a>"-->

  <!--Se quiser que o usuario indique apareça a borda de notificação, faça que nem com a classe active, adicione a
    classe "notify", lembrando que se o usuario estiver ativo, você vai ter lido a mensagem, logo não precisa da
    notificação-->

  <style>
    .sair {
      position: absolute;
      display: none;
      width: 50%;
      margin: auto;
      padding: 20px;
      left: 25%;
      top: 20%;
      border-radius: 15px;
      border: 2px solid black;
      text-align: center;
      font-size: 40px;
      background-color: rgb(224, 212, 235, 0.9);
      color: white;
    }

    .avaliacao {
      position: absolute;
      display: none;
      width: 70%;
      padding: 20px;
      margin-left: 0;
      margin: auto;
      left: 15%;
      top: 10%;
      border-radius: 15px;
      border: 2px solid black;
      text-align: center;
      font-size: 40px;
      background-color: rgb(224, 212, 235, 0.9);
      color: white;
    }

    .avaliacao div {
      margin-left: 0;
      padding-right: 0;
    }

    .sair button {
      padding: 20px;
      font-size: 30px;
      background-color: white;
      width: 200px;
      border-radius: 15px;
      margin-left: 40px;
      margin-right: 40px;
      cursor: pointer;
      transition: .2s;
    }

    .avaliacao button {
      padding: 10px;
      font-size: 30px;
      background-color: white;
      width: 200px;
      border-radius: 15px;
      float: left;
      margin-left: 10px;
      margin-top: 40px;
      cursor: pointer;
      transition: .2s;
    }

    .sim:hover {
      background-color: chartreuse;
      border: 2px solid green;
    }

    .nao:hover {
      background-color: red;
      border: 2px solid darkred;
    }

    .pular {
      float: right !important;
    }

    .pular:hover {
      background-color: gold;
      border: 2px solid rgb(177, 150, 0);
      color: black;
    }


    /* - - - - - RATINGS */
    .rating {
      position: absolute;
      margin-top: -45px;
      margin-left: 100px;
      width: 150px;
      height: 30px;
      padding: 5px 10px;
      border-radius: 30px;
      background: #FFF;
      display: block;
      overflow: hidden;

      box-shadow: 0 1px #CCC,
        0 5px #DDD,
        0 9px 6px -3px #999;

      unicode-bidi: bidi-override;
      direction: rtl;
    }

    .rating:not(:checked)>input {
      display: none;
    }

    /* - - - - - RATE */
    #rate {
      top: -65px;
    }

    #rate:not(:checked)>label {
      cursor: pointer;
      float: right;
      width: 30px;
      height: 30px;
      display: block;

      color: rgba(0, 135, 211, .4);
      line-height: 33px;
      text-align: center;
    }

    #rate:not(:checked)>label:hover,
    #rate:not(:checked)>label:hover~label {
      color: rgba(0, 135, 211, .6);
    }

    #rate>input:checked+label:hover,
    #rate>input:checked+label:hover~label,
    #rate>input:checked~label:hover,
    #rate>input:checked~label:hover~label,
    #rate>label:hover~input:checked~label {
      color: rgba(0, 135, 211, .8);
    }

    #rate>input:checked~label {
      color: rgb(0, 135, 211);
    }

    /* - - - - - LIKE */


    #like:not(:checked)>label {
      cursor: pointer;
      float: right;
      width: 30px;
      height: 30px;
      display: block;

      color: rgba(233, 54, 40, .4);
      line-height: 33px;
      text-align: center;
    }

    #like:not(:checked)>label:hover,
    #like:not(:checked)>label:hover~label {
      color: rgba(233, 54, 40, .6);
    }

    #like>input:checked+label:hover,
    #like>input:checked+label:hover~label,
    #like>input:checked~label:hover,
    #like>input:checked~label:hover~label,
    #like>label:hover~input:checked~label {
      color: rgba(233, 54, 40, .8);
    }

    #like>input:checked~label {
      color: rgb(233, 54, 40);
    }

    .blocouser {
      width: 95%;
      background-color: white;
      margin: 10px;
      padding: 10px;
      border: 2px solid #2c2c2c;
      border-radius: 5px;
    }

    .userimg {
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 15px;
      border: 2px solid black;
      width: 70px;
      height: 70px;

    }
  </style>


  <!--Aba de chat-->
  <div class="col-chat" style="width: 100%;">
    <div id="sair" class="sair">
      <h1 style="font-size: 60px; color: black; ">Deseja mesmo sair do grupo?</h1>
      <button class="sim" onclick="sim()">Sim</button>
      <button class="nao" onclick="nao()">Não</button>
    </div>

    <div id="feito" class="sair">
      <h1 style="font-size: 60px; color: black; ">A partida acabou?</h1>
      <br><br>
      <button class="sim" onclick="simpart()">Sim</button>
      <button class="nao" onclick="naopart()">Não</button>
    </div>

    <div id="avaliacao" class="avaliacao">
      <h1 style="font-size: 60px; color: black; margin-bottom: 0; ">Avalie seus colegas &#10084;</h1>
      <p style="color: black; margin-top: 0"> Se puder, dê preferência à comentarios e avaliações do comportamento</p>
      <div style="max-height: 250px; overflow-y: auto;">
        <div class="blocouser">
          <div class="userimg" style="background-image: url(../img/among-us-icon-png-02.png)">
            <p style="margin: none; margin-left: 100px; margin-top: -1px; color: black;">Kreobio</p>
          </div>

          <textarea style="margin-top: -100px; margin-left: 230px; resize: none; font-size: 30px; " name="" id="" cols="35" maxlength="80" rows="2"></textarea>

          <!-- LIKE -->
          <section id="like" class="rating" style="position: relative;">
            <!-- FIFTH HEART -->
            <input type="radio" id="heart_5" name="like" value="5" />
            <label for="heart_5" title="Five">&#10084;</label>
            <!-- FOURTH HEART -->
            <input type="radio" id="heart_4" name="like" value="4" />
            <label for="heart_4" title="Four">&#10084;</label>
            <!-- THIRD HEART -->
            <input type="radio" id="heart_3" name="like" value="3" />
            <label for="heart_3" title="Three">&#10084;</label>
            <!-- SECOND HEART -->
            <input type="radio" id="heart_2" name="like" value="2" />
            <label for="heart_2" title="Two">&#10084;</label>
            <!-- FIRST HEART -->
            <input type="radio" id="heart_1" name="like" value="1" />
            <label for="heart_1" title="One">&#10084;</label>
          </section>

          <span style="float: right;color: red; margin-top: -40px; margin-right: 12px; font-size: 40px; cursor: pointer;">&#33;</span>

        </div>
        <div class="blocouser">
          <div class="userimg" style="background-image: url(../img/among-us-icon-png-02.png)">
            <p style="margin: none; margin-left: 100px; margin-top: -1px; color: black;">Kreobio</p>
          </div>

          <textarea style="margin-top: -100px; margin-left: 230px; resize: none; font-size: 30px; " name="" id="" cols="35" maxlength="80" rows="2"></textarea>

          <!-- LIKE -->
          <section id="like" class="rating" style="position: relative;">
            <!-- FIFTH HEART -->
            <input type="radio" id="heart_5" name="like" value="5" />
            <label for="heart_5" title="Five">&#10084;</label>
            <!-- FOURTH HEART -->
            <input type="radio" id="heart_4" name="like" value="4" />
            <label for="heart_4" title="Four">&#10084;</label>
            <!-- THIRD HEART -->
            <input type="radio" id="heart_3" name="like" value="3" />
            <label for="heart_3" title="Three">&#10084;</label>
            <!-- SECOND HEART -->
            <input type="radio" id="heart_2" name="like" value="2" />
            <label for="heart_2" title="Two">&#10084;</label>
            <!-- FIRST HEART -->
            <input type="radio" id="heart_1" name="like" value="1" />
            <label for="heart_1" title="One">&#10084;</label>
          </section>

          <span style="float: right;color: red; margin-top: -40px; margin-right: 12px; font-size: 40px; cursor: pointer;">&#33;</span>

        </div>

      </div>

      <button class="sim" id="simavali">Pronto</button>
      <button class="pular" id="pular" onclick="pular()">Pular</button>

    </div>

    <div id="listausr" class="avaliacao">
      <div style="max-height: 500px; overflow: auto;">
        <div class="blocouser">
          <div class="userimg" style="background-image: url(../img/among-us-icon-png-02.png)">
            <p style="margin: none; margin-left: 100px; margin-top: 10px; font-size: 35px; color: black; display: flex;">Kreobio <button style="margin: 0; font-size: 30px; margin-left: 550px;">Adicionar</button></p>
          </div>
        </div>
        <div class="blocouser">
          <div class="userimg" style="background-image: url(../img/among-us-icon-png-02.png)">
          <p style="margin: none; margin-left: 100px; margin-top: 10px; font-size: 35px; color: black; display: flex;">Kreobio <button style="margin: 0; font-size: 30px; margin-left: 550px;">Adicionar</button></p>
          </div>
        </div>
      </div>
    </div>
    <!--Aba de chat-->

    <div class="scroll" id="teste">

    </div>
  </div>

  <!--Input de texto, para o usuario inserir a mensagem-->
  <input name='mensagem' id="mensagem" class="chat-input" style="position: fixed; bottom: 50px; left: 20px;" contenteditable="" style="margin-top: 15px"></input>
  <!--Fim do Input de texto, para o usuario inserir a mensagem-->
  <button name='mensagemgrupos' id="enviamsg" onclick="verifica()" style="border: none;background-color: transparent; outline: none;"><svg style="position: absolute; right: 40; bottom: 60px; cursor: pointer;" id="enviar" xmlns="
http://www.w3.org/2000/svg

" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
    </svg>
  </button>
  <!--Fim do Input de texto, para o usuario inserir a mensagem-->
  </div>

  <svg id="icone1" style="position: fixed; left: 15; bottom: 10;margin-left: 15px; margin-top: 5px; cursor: pointer;" onclick="sair()" xmlns="
http://www.w3.org/2000/svg
" width="30" height="30" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
  </svg>
  <i class="bi bi-card-list" style="font-size: 30px; position: fixed; bottom: 6px; left: 70px; cursor: pointer;" onclick="listar()"></i>

  <svg id="icone2" style="margin-right: 15px; position: fixed; bottom: 10; right: 15px; margin-top: 5px; cursor: pointer; float: right;" onclick="feito()" xmlns="
http://www.w3.org/2000/svg
" width="30" height="30" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
  </svg>

  <!--Fim da aba de chat-->
  </div>
  </div>
</body>
<?php
if (isset($_POST['mensagemgrupo'])) {
  if (!empty($_POST['mensagem'])) {
    $mensagegrupo = 'confia';
    include_once("../classe/MensagemSQL.php");
  }
} ?>
</form>


<script>
  //inserir
  $(function() {
    $("#enviamsg").click(function() {
      msg = $("#mensagem").val();

      if (msg.trim() != '') {
        $.post('chatgrupoAJAX.php', {
          mensagem: msg,
          acao: 'inserir'
        }, function(retorno) {
          $("#teste").prepend(retorno);
          $("#mensagem").val('');
        })
      }


    });


    $(function() {

      $.post('chatgrupoAJAX.php', {
        acao: "atualizar"
      }, function(retorno) {
        $("#teste").html(retorno)
      });
    });
    //atualizar
    setInterval(function() {

      $.post('chatgrupoAJAX.php', {
        acao: "atualizar"
      }, function(retorno) {
        $("#teste").html(retorno)
      });




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

<script>
  function sair() {

    var sair = document.getElementById("sair");
    var feito = document.getElementById("feito");
    var avali = document.getElementById("avaliacao")
    var list = document.getElementById("listausr");

    list.style.display = "none"
    sair.style.display = "Block"
    feito.style.display = "none"
    avali.style.display = "none"

  }

  function sim() {
    window.location.href = "grupos.html";
  }

  function nao() {
    var sair = document.getElementById("sair");

    sair.style.display = "none"
  }

  function feito() {
    var feito = document.getElementById("feito");
    var sair = document.getElementById("sair");
    var avali = document.getElementById("avaliacao")
    var list = document.getElementById("listausr");

    list.style.display = "none"
    feito.style.display = "Block"
    sair.style.display = "none"
    avali.style.display = "none"
  }

  function simpart() {
    var feito = document.getElementById("feito");
    var sair = document.getElementById("sair");
    var avali = document.getElementById("avaliacao")
    var icone1 = document.getElementById("icone1")
    var icone2 = document.getElementById("icone2")
    var chat = document.getElementById("mensagem")
    var but = document.getElementById("enviamsg")
    var list = document.getElementById("listausr");

    list.style.display = "none"
    feito.style.display = "none"
    sair.style.display = "none"
    icone1.style.display = "none"
    icone2.style.display = "none"
    chat.style.display = "none"
    but.style.display = "none"
    avali.style.display = "block"


  }

  function naopart() {
    var feito = document.getElementById("feito");

    feito.style.display = "none"
  }

  function pular() {
    window.location.href = "grupos.html"
  }

  function listar() {
    var feito = document.getElementById("feito");
    var sair = document.getElementById("sair");
    var avali = document.getElementById("avaliacao")
    var list = document.getElementById("listausr");

    list.style.display = "block"
    feito.style.display = "none"
    sair.style.display = "none"
    avali.style.display = "none"
  }
</script>

</html>