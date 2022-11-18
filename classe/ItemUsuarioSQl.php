<?php
// esse codigo vai facilitar a minha vida como programador baiano.
// é com ele que eu vou fazer todos os campos SQL.
// MAPA:
// campo1 = nome do arquivo DAO
// $Itu = as 3 primeiras letras do arquivo
// copiar e colar o set para todos os campos do banco
// copiar e colar o get para todos os campos do banco
// insert into = insert do banco
// update = update do banco
// select = select do banco 
// delete = delete do banco




// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/ItemUsuarioDAO.php");

$Itu = new ItemJogo;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Itu->setIdItemUsuario(filter_input(INPUT_POST,''));
    $Itu->setDescItem(filter_input(INPUT_POST,''));
    $Itu->setValor(filter_input(INPUT_POST,''));
    $Itu->setDataVenda(filter_input(INPUT_POST,''));
    $Itu->setFkIdJogo(filter_input(INPUT_POST,''));
    $Itu->setFkUsuarioVendedor(filter_input(INPUT_POST,''));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["salvar"]) && $_POST["salvar"] == "enviar") {
    try {
        if ($Itu->setIdItemUsuario > 0 ) {
			$SQL = $conexao->prepare("UPDATE  item_usuario SET desc_item = ?, valor = ? ,fk_idjogo = ?
             WHERE iditem_usuario = ? ");
            $SQL->bindParam(1, $Itu->getIdItemUsuario);
		}else{
        $SQL = $conexao->prepare("INSERT INTO item_usuario(desc_item,valor,fk_idjogo)
         VALUES (?,?,?)");
        }
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindParam(2, $Itu->getDescItem(), PDO::PARAM_STR);
        $SQL->bindParam(3, $Itu->getValor(), PDO::PARAM_INT);
        $SQL->bindParam(4, $Itu->getDataVenda(), PDO::PARAM_INT);
        $SQL->bindParam(5, $Itu->getFkIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(6, $Itu->getFkUsuarioVendedor(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $Itu->setIdItemUsuario(null);
                $Itu->setDescItem(null);
                $Itu->setValor(null);
                $Itu->setDataVenda(null);
                $Itu->setFkIdJogo(null);
                $Itu->setFkUsuarioVendedor(null);
                
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
        $SQL = $conexao->prepare("SELECT desc_item,valor,data_venda,fk_idjogo FROM item_usuario 
        WHERE iditem_usuario = ?");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindParam(1, $Itu->getIdItemUsuario(), PDO::PARAM_INT);
        $SQL->bindParam(2, $Itu->getDescItem(), PDO::PARAM_STR);
        $SQL->bindParam(3, $Itu->getValor(), PDO::PARAM_INT);
        $SQL->bindParam(4, $Itu->getDataVenda(), PDO::PARAM_INT);
        $SQL->bindParam(5, $Itu->getFkIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(6, $Itu->getFkUsuarioVendedor(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $Itu->setIdItemUsuario($rs->IdItem_Usuario);
            $Itu->setDescItem($rs->Desc_Item);
            $Itu->setValor($rs->Valor);
            $Itu->setDataVenda($rs->Data_Venda);
            $Itu->setFkIdJogo($rs->Fk_IdJogo);
            $Itu->setFkUsuarioVendedor($rs->Fk_Usuario_Vendedor);
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
        $SQL = $conexao->prepare("DELETE FROM item_usuario
         WHERE iditem_usuario = ?");

        $SQL->bindParam(1, $Itu->getIdItemUsuario(), PDO::PARAM_INT);
        $SQL->bindParam(2, $Itu->getDescItem(), PDO::PARAM_STR);
        $SQL->bindParam(3, $Itu->getValor(), PDO::PARAM_INT);
        $SQL->bindParam(4, $Itu->getDataVenda(), PDO::PARAM_INT);
        $SQL->bindParam(5, $Itu->getFkIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(6, $Itu->getFkUsuarioVendedor(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $Itu->setIdItemUsuario(null);
            $Itu->setDescItem(null);
            $Itu->setValor(null);
            $Itu->setDataVenda(null);
            $Itu->setFkIdJogo(null);
            $Itu->setFkUsuarioVendedor(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


