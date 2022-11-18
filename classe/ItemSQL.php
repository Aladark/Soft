<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/ItemDAO.php");

$Ite = new ItemDAO;
$_SESSION['id'] = 1;
// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Ite->setIdItem(filter_input(INPUT_POST, 'simitem'));
    $Ite->setDescItem(filter_input(INPUT_POST, "descitem"));
    $Ite->setValor(filter_input(INPUT_POST, "valor"));
    $Ite->setFkIdTipoItem(filter_input(INPUT_POST, "tipoitem"));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["salvaritem"])) {
    try {

        if ($Ite->getIdItem() > 0) {
            $SQL = $conexao->prepare("UPDATE tipo_item SET desc_item = ? , desc_item = ? ,fk_idtipo_item = ? WHERE id_tipo_item = ?
             ");
            $SQL->bindParam(4, $Ite->getIdItem());
        } else {
            $SQL = $conexao->prepare("INSERT INTO item(fk_idtipo_item,desc_item,valor) VALUES (?,?,?)");
        }
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $Ite->getFkIdTipoItem());
        $SQL->bindValue(2, $Ite->getDescItem());
        $SQL->bindValue(3, $Ite->getValor());


        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $Ite->setFkIdTipoItem(null);
                $Ite->setDescItem(null);
                $Ite->setValor(null);
                $Ite->setIdItem($conexao->lastInsertId());
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
if ($buscaritem == 'buscar' or isset($_POST['buscaritem'])) {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT IdItem,fk_idtipo_item,desc_item,valor,data_venda FROM item,venda
        where venda.fk_Item != item.idItem 
        and venda.fk_idusuario = 1;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        


        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
                // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
                // echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $ri = $SQL->fetch(PDO::FETCH_OBJ);
                // $Ite->setFkIdTipoItem($ri->Fk_IdTipo_Item);
                //  $Ite->setDescItem($ri->Desc_Item);
                //  $Ite->setValor($ri->Valor);
               // $Ite->setIdItem($ri->IdItem);
                $buscaritem = null;
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
if ($buscaritem == 'venda') {
    try {
     
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT IdItem,fk_idtipo_item,desc_item,valor, desc_tipo_item 
        FROM item,tipo_item
        where tipo_item.id_tipo_item = item.fk_idtipo_item
       ;");
       
       
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
       
        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
                // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
                // echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $ri = $SQL->fetch(PDO::FETCH_OBJ);
                // $Ite->setFkIdTipoItem($ri->Fk_IdTipo_Item);
                //  $Ite->setDescItem($ri->Desc_Item);
                //  $Ite->setValor($ri->Valor);
               // $Ite->setIdItem($ri->IdItem);
                $buscaritem = null;
            } else {
                // se nada ter cedo imprima uma mensagem.
                echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
            }
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}
//========================================= DELETE ==========================================================


// Quando clicar no botão "deletar" e nele estiver "del".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["simitem"])) {

    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL = $conexao->prepare("DELETE FROM item WHERE IdItem = ? ");

        $SQL->bindValue(1, $Ite->getIdItem());


        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $Ite->setFkIdTipoItem(null);
            $Ite->setDescItem(null);
            $Ite->setValor(null);
            $Ite->setIdItem(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }}else{
            echo"deu ruim";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}
