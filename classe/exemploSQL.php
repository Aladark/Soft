<?php
// esse codigo vai facilitar a minha vida como programador baiano.
// é com ele que eu vou fazer todos os campos SQL.
// MAPA:
// campo1 = nome do arquivo DAO
// $cam = as 3 primeiras letras do arquivo
// copiar e colar o set para todos os campos do banco
// copiar e colar o get para todos os campos do banco
// insert into = insert do banco
// update = update do banco
// select = select do banco 
// delete = delete do banco




// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/campo1DAO.php");

$cam = new campo1DAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cam->Set1(filter_input(INPUT_POST,''));
    $cam->Set2(filter_input(INPUT_POST,''));
    $cam->Set3(filter_input(INPUT_POST,''));
    $cam->Set4(filter_input(INPUT_POST,''));
    $cam->Set5(filter_input(INPUT_POST,''));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["salvar"]) && $_POST["salvar"] == "enviar") {
    try {
        if ($cam->Set1 > 0 ) {
			$SQL = $conexao->prepare("UPDATE FROM campo1 SET ");
            $SQL->bindParam(6, $cam->Get1(), PDO::PARAM_INT);
		}else{
        $SQL = $conexao->prepare("INSERT INTO campo1 VALUE");
        }
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindParam(1, $cam->Get2(), PDO::PARAM_INT);
        $SQL->bindParam(2, $cam->Get3(), PDO::PARAM_INT);
        $SQL->bindParam(3, $cam->Get4(), PDO::PARAM_INT);
        $SQL->bindParam(4, $cam->Get5(), PDO::PARAM_INT);
        $SQL->bindParam(5, $cam->Get6(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $cam->Set1(null);
                $cam->Set2(null);
                $cam->Set3(null);
                $cam->Set4(null);
                $cam->Set5(null);
                
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
        $SQL = $conexao->prepare("SELECT campo1 FROM");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindParam(1, $cam->Get1(), PDO::PARAM_INT);
        $SQL->bindParam(2, $cam->Get2(), PDO::PARAM_INT);
        $SQL->bindParam(3, $cam->Get3(), PDO::PARAM_INT);
        $SQL->bindParam(4, $cam->Get4(), PDO::PARAM_INT);
        $SQL->bindParam(5, $cam->Get5(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $cam->Set1($rs->);
            $cam->Set2($rs->);
            $cam->Set3($rs->);
            $cam->Set4($rs->);
            $cam->Set5($rs->);
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
        $SQL = $conexao->prepare("DELETE FROM campo1  WHERE");

        $SQL->bindParam(1, $cam->Get1(), PDO::PARAM_INT);
        $SQL->bindParam(2, $cam->Get2(), PDO::PARAM_INT);
        $SQL->bindParam(4, $cam->Get3(), PDO::PARAM_INT);
        $SQL->bindParam(5, $cam->Get4(), PDO::PARAM_INT);
        $SQL->bindParam(6, $cam->Get5(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $cam->Set1(null);
            $cam->Set2(null);
            $cam->Set3(null);
            $cam->Set4(null);
            $cam->Set5(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


