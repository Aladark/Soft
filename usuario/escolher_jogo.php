<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Jogos</title>
    <link rel="stylesheet" href="../css/jogo.css">

</head>

<body>


    <div
        style="background: rgb(2,0,36);
    background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(55,19,112,1) 100%); height: 100vh;">


        <div class="topo">
            <h1>Adicionar jogos ao seu perfil</h1>
            <input type="text" name="procurar" id="procurar">
            <button style="position: absolute; margin-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="37"
                    height="37" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>
        </div>
        <div class="divisao">
       <?php
       $buscarjogouser = 'buscar';
            include_once("../classe/JogoSQL.php");
            $i = 1;
            if ($SQL->execute()) {
                while ($rj = $SQL->fetch(PDO::FETCH_OBJ)) {
                  if($i < 7){
                    $i++;
                    ?>
                    <!-- Exemplo de bloco de codigo para o jogo -->
                    <div class="jogo">
                        <!-- mudar a url dessa "background-image" e colocar a imagem atribuida ao jogo-->
                        <!-- O id="opnmodal, faz com que seja aberto a modal com as informações do jogo e do usuario" -->
                        <button style="background-image: url(../img/Kreobio.jpg);"><a href="index.php?mr=adicionarjogos&id=<?php echo $rj->idjogo; ?>&opnmodal">gfjgh</a></button>
        
                        <!-- Nome do jogo -->
                        <p><?php echo $rj->nome_jogo;?></p>
                    </div>
<?php
                  }else{
                    $i = 1;
                  ?>
        <!-- para adicionar os jogos, primeiramente você precisa colocar a <div class="divisao", logo após isso
                colocar o limite maximo de jogos de 6, quando você coloca uma nova <div class="divisao", você coloca
                uma nova linha no "Meus Jogos" -->

        <!-- div com a class divisao -->
        </div>
        <div class="divisao">

            <!-- Exemplo de bloco de codigo para o jogo -->
            <div class="jogo">
                <!-- mudar a url dessa "background-image" e colocar a imagem atribuida ao jogo-->
                <!-- O id="opnmodal, faz com que seja aberto a modal com as informações do jogo e do usuario" -->
                <button style="background-image: url(../img/Kreobio.jpg);"><a href="index.php?mr=adicionarjogos&id=<?php echo $rj->idjogo; ?>&opnmodal">gfjgh</a></button>

                <!-- Nome do jogo -->
                <p><?php echo $rj->nome_jogo;?></p>
            </div>
            <!-------------------------------------------->
<?php
             } }}
?>
          

        <!-- Fim do bloco de codigo de exemplo, lembrando, nunca coloque mais de 6 jogos em uma divisao -->












       <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $SQL = $conexao->prepare
        ("SELECT idjogo,nome_jogo,desc_jogo,faixa_etaria,foto,AVG(avaliacao) AS MEDIA
        FROM jogo,avaliacao_jogo 
        where  jogo.idjogo = avaliacao_jogo.fk_idjogo 
        and idjogo = $id");
         $SQL->execute();
         $ra = $SQL->fetch(PDO::FETCH_OBJ);
         ?>
?>
        <div id="myModal" class="modal">

            <!-- Conteudo da modal -->
            <div class="modal-content">

                <!-- Cabeçalho da modal -->
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <!-- Nome do jogo -->
                    <h2><?php echo $ra->nome_jogo?></h2>
                </div>

                <!-- Body da modal -->
                <div class="modal-body" style="display: flex;">
                    <div class="secao" style="display: flex;">
                        <div class="imagemjogo" style="background-image: url(../img/lolback.jpg);">
                        </div>
                        
                    </div>
                    <div class="secao" style="">
                       
                            <h2 style="margin-bottom: 0;">Sobre:</h2>
                            <div class="descjogo">
                            <!-- Descrição do jogo -->
                            <p><?php echo $ra->desc_jogo?></p>
                           
                        </div>
                        <!-- Game id do usuario dentro do jogo -->
                        <h2 style="margin-bottom: 0;">Game id: Kreobio</h2>

                        <!-- Avaliação pessoal do usuario quanto ao jogo -->
                        <h3>Avaliação Pessoal do Jogo: 9.0</h3>
                        <p></p>


                         <!-- Avaliação geral do jogo -->
                         <h3>Avaliação Geral do Jogo: <?php echo $ra->MEDIA?></h3>
                         <p></p>
                         <h3>Plataformas</h3>
                        <div class="plataforma">
<?php   $SQLj = $conexao->prepare
        ("SELECT desc_platafoma FROM plataforma,jogo,plataforma_jogo
        where jogo.idjogo = plataforma_jogo.fk_idjogo
        and plataforma.idplataforma = plataforma_jogo.fk_idplataforma
        and idjogo= '$id' 
        ;");
         $SQLj->execute();
         while($rp = $SQLj->fetch(PDO::FETCH_OBJ)){
           ?>
                        <!-- Lista de plataformas -->
                        
                            <!-- Aqui neste caso, irá trocar a imagem da plataforma, apenas isso, tambem lembre-se de 
                            colocar o alt, com o nome da plataforma em questão -->
                            <img src="../img/arrow-repeat.svg" alt="">
                            <label for=""><?php $rp->desc_platafoma?></label>
                           
                       
                       
                       <?php  
         }
                       ?>
                          </div>
        <form method=post>
                        <div class="acoes" style="float: right; position: absolute;right: 20px; bottom: 15px;">
                        <button  name=escolherjogo value=<?php echo $id ?> class="add">Adicionar</button>
                        <button class="rmv">Remover</button>
        </form>
       <?php if(isset($_POST['escolherjogo'])){
        include_once('../classe/conexao.php');
        $_SESSION['id'] = 1;
        $usuaer = $_SESSION['id'];
        $SQL = $conexao->prepare("INSERT INTO meus_jogos(fk_idusuario,fk_idjogo) VALUES ($usuaer,$id);");
        $SQL->execute();
        Echo"<meta http-equiv=refresh content='0,5;
        URL=index.php?mr=adicionarjogos
        '> ";
    }?>
    </form>
      
                    </div>
                    </div>
                </div>

                <!-- Rodapé da modal -->
                <div class="modal-footer" style="display: flex;">

                </div>

            </div>

        </div>
<?php
       }
      
   ?>

    </div>
</body>

<script>

    // Modal
    // Pega a modal
    var modal = document.getElementById("myModal");

    // Pega o botão e abre a modal
    var btn = document.getElementById("opnmodal");

    // Pega o elemento <span> que fecha a modal
    var span = document.getElementsByClassName("close")[0];


    <?php
 if (isset($_GET['opnmodal'])) {
?>
    // Quando clicar no botão, abre a modal
    var modal = document.getElementById("myModal");

      modal.style.display = "block";
    // Quando o usuario cliclar no <span> (x), fechará a modal
    
    <?php
 }
?>
span.onclick = function () {
        modal.style.display = "none";
    }
    // Quando o usuario cliclar em qualquer lugar fora da modal, irá fechar
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>

</html>