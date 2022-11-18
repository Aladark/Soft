<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../dao/plataformaDAO.php");
include_once("../dao/JogoDAO.php");
include_once("../dao/PlataformaJogoDAO.php");

$plajog = new PlataformaJogoDAO;
$pla = new plataformaDAO;
$Jog = new JogoDAO;


// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$plajog->SetfkIdJogo(3);
    $plajog->SetfkIdPlataforma(filter_input(INPUT_POST,"$p"));
    $plajog->SetfkIdJogo(filter_input(INPUT_POST,"$idjogo"));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["escolherplataforma"])) {
    try {
     
        $SQL = $conexao->prepare("INSERT INTO plataforma_jogo(fk_idjogo,fk_idplataforma) VALUES (?,?);");
        
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $_SESSION['idjogo']);
        $SQL->bindValue(2, $_SESSION['pla']);

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $plajog->SetfkIdJogo(null);
                $pla->SetIdPlataforma(null);
                $_SESSION['idjogo'] = null;
                $_SESSION['pla'] = null;
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
        $SQL = $conexao->prepare("SELECT fk_idjogo,fk_idplataforma FROM plataforma_jogo;
        ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindParam(1, $jog->GetIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(2, $pla->GetIdPlataforma(), PDO::PARAM_INT);


        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $plajog->SetFkIdJogo($rs->fk_idjogo);
            $plajog->SetFkIdPlataforma($rs->fk_idplataforma);
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
        $SQL = $conexao->prepare("DELETE FROM plataforma_jogo WHERE fk_idjogo = ? AND fk_idplataforma = ?;
        ");

        $SQL->bindParam(1, $jog->GetIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(2, $pla->GetIdPlataforma(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $plajog->SetFkIdJogo(null);
            $plajog->SetFkIdPlataforma(null);
        
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


