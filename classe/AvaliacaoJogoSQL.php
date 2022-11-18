<?php
// esse codigo vai facilitar a minha vida como programador baiano.
// é com ele que eu vou fazer todos os campos SQL.
// MAPA:
// campo1 = nome do arquivo DAO
// $avj = as 3 primeiras letras do arquivo
// copiar e colar o set para todos os campos do banco
// copiar e colar o get para todos os campos do banco
// insert into = insert do banco
// update = update do banco
// select = select do banco 
// delete = delete do banco




// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/AvaliacaoJogoDAO.php");

$avj = new AvaliacaoJogoDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $avj->setFkIdJogo(filter_input(INPUT_POST,'avaliar'));
    $avj->setFkIdUsuario(1);
    $avj->setAvaliacao(filter_input(INPUT_POST,'avaliacao'));
    $avj->setComentario(filter_input(INPUT_POST,'descavalia'));
    $avj->setDataAvaliacao(filter_input(INPUT_POST,''));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["avaliar"])) {
    try {
        
        
			$SQL = $conexao->prepare("INSERT INTO avaliacao_jogo (fk_idjogo,fk_idusuario,avaliacao,comentario,data_avaliacao)
            VALUES (?,?,?,?, curtime()) ");
		
        
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $avj->getFkIdJogo());
        $SQL->bindValue(2, $avj->getFkIdUsuario());
        $SQL->bindValue(3, $avj->getAvaliacao());
        $SQL->bindValue(4, $avj->getComentario());
      
     
     

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $avj->setFkIdJogo(null);
                $avj->setFkIdUsuario(null);
                $avj->setAvaliacao(null);
                $avj->setComentario(null);
                $avj->setDataAvaliacao(null);
               
                
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


//====================================== BUSCAR ===============================================================

// Quando clicar no botão "buscar" e nele estiver "estoucomfome".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["buscar"]) && $_POST["buscar"] == "estoucomfome") {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT fk_idjogo,fk_idusuario,avaliacao,comentario,data_avaliacao
         FROM avaliacao_jogo
        ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindParam(1, $avj->getFkIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(2, $avj->getFkIdUsuario(), PDO::PARAM_INT);
        $SQL->bindParam(3, $avj->getAvaliacao(), PDO::PARAM_INT);
        $SQL->bindParam(4, $avj->getComentario(), PDO::PARAM_INT);
        $SQL->bindParam(5, $avj->getDataAvaliacao(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $avj->setFkIdJogo($rs->fk_idjogo);
            $avj->setFkIdUsuario($rs->fk_idusuario);
            $avj->setAvaliacao($rs->avaliacao);
            $avj->setComentario($rs->comentario);
            $avj->setDataAvaliacao($rs->data_avaliacao);
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
        $SQL = $conexao->prepare("DELETE FROM avaliacao_jogo WHERE fk_idjogo = ? and fk_idusuario = ?'
        ");

        $SQL->bindParam(1, $avj->getFkIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(2, $avj->getFkIdUsuario(), PDO::PARAM_INT);
        $SQL->bindParam(3, $avj->getAvaliacao(), PDO::PARAM_INT);
        $SQL->bindParam(4, $avj->getComentario(), PDO::PARAM_INT);
        $SQL->bindParam(5, $avj->getDataAvaliacao(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $avj->setFkIdJogo(null);
            $avj->setFkIdUsuario(null);
            $avj->setAvaliacao(null);
            $avj->setComentario(null);
            $avj->setDataAvaliacao(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


