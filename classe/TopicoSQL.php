<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/TopicoDAO.php");

$TOP = new TopicoDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $TOP->setDescricao(filter_input(INPUT_POST,'descricaotopico'));
    $TOP->setIdTopico(filter_input(INPUT_POST,''));
    $TOP->setDataTopico(filter_input(INPUT_POST,''));
    $TOP->setFkIdUsuario(1);
 
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST['topico'])){
    try {
        
        $SQL = $conexao->prepare("INSERT INTO topico(descrição,data_topico,fk_idusuario) 
        VALUES (?,curtime(),?)
        ");
        
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $TOP->GetDescricao());
        $SQL->bindValue(2, $TOP->getFkIdUsuario());
   

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $TOP->setDescricao(null);
                $TOP->setIdTopico(null);
                $TOP->setDataTopico(null);
                $TOP->setFkIdUsuario(null);
              
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
if ($topico == "buscar") {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idtopico,descrição,data_topico,login 
        FROM topico,usuario
        WHERE topico.fk_idusuario = usuario.idusuario;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
       

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
           
            $topico = null;
          
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
        $SQL = $conexao->prepare("DELETE FROM topico WHERE idtopico = ? 
        ");

        $SQL->bindParam(1, $TOP->getDescricao(), PDO::PARAM_STR);
        $SQL->bindParam(2, $TOP->getIdTopico(), PDO::PARAM_INT);
        $SQL->bindParam(4, $TOP->getDataTopico(), PDO::PARAM_INT);
       

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $TOP->setDescricao(null);
            $TOP->setIdTopico(null);
            $TOP->setDataTopico(null);
            $TOP->setFkIdUsuario(null);
            
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


