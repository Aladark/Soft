<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/confgrupoDAO.php");

$congru = new confgrupoDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $congru->SetFkIdUsuario(filter_input(INPUT_POST,''));
    $congru->SetTipo(filter_input(INPUT_POST,''));
    $congru->SetFkIdGrupos(filter_input(INPUT_POST,''));
    $congru->SetData(filter_input(INPUT_POST,''));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["salvar"]) && $_POST["salvar"] == "enviar") {
    try {
        if ($congru->setData != null ) {
			$SQL = $conexao->prepare("UPDATE conf_grupo SET GetTipo ='?' WHERE fk_idusuario =?  AND fk_idgrupos = ?; ");
            
		}else{
        $SQL = $conexao->prepare("INSERT INTO conf_grupo (tipo,fk_idusuario,fk_idgrupos,data) VALUES (?,?,?, curtime());");
        }
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindParam(1, $congru->GetTipo(), PDO::PARAM_STR);
        $SQL->bindParam(2, $congru->GetFkIdUsuario(), PDO::PARAM_INT);
        $SQL->bindParam(3, $congru->GetFkIdGrupos(), PDO::PARAM_INT);
    

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $congru->SetFkIdUsuario(null);
                $congru->SetTipo(null);
                $congru->SetFkIdGrupos(null);
                $congru->SetData(null);
        
                
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
        $SQL = $conexao->prepare("SELECT fk_idusuario,tipo,data FROM conf_grupo WHERE fk_idgrupos = ?;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindParam(3, $congru->GetFkIdGrupos(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $congru->SetFkIdUsuario($rs->fk_idusuario);
            $congru->SetTipo($rs->tipo);
            $congru->SetData($rs->data);
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
        $SQL = $conexao->prepare("DELETE FROM conf_grupo WHERE fk_idusuario = ?;");

        $SQL->bindParam(1, $congru->GetFkIdUsuario(), PDO::PARAM_INT);
    
        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $congru->SetFkIdUsuario(null);
            $congru->SetTipo(null);
            $congru->SetFkIdGrupos(null);
            $congru->SetData(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


