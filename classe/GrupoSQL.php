<?php



// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/GrupoDAO.php");

$GRU = new Grupo;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $GRU->setIdGrupos(filter_input(INPUT_POST,''));
    $GRU->setNomeGrupo(filter_input(INPUT_POST,'nomegrupo'));
    $GRU->setDescricaoGrupo(filter_input(INPUT_POST,'descricaogrupo'));
    $GRU->setQuantidadeMax(filter_input(INPUT_POST,'quantidade'));
    $GRU->setFkIdJogo(filter_input(INPUT_POST,"jogo"));
    $GRU->setDataGrupo(filter_input(INPUT_POST,''));
}
//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST['grupo']))  {
    try {

        $SQL = $conexao->prepare("INSERT INTO grupos (nome_grupo,descricao_grupo,quantidademax,fk_idjogo,data_grupo) 
        VALUES (?,?,?,?,curtime())");
        
     
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $GRU->getNomeGrupo(), PDO::PARAM_STR);
        $SQL->bindValue(2, $GRU->getDescricaoGrupo(), PDO::PARAM_STR);
        $SQL->bindValue(3, $GRU->getQuantidadeMax(), PDO::PARAM_INT);
        $SQL->bindValue(4, $GRU->getFkIdJogo());
       
       

        if ($SQL->execute()) {
            var_dump($_POST['quantidade']);

            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $GRU->setIdGrupos(null);
                $GRU->setNomeGrupo(null);
                $GRU->setDescricaoGrupo(null);
                $GRU->setQuantidadeMax(null);
                $GRU->setFkIdJogo(null);
                $GRU->setDataGrupo(null);
                $grupojogo = 'inserir';
                
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
if ($buscargrupo = 'buscar') {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idgrupos,nome_grupo,descricao_grupo,quantidademax,nome_jogo,data_grupo 
        FROM grupos,jogo
        where grupos.fk_idjogo = jogo.idjogo;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
       
        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $buscargrupo = null;
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}

if ($_SESSION['buscargrupo'] != null) {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idgrupos,nome_grupo,descricao_grupo,quantidademax,nome_jogo,data_grupo 
        FROM grupos,jogo
        where grupos.fk_idjogo = jogo.idjogo
        and  grupos.fk_idjogo = ?
        ;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindValue(1, $_SESSION['buscargrupo']);
        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $buscargrupo = null;
            $_SESSION['buscargrupo'] = null;
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

        $SQL->bindParam(1, $GRU->getIdGrupos(), PDO::PARAM_INT);
        $SQL->bindParam(2, $GRU->getNomeGrupo(), PDO::PARAM_STR);
        $SQL->bindParam(4, $GRU->getDescricaoGrupo(), PDO::PARAM_STR);
        $SQL->bindParam(5, $GRU->getQuantidadeMax(), PDO::PARAM_INT);
        $SQL->bindParam(6, $GRU->getFkIdJogo(), PDO::PARAM_INT);
        $SQL->bindParam(7, $GRU->getDataGrupo(), PDO::PARAM_INT);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $GRU->setIdGrupos(null);
            $GRU->setNomeGrupo(null);
            $GRU->setDescricaoGrupo(null);
            $GRU->setQuantidadeMax(null);
            $GRU->setFkIdJogo(null);
            $GRU->setDataGrupo(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}


