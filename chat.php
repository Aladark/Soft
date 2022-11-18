<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("../classe/conexao.php");
include_once("../DAO/MensagemDAO.php");

$men = new MensagemDAO;
$_SESSION['amigochat'] = 2;
$_SESSION['id'] = 1;
// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $men->setData_Mensagem(filter_input(INPUT_POST,''));
    $men->setFk_IdGrupos(null);
    $men->setData_Mensagem(filter_input(INPUT_POST,''));
}


//============================================= SALVAR =========================================================
error_reporting(0);
if ($_POST['acao'] == 'inserir'){
  $men->setMensagem(filter_input(INPUT_POST ,'mensagem'));
    try {
        
      $SQL = $conexao->prepare(" INSERT INTO mensagem 
      (fk_idusuario,mensagem,hora_mensagem,data_mensagem,fk_idusuarioreceptor)
       VALUES(?,?,curtime(),curdate(),?)");
      // bindParam e uma palavra reservada 
      // que quando estiver um "?" ela vai substituir por outro valor
      // ela serve para esse tipo de caso.
      $SQL->bindValue(1, $_SESSION['id']);
      $SQL->bindValue(2, $men->GetMensagem());
      $SQL->bindValue(3, $_SESSION['amigochat']);


      $minhamsg = $men->GetMensagem();
      $meuamg = $_SESSION['amigochat'];


      if ($SQL->execute()) {
          if ($SQL->rowCount() > 0) {

            $rm = $SQL->fetch(PDO::FETCH_OBJ)
            ?>
                <!--Bloco de mensagem do proprio usuario-->
                <div class="contain myuser">
                  <!--A classe "right, está deixando o icone na direita, e a mensagem a esquerda"-->
                  <img src="../img/among-us-icon-png-02.png" alt="Avatar" class="right" style="width: 100%" />
                  <!--Mensagem do proprio usuario-->
                  <p><?php echo $minhamsg ?></p>
                  <!--Fim da mensagem do proprio usuario-->

                  <!--Hora da mensagem-->
                  <span class="time-left"><?php echo 'hora' ?></span>
                  <!--Fim da hora da mensagem-->
                </div>
                <!--Fim do bloco de mensagem do proprio usuario-->
              <?php
              $men->setFk_IdUsuario(null);
              $men->setMensagem(null);
              $men->setData_Mensagem(null);
              $men->setFk_IdUsuarioReceptor(null);
              $men->setFk_IdGrupos(null);

          } else {
              // se nada ter cedo imprima uma mensagem.
              echo "<p class=\"bg-danger\">Erro ao tentar efetivar cadastro</p>";
          }
      } else {
          // se nada ter cedo imprima uma mensagem.
          echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
      }
  } catch (PDOException $erro) {
      echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
  }
}


if ($_POST['acao'] == 'atualizar'){
      try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT fk_idusuario,fk_idusuarioreceptor,mensagem,data_mensagem,hora_mensagem 
        FROM usuario,  mensagem
        where mensagem.fk_idusuario = usuario.idusuario 
        order by mensagem.data_mensagem, mensagem.hora_mensagem
                            ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        //$SQL->bindValue(1, $men->getFk_IdUsuario());
        //$SQL->bindValue(1, $_SESSION['amigochat']);
  
        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes set.
            // echo "<p class=\"bg-success\">Dados buscado com sucesso!</p>";
            //$rs = $SQL->fetch(PDO::FETCH_OBJ);
            //$men->setMensagem($rs->mensagem );
            //$men->setData_Mensagem($rs->data_mensagem);
            $mensagem = null;
         ?>
         <?php
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
         <?php
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
    
  }




// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
// if (isset($_POST['fsafsafsa'])) {
//     try {
        
//         $SQL = $conexao->prepare(" INSERT INTO mensagem 
//         (fk_idusuario,mensagem,hora_mensagem,data_mensagem,fk_idusuarioreceptor)
//          VALUES(?,?,curtime(),curdate(),?)");
//         // bindParam e uma palavra reservada 
//         // que quando estiver um "?" ela vai substituir por outro valor
//         // ela serve para esse tipo de caso.
//         $SQL->bindValue(1, $_SESSION['id']);
//         $SQL->bindValue(2, $men->GetMensagem());
//         $SQL->bindValue(3, $_SESSION['amigochat']);


//         if ($SQL->execute()) {
//             if ($SQL->rowCount() > 0) {
//                 // Se tudo ter certo imprime uma mensagem.
//                 // e apaga todas as informações que foi utilizada.
//                 // para previnir erros futuros por dados ja utilizados .
                
//                 $men->setFk_IdUsuario(null);
//                 $men->setMensagem(null);
//                 $men->setData_Mensagem(null);
//                 $men->setFk_IdUsuarioReceptor(null);
//                 $men->setFk_IdGrupos(null);

//             } else {
//                 // se nada ter cedo imprima uma mensagem.
//                 echo "<p class=\"bg-danger\">Erro ao tentar efetivar cadastro</p>";
//             }
//         } else {
//             // se nada ter cedo imprima uma mensagem.
//             echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
//         }
//     } catch (PDOException $erro) {
//         echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
//     }
// }


//====================================== BUSCAR ===============================================================

// Quando clicar no botão "buscar" e nele estiver "estoucomfome".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
// if($mensagem == 'buscar'){
//     try {
//         // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
//         $SQL = $conexao->prepare("SELECT fk_idusuario,fk_idusuarioreceptor,mensagem,data_mensagem,hora_mensagem 
//         FROM usuario,  mensagem
//         where mensagem.fk_idusuario = usuario.idusuario 
//         order by mensagem.data_mensagem, mensagem.hora_mensagem
//                             ");
//         // bindParam e uma palavra reservada 
//         // que quando estiver um "?" ela vai substituir por outro valor
//         // ela serve para esse tipo de caso
//         //$SQL->bindValue(1, $men->getFk_IdUsuario());
//         //$SQL->bindValue(1, $_SESSION['amigochat']);

//         if ($SQL->execute()) {
//             // Se tudo ter certo imprime uma mensagem.
//             // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
//             // como ele esta retornado algo do banco, utlizaremos as funçoes set.
//             // echo "<p class=\"bg-success\">Dados buscado com sucesso!</p>";
//             //$rs = $SQL->fetch(PDO::FETCH_OBJ);
//             //$men->setMensagem($rs->mensagem );
//             //$men->setData_Mensagem($rs->data_mensagem);
//             $mensagem = null;
//         } else {
//             // se nada ter cedo imprima uma mensagem.
//             echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
//         }
//     } catch (PDOException $erro) {
//         echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
//     }}



// //========================================= DELETE ==========================================================


// // Quando clicar no botão "deletar" e nele estiver "del".
// // O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
// if (isset($_POST["deletar"])) {
//     try {
//         // bindParam e uma palavra reservada 
//         // que quando estiver um "?" ela vai substituir por outro valor
//         // ela serve para esse tipo de caso
//         $SQL = $conexao->prepare("DELETE FROM mensagem WHERE fk_idusuario = ?
//                                         AND fk_idusuarioreceptor = ? 
//                                         AND mensagem = '?';");

//         $SQL->bindParam(1, $Men->getFk_IdUsuario(), PDO::PARAM_INT);
//         $SQL->bindParam(2, $Men->getFk_IdUsuarioReceptor(), PDO::PARAM_INT);
//         $SQL->bindParam(3, $Men->getMensagem(), PDO::PARAM_STR);

//         if ($SQL->execute()) {
//             // Se tudo ter certo imprime uma mensagem.
//             // e apaga todas as informações que foi utilizada.
//             // para previnir erros futuros por dados ja utilizados .
//             echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
//             $Men->setFk_IdUsuario(null);
//             $Men->setFk_IdUsuarioReceptor(null);
//             $Men->setMensagem(null);
//         } else {
//             // se nada ter cedo imprima uma mensagem.
//             echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
//         }
//     } catch (PDOException $erro) {
//         echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
//     }
// }