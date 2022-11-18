

        <!-- Div para mostrar em qual parte do site você está. Por exemplo, "Chamados" -->
        <div class="titlescreen">
            <h1>Chamados</h1>
        </div>

        <!-- Tabela mostrando as informações -->
        <div class="inputscreen">

            <div class="table-responsive y-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">fk_idusuario</th>
                            <th scope="col">fk_idgrupos</th>
                            <th scope="col">avaliacao</th>
                            <th scope="col">comenatario</th>
                            <th scope="col">denuncia</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <form method=post>
                    <?php
                    $avaliar = 'nao';
                    include_once('../classe/AvaliacaoUsuarioSQL.php');
                    if($SQL->execute()){
                      while ($rj = $SQL->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    

                            <!-- Quando se adicionar um botão, sempre coloque a classe "btn", caso deseje alguma cor
                        especifica, por exemplo, vermelho, adicione a classe "btnred"; Existem apenas tem cores:
                        btnyellow (amarelo), 
                        btnred (vermelho), 
                        btngreen (verde); 
                    
                    Siga os 3 exemplos abaixo para não haver erro
                
                Inclusive, caso queira que o botão ative a modal, coloque o id "opnmodal" ao botão que
            você quer ativar a modal-->

                      
                     
                        <tr>
                            <td><?php echo $rj->login ?></td>
                            <td><?php echo $rj->nome_grupo ?></td>
                            <td><?php echo $rj->avaliacao ?></td>
                            <td><?php echo $rj->comenatario ?></td>
                            <td><?php echo $rj->denuncia ?></td>
                            <td align="right">
                                <button name=positivo value=<?php $rj->idavaliativo_usuario;?> class="btn btnred">positivo</button>
                            </td>
                            <td align="right">
                                <button name=negativo value=<?php $rj->idavaliativo_usuario;?> class="btn btngreen">negativo</button>
                            </td>
                        </tr>
                       
                        </tr>
                    </tbody>
                    <?php
                    }}
                    ?>
                     </form>
                </table>
            </div>

        </div>
<?php
if(isset($_POST['negativo'])){
  $idavaliacao = $_POST['negativo'];
$avaliado = 'não';

}
if(isset($_POST['positivo'])){
$avaliado = 'sim';
$idavaliacao = $_POST['positivo'];
}
?>


        <!-- A modal -->
        <div id="myModal" class="modal">

            <!-- Conteudo da modal -->
            <div class="modal-content">

                <!-- Cabeçalho da modal -->
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Modal Header</h2>
                </div>

                <!-- Body da modal -->
                <div class="modal-body">
                    <p>Some text in the Modal Body</p>
                    <p>Some other text...</p>
                </div>

                <!-- Rodapé da modal -->
                <div class="modal-footer">
                    <h3>Modal Footer</h3>
                </div>
            </div>

        </div>

        <!-- Botão para abrir o menu lateral -->
        <button class="btnmenu" id="nav-toggle"></button>

    </div>



</body>

<script>

    // script para rodar o menu lateral

    $('#nav-toggle').click(function (e) {
        e.stopPropagation();
        $(".menu").toggleClass('bar')
        $("#nav-toggle").toggleClass('btnposi')
    });
    $('body').click(function (e) {
        if ($('.menu').hasClass('bar')) {
            $("#nav-toggle").toggleClass('btnposi')
            $(".menu").toggleClass('bar')
        }
    })
    // -------------------------------------- //

    // Modal

    // Pega a modal
    var modal = document.getElementById("myModal");

    // Pega o botão e abre a modal
    var btn = document.getElementById("opnmodal");

    // Pega o elemento <span> que fecha a modal
    var span = document.getElementsByClassName("close")[0];

    // Quando clicar no botão, abre a modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // Quando o usuario cliclar no <span> (x), fechará a modal
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