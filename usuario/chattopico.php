<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/chat.css" />
  <title>Document</title>
</head>

<?php
if(isset($_GET['idtopico'])) {
  $_SESSION['idtopico'] = $_GET['idtopico'];
  
} else {
  $_SESSION['idtopico'] = "";
}
?>
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
      height: 50%;
      margin: auto;
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
      height: 70%;
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
    }

    .userimg {
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 15px;
      border: 2px solid black;
      width: 60px;
      height: 70px;

    }
  </style>
 <div class="scroll">
  <!--Aba de chat-->
  <div style="background: rgb(172,148,220);
  background: linear-gradient(144deg, rgba(172,148,220,1) 0%, rgba(224,212,235,1) 100%); height: 100vh;">
    <div style="width: 800px; margin: auto;">
    <?php
    $topico = "sim";
     include_once('../classe/MensagemtopicoSQL.php');
         
     while ($rm = $SQL->fetch(PDO::FETCH_OBJ)) {
        if($rm->fk_idusuario = $_SESSION['id']){
?>
      <!--Bloco de mensagem do proprio usuario-->
      <div class="contain myuser">
          <!--A classe "right, está deixando o icone na direita, e a mensagem a esquerda"-->
          <img src="../img/among-us-icon-png-02.png" alt="Avatar" class="right" style="width: 100%" />
          <!--Mensagem do proprio usuario-->
          <p><?php echo $rm->mensagem?></p>
          <!--Fim da mensagem do proprio usuario-->

          <!--Hora da mensagem-->
          <span class="time-left"><?php echo $rm->data_mensagem?></span>
          <!--Fim da hora da mensagem-->
        </div>
        <!--Fim do bloco de mensagem do proprio usuario-->
      
<?php
}elseif($rm->fk_idusuario != $_SESSION['id']){
  ?><!--Bloco de mensagem de amigo-->
        <div class="contain">
          <img src="../img/verde.jpg" alt="Coloque o nick do usuario aqui" style="width: 100%" />
          <!--Mensagem do usuario-->
          <p><?php echo $rm->mensagem?></p>
          <!--Fim da mensagem do usuario-->

          <!--Hora da mensagem-->
          <span class="time-right"><?php echo $rm->data_mensagem?></span>
          <!--Fim da hora da mensagem-->
        </div>
        <!--Bloco de mensagem de amigo-->
<?php
}

}
?>   
<form method=post>
      <!--Input de texto, para o usuario inserir a mensagem-->
      <input name=mensagemtop class="chat-input" contenteditable="" style="margin-top: 15px; padding-right: 40px; "></input>
      <button type=submit name="enviar" style="border: none;background-color: transparent; outline:none ;"><svg
          style="position: absolute; right: 330px; bottom: 50px; cursor: pointer;"
          xmlns="
http://www.w3.org/2000/svg
" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-circle"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
        </svg>
      </button>
      <!--Fim do Input de texto, para o usuario inserir a mensagem-->
    </div>
    <?php
      if (isset($_POST['enviar'])) {
        if (!empty($_POST['mensagemtop'])) {

      
      }}
      ?>

    <!--Fim da aba de chat-->
  </div>
    </form>
</body>


</html>