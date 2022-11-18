<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/MensagemTopicoDAO.php");

$mentop = new MensagemTopicoDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mentop->setIdMensagemTopico(filter_input(INPUT_POST, ''));
    $mentop->setMensagem(filter_input(INPUT_POST, "mensagemtop"));
    $mentop->setFkIdTopico(filter_input(INPUT_POST, ''));
    $mentop->setFkIdUsuario(filter_input(INPUT_POST, ''));
    $mentop->setDataMensagem(filter_input(INPUT_POST, ''));
}

//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST['enviar'])) {

    try {
        if (!empty($_POST['mensagemtop'])) {
            $SQL = $conexao->prepare("INSERT INTO mensagem_topico (mensagem,fk_idtopico,fk_idusuario,data_mensagem) 
         VALUES (?,?,?,curtime());");


            // bindParam e uma palavra reservada 
            // que quando estiver um "?" ela vai substituir por outro valor
            // ela serve para esse tipo de caso.
            $SQL->bindValue(1, $mentop->getMensagem());
            $SQL->bindValue(2, $_SESSION['idtopico']);
            $SQL->bindValue(3, $_SESSION['id']);

            if ($SQL->execute()) {
                if ($SQL->rowCount() > 0) {
                    // Se tudo ter certo imprime uma mensagem.
                    // e apaga todas as informações que foi utilizada.
                    // para previnir erros futuros por dados ja utilizados .
                   //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                    $mentop->setIdMensagemTopico(null);
                    $mentop->setMensagem(null);
                    $mentop->setFkIdTopico(null);
                    $mentop->setFkIdUsuario(null);
                    $mentop->setDataMensagem(null);
                    $mensagem = null;
                } else {
                    // se nada ter cedo imprima uma mensagem.
                    echo "<p class=\"bg-danger\">Erro ao tentar efetivar cadastro</p>";
                }
            } else {
                // se nada ter cedo imprima uma mensagem.
                echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
            }
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}


//====================================== BUSCAR ===============================================================

// Quando clicar no botão "buscar" e nele estiver "estoucomfome".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if ($topico == "sim") {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idmensagem_topico,mensagem,data_mensagem ,fk_idusuario 
                                    FROM mensagem_topico WHERE fk_idtopico = ?;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindParam(1, $_SESSION['idtopico']);


        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            // $mentop->setIdMensagemTopico($rs->idmensagem_topico, PDO::PARAM_INT);
            // $mentop->setMensagem($rs->mensagem, PDO::PARAM_STR);
            // $mentop->setFkIdTopico($rs->data_mensagem, PDO::PARAM_INT);
            // $mentop->setFkIdUsuario($rs->fk_idusuario, PDO::PARAM_INT);
            $topico == null;
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}


//========================================= DELETE ==========================================================


// Quando clicar no botão "deletar" e nele estiver "del".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["deletar"]) && $_POST["deletar"] == "del") {
    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL = $conexao->prepare("DELETE FROM mensagem_topico WHERE idmensagem_topico = ?;");

        $SQL->bindParam(1, $mentop->getIdMensagemTopico(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $mentop->setIdMensagemTopico(null);
            $mentop->setMensagem(null);
            $mentop->setFkIdTopico(null);
            $mentop->setFkIdUsuario(null);
            $mentop->setDataMensagem(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}
