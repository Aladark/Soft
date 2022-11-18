<?php

// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/MeusJogosDAO.php");

$meujog = new MeusJogosDAO;
$_SESSION['id'] = 1;
// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $meujog->SetFkIdjogo(filter_input(INPUT_POST,'escolherjogo'));
    $meujog->SetFkIdusuario($_SESSION['id']);
    $meujog->SetNickJogo(filter_input(INPUT_POST,''));

}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST['escolherjogo'])) {
    try {

        $SQL = $conexao->prepare("INSERT INTO meus_jogos(fk_idusuario,fk_idjogo) VALUES (?,?);");
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $meujog->GetFkIdusuario());
        $SQL->bindvalue(2, $meujog->GetFkidJogo());

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $meujog->SetFkIdjogo(null);
                $meujog->SetFkIdusuario(null);
                $meujog->SetNickJogo(null);
                $_SESSION['idjogo'] = NULL;
                $oqd = null;
      
                
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
if ($buscarmeujogo == 'buscar') {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQLu = $conexao->prepare("SELECT nick_jogo,nome_jogo,fk_idjogo
        FROM meus_jogos,jogo
        WHERE meus_jogos.fk_idjogo = jogo.idjogo
        AND fk_idusuario = ?;
        ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
       
        $SQLu->bindValue(1, $_SESSION['id']);
        

        if ($SQLu->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
           // echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rb = $SQLu->fetch(PDO::FETCH_OBJ);
            $meujog->SetFkIdjogo($rb->fk_idjogo);
            
            $buscarmeujogo = null;
            $_SESSION['idjogo'] = NULL;
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
if ($oq == 'del' && $_SESSION['idjogouser'] != null) {
    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL = $conexao->prepare("DELETE FROM meus_jogos 
                                    WHERE fk_idusuario = ?  
                                    AND fk_idjogo = ? ;");

       
        $SQL->bindValue(1, $meujog->GetFkIdusuario());
        $SQL->bindValue(2, $_SESSION['idjogouser']);
        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $meujog->SetFkIdjogo(null);
            $meujog->SetFkIdusuario(null);
            $meujog->SetNickJogo(null);
            $_SESSION['idjogouser'] = NULL;
            $oq = null;
     
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }}
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


