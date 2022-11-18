<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/vendaDAO.php");

$ven = new vendaDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ven->SetIdVenda(filter_input(INPUT_POST, ''));
    $ven->SetDataVenda(filter_input(INPUT_POST, ''));
    $ven->SetFkIdUsuario(1);
    $ven->SetFkIdFormaPagamento(1);
    $ven->SetFkItem(filter_input(INPUT_POST, 'iditem'));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["venda"])) {
    
    try {

        $SQL = $conexao->prepare("INSERT INTO venda(data_venda,fk_idusuario,fk_idforma_pagamento,fk_Item) VALUES (curtime(),?,1,?);");


        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.

        $SQL->bindValue(1, $ven->GetFkIdUsuario(), PDO::PARAM_INT);
       //$SQL->bindValue(2, $ven->GetFkIdFormaPagamento());
        $SQL->bindValue(2, $ven->GetFkItem(), PDO::PARAM_INT);


        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $ven->SetIdVenda(null);
                $ven->SetDataVenda(null);
                $ven->SetFkIdUsuario(null);
                $ven->SetFkIdFormaPagamento(null);
                $ven->SetFkItem(null);
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
if ($verificarvenda == "buscar") {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idvenda,data_venda,fk_idusuario,fk_idforma_pagamento,desc_item
        FROM venda,item
        where venda.fk_Item = item.idItem
        and venda.fk_idusuario = ?;
        ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindValue(1, 1);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $ven->SetIdVenda($rs->idvenda);
            $ven->SetDataVenda($rs->data_venda);
            $ven->SetFkIdUsuario($rs->fk_idusuario);
            $ven->SetFkIdFormaPagamento($rs->fk_idforma_pagamento);
            $ven->SetFkItem($rs->desc_item);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}
