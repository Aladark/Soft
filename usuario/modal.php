<?php
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}

?>

      </div>
      <!-- A modal -->
      <div id="myModal" class="modal">
          
        <!-- Conteudo da modal -->
        <div class="modal-content">
<?php
 $buscarjogouser = null;
 $estapreenchido = null;
 $buscarjogouser = null;
 $buscarjogo = null;
 $modaljogo = 'buscar';
 include('../classe/jogoSQL.php');
?>
          <!-- Cabeçalho da modal -->
          <div class="modal-header">
            <span class="close">&times;</span>
            <!-- Nome do jogo -->
            <h2><?php echo $joguin; ?></h2>
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
                echo $Jog->GetDescJogo();
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

      </div>
      <script>
      var level = document.getElementById("xp").style.width;

      if (level == "98%" || !level) {
        document.getElementById('lvl').style.backgroundColor = '#4CAF50';
        document.getElementById('lvl').style.borderRight = '2px solid #91e594';
        document.getElementById('lvl').style.borderTop = '2px solid #91e594';
        document.getElementById('lvl').style.borderBottom = '2px solid #91e594';
        document.getElementById('lvl').style.color = 'white';
      }

      // Modal
      // Pega a modal
      var modal = document.getElementById("myModal");

      // Pega o botão e abre a modal
      var btn = document.getElementById("opnmodal");

      // Pega o elemento <span> que fecha a modal
      var span = document.getElementsByClassName("close")[0];

      // Quando clicar no botão, abre a modal
      
     function opnmodal() {
        modal.style.display = "block";
        
    } 

      // Quando o usuario cliclar no <span> (x), fechará a modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // Quando o usuario cliclar em qualquer lugar fora da modal, irá fechar
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>