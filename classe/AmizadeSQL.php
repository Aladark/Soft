<?php
// insert into = insert do banco
// update = update do banco
// select = select do banco 
// delete = delete do banco




// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/amizadeDAO.php");

$ami = new amizadeDAO;
$_SESSION['id'] = 1;
// Verificar se foi enviando dados via POST
// Todas as informações dos amipos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ami->SetFk_IdUsuario(1);
    $ami->SetFk_IdAmigo(filter_input(INPUT_POST,'aceitar'));
    $ami->SetData_Solicitacao(filter_input(INPUT_POST,''));
    $ami->SetData_Confirmacao(filter_input(INPUT_POST,''));
    $ami->SetConfirmacao(filter_input(INPUT_POST,''));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST['aceitar'])) {
    try {
        if ($ami->GetFk_IdUsuario() > 0 ) {
			$SQL = $conexao->prepare("UPDATE amizade 
			SET confirmacao = '2',data_confirmacao = curtime() 
			WHERE fk_idamigo = ?  and fk_idusuario = ?;");
		}else{
        $SQL = $conexao->prepare("INSERT amizade (fk_idusuario,fk_idamigo,data_solicitacao,confirmacao) VALUES (?,?,curdate(),1);");
        }
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
		$SQL->bindParam(1, $ami->GetFk_IdUsuario());
        $SQL->bindParam(2, $ami->GetFk_IdAmigo());
       

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $ami->SetFk_IdUsuario(null);
                $ami->SetFk_IdAmigo(null);
                $ami->SetData_Solicitacao(null);
                $ami->SetData_Confirmacao(null);
                $ami->SetConfirmacao(null);
                
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
if ($amizade == 'buscar'){
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT fk_idusuario,fk_idamigo,data_solicitacao 
		FROM  usuario,amizade 
        WHERE usuario.idusuario = amizade.fk_idusuario  
        AND fk_idusuario = ?;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindValue(1, $_SESSION['id']);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
           // echo "<p class=\"bg-success\">Dados cadastrados boa noite com sucesso!</p>";
            //$ra = $SQL->fetch(PDO::FETCH_OBJ);
            //$ami->SetFk_IdUsuario($rs->fk_idusuario);
           // $ami->SetFk_IdAmigo($rs->fk_idamigo);
            //$ami->SetData_Solicitacao($rs->data_solicitacao);
           
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }}



//========================================= DELETE ==========================================================


// Quando clicar no botão "deletar" e nele estiver "del".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if ($apagar == 'sim') {
    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL = $conexao->prepare("DELETE FROM amizade  WHERE fk_idamigo = ?;");

        $SQL->bindParam(1, $_SESSION['idamizade']);
        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $ami->SetFk_IdUsuario(null);
            $ami->SetFk_IdAmigo(null);
            $ami->SetData_Solicitacao(null);
            $ami->SetData_Confirmacao(null);
            $ami->SetConfirmacao(null);
            $apagar = null;
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


