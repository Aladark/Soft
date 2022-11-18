<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link rel="stylesheet" href="
https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css
">
  <title>Escolher Jogos</title>

</head>

<body>
  <!--Inicio da header (cabeçalho)-->
  <div class="section">
    <header id="nav" class="sticky-nav">

      <nav class="container">

        
        <ul role="list" class="nav-grid">
        <a style="width: 10px; position: absolute; left: 0; top: 20px; font-size: 20px;" href="../index.php">Sair</a> 
          <li id="w-node-_151d960c-bb04-cfc3-fd7d-356ce1fa0176-31e55b4d" class="list-item-3">
            <!--link junto com a logo-->
            <a href="../index.php" class="nav-logo-link">
              <img src="../img/logo.png" sizes="(max-width: 479px) 80.296875px, 81.65625px"
                srcset="../img/logo.png 735w" alt="HomePage" class="nav-logo" /></a>
            <!--Fim link junto com a logo-->
          </li>
          <!--l ink do cadastrar e login-->
          <li class="list-item">
            <a href="index.php?mr=grupo" alt="Perfil" class="nav-link">Grupos</a>
          </li>
          <li class="list-item">
            <a href="index.php?mr=topico" alt="Perfil" class="nav-link">Tópicos</a>
          </li>
          <li class="list-item">
            <a href="index.php?mr=loja" alt="Perfil" class="nav-link">Loja</a>
          </li>
          <li class="list-item">
            <a href="index.php?mr=adicionarjogos" alt="Perfil" class="nav-link">Jogos</a>
          </li>
          <li class="list-item">
            <a href="#" alt="Notificação" class="nav-link">
              <i id="sino" onmouseover="sino()" onmouseleave="sinofora()"  onclick="opnmodaltopo()" class="bi bi-bell"></i>
            </a>
          </li>



          <li class="list-item">
            <a href="index?mr=chat.php" alt="Chat" class="nav-link">
              <i id="msg" class="bi bi-chat-left" onmouseover="msg()" onmouseleave="msgfora()"></i>
            </a>
          </li>

          <li class="list-item">
            <a href="index.php?mr=perfil" alt="Perfil" class="nav-link">Nome</a>
          </li>
          


          <!--Fim link do cadastrar e login-->
        </ul>
      </nav>
    </header>

  </div>
  <div id="modaltopo" style="display: none;">
        <div class="modaltopo">

        </div>
        <div class="setamodaltopo"></div>
      </div>
  <script>

    function sino() {
      var sino = document.getElementById("sino")

      sino.classList.add("bi-bell-fill")
      sino.classList.remove("bi-bell")
    }

    function sinofora() {
      var sino = document.getElementById("sino")

      sino.classList.remove("bi-bell-fill")
      sino.classList.add("bi-bell")
    }

    function msg() {
      var msg = document.getElementById("msg")

      msg.classList.add("bi-chat-left-fill")
      msg.classList.remove("bi-chat-left")
    }

    function msgfora() {
      var msg = document.getElementById("msg")

      msg.classList.remove("bi-chat-left-fill")
      msg.classList.add("bi-chat-left")
    }
    

    function opnmodaltopo() {
    var modaltopo = document.getElementById("modaltopo")

      if (modaltopo.style.display === "none"){
      modaltopo.style.display = "block"}

      else {modaltopo.style.display = "none"}

    }

  


  </script>

  <style>
    /* width */
    .modaltopo::-webkit-scrollbar {
      width: 5px;
    }

    /* Track */
    .modaltopo::-webkit-scrollbar-track {
      box-shadow: inset 0 0 5px #b8bfc6;
      border-radius: 10px;
    }

    /* Handle */
    .modaltopo::-webkit-scrollbar-thumb {
      background: #2f3e56;
      border-radius: 10px;
    }

    /* Handle on hover */
    .modaltopo::-webkit-scrollbar-thumb:hover {
      background: #151e2b;
    }

    /* Header */
    body {
      display: block;
      font-family: sans-serif;
      margin: 0;
    }

    .nav-logo-link {
      display: block;
      height: 60px;
      width: 10px;
      margin-right: 0px;
      margin-left: 0px;
      padding: 0px;
    }

    .nav-logo {
      height: 125%;
      -o-object-fit: contain;
      object-fit: contain;
    }

    .section {
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-box-pack: start;
      -webkit-justify-content: flex-start;
      -ms-flex-pack: start;
      justify-content: flex-start;
    }

    .nav-grid {
      display: -ms-grid;
      display: grid;
      height: 75px;
      -webkit-box-pack: start;
      -webkit-justify-content: flex-start;
      -ms-flex-pack: start;
      justify-content: flex-start;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-align-content: stretch;
      -ms-flex-line-pack: stretch;
      align-content: stretch;
      grid-auto-flow: column;
      grid-auto-columns: -webkit-max-content;
      grid-auto-columns: max-content;
      grid-column-gap: 20px;
      grid-row-gap: 20px;
      -ms-grid-columns: 1fr -webkit-max-content -webkit-max-content -webkit-max-content;
      -ms-grid-columns: 1fr max-content max-content max-content;
      grid-template-columns: 1fr -webkit-max-content -webkit-max-content -webkit-max-content;
      grid-template-columns: 1fr max-content max-content max-content;
      -ms-grid-rows: auto;
      grid-template-rows: auto;
      border-radius: 0px;
      list-style-type: disc;

      padding-left: 0;
      list-style: none;
    }

    .sticky-nav {
      position: relative;
      display: block;
      float: none;
      clear: none;
      background-color: transparent;
      text-align: left;
    }

    .container {
      margin-left: auto;
      margin-right: auto;
      max-width: 940px;
    }

    .section {
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-box-pack: start;
      -webkit-justify-content: flex-start;
      -ms-flex-pack: start;
      justify-content: flex-start;
      background-color: #1e293b;
    }

    .nav-link {
      display: block;
      margin-right: 0px;
      margin-left: 0px;
      padding: 10px 0px;
      outline-color: #ececec;
      outline-offset: 0px;
      outline-style: none;
      outline-width: 3px;
      color: #ececec;
      text-decoration: none;
    }

    .nav-link:hover {
      text-decoration: underline;
    }


    .list-item {
      font-size: 30px;
    }

    .list-item-3 {
      padding-bottom: 29px;
    }

    ul {
      margin-block-start: 0em;
      margin-block-end: 0em;
      padding-inline-start: 40px;
    }

    /*----------------------------------------*/

    .modaltopo {
    

      width: 20%;
      height: 400px;
      max-height: 400px;
      position: absolute;
      right: 380px;
      top: 80px;
      border: 2px solid black;
      background-color: white;

      padding: 10px;
      border-radius: 5px;
      text-align: center;
      overflow-y: auto;
      overflow-x: hidden;
    }

    .setamodaltopo {
 
      
      position: absolute;
      width: 20px;
      height: 20px;
      border-left: 2px solid black;
      border-top: 2px solid black;
      right: 404px;
      top: 69px;
      transform: rotate(45deg);
      background-color: white;

    }

    #modaltopo {
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s;

      display: none;
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @keyframes animatetop {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

  </style>
</body>

</html> 