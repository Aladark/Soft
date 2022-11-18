<?php
$idamigo = 2;
include_once('../classe/MensagemSQL.php');
           
              foreach ($rs->feachALL() as $chave){
                if ($rs->fk_idusuario == 1 ) { ?>

                  <!--Bloco de mensagem do proprio usuario-->
                  <div class="contain myuser">
                    <!--A classe "right, está deixando o icone na direita, e a mensagem a esquerda"-->
                    <img src="../img/among-us-icon-png-02.png" alt="Avatar" class="right" style="width: 100%" />
                    <!--Mensagem do proprio usuario-->
                    <p><?php echo $rs->mensagem; ?></p>
                    <!--Fim da mensagem do proprio usuario-->
  
                    <!--Hora da mensagem-->
                    <span class="time-left"><?php echo $rs->hora_mensagem; ?></span>
                    <!--Fim da hora da mensagem-->
                  </div>
                  <!--Fim do bloco de mensagem do proprio usuario-->
                <?php
  
                } elseif ($rs->fk_idusuarioreceptor == 1 ) {
                ?>
                  <!--Bloco de mensagem de amigo-->
                  <div class="contain">
                    <img src="../img/verde.jpg" alt="Coloque o nick do usuario aqui" style="width: 100%" />
                    <!--Mensagem do usuario-->
                    <p><?php echo $rs->mensagem; ?></p>
                    <!--Fim da mensagem do usuario-->
  
                    <!--Hora da mensagem-->
                    <span class="time-right"><?php echo $rs->hora_mensagem; ?></span>
                    <!--Fim da hora da mensagem-->
                    <!--Bloco de mensagem de amigo-->
  
                  </div>
            <?php
                }
              }
              
          
             

              ?>