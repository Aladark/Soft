<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/contareceberDAO.php");

$conrec = new contareceberDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conrec->SetIdContaReceber(filter_input(INPUT_POST,''));
    $conrec->SetValor(filter_input(INPUT_POST,''));
    $conrec->SetDataRecebimento(filter_input(INPUT_POST,''));
    $conrec->SetFkVendaUsuario(filter_input(INPUT_POST,''));
    $conrec->SetFkIdVenda(filter_input(INPUT_POST,''));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["salvar"]) && $_POST["salvar"] == "enviar") {
    try {
        
        $SQL = $conexao->prepare("INSERT INTO conta_receber(valor,data_recebimento,fk_venda_usuario,fk_venda_usuario) 
        VALUES (?,?,?,?);
        ");
        
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindParam(2, $conrec->GetValor(), PDO::PARAM_INT);
        $SQL->bindParam(3, $conrec->GetDataRecebimento(), PDO::PARAM_INT);
        $SQL->bindParam(4, $conrec->GetFkVendaUsuario(), PDO::PARAM_INT);
        $SQL->bindParam(5, $conrec->GetFkIdVenda(), PDO::PARAM_INT);
     

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $conrec->SetIdContaReceber(null);
                $conrec->SetValor(null);
                $conrec->SetDataRecebimento(null);
                $conrec->SetFkVendaUsuario(null);
                $conrec->SetFkIdVenda(null);
                
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
        $SQL = $conexao->prepare("SELECT idconta_receber,valor,data_recebimento,fk_venda_usuario,fk_idvenda 
        FROM conta_receber;
        ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindParam(1, $conrec->GetIdContaReceber(), PDO::PARAM_INT);
        $SQL->bindParam(2, $conrec->GetValor(), PDO::PARAM_INT);
        $SQL->bindParam(3, $conrec->GetDataRecebimento(), PDO::PARAM_INT);
        $SQL->bindParam(4, $conrec->GetFkVendaUsuario(), PDO::PARAM_INT);
        $SQL->bindParam(5, $conrec->GetFkIdVenda(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $conrec->SetIdContaReceber($rs->idconta_receber);
            $conrec->SetValor($rs->valor);
            $conrec->SetDataRecebimento($rs->data_recebimento);
            $conrec->SetFkVendaUsuario($rs->fk_venda_usuario);
            $conrec->SetFkIdVenda($rs->fk_idvenda);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}
