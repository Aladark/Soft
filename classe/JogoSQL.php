<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/JogoDAO.php");

$Jog = new JogoDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Jog->setIdJogo(filter_input(INPUT_POST,'alterarjogo'));
    $Jog->setNomeJogo(filter_input(INPUT_POST, 'nomejogo'));
    $Jog->setDescJogo(filter_input(INPUT_POST, 'descricaojogo'));
    $Jog->setFaixaEtaria(filter_input(INPUT_POST, 'faixaetariajogo'));
    $Jog->setFoto(filter_input(INPUT_POST, 'salvarjogo'));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if ($estapreenchido == "confia") {
    try {
        if ($Jog->getIdJogo() > 0) {
            $SQL = $conexao->prepare("UPDATE  jogo SET nome_jogo = ?, desc_jogo = ,faixa_etaria = ? , foto = ? WHERE idjogo = ?  ");
            $SQL->bindParam(5, $Jog->getIdJogo());
        } else {
            $SQL = $conexao->prepare("INSERT INTO jogo (nome_jogo,desc_jogo,faixa_etaria,foto) VALUES (?,?,?,?)");
        }

        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $Jog->getNomeJogo());
        $SQL->bindValue(2, $Jog->getDescJogo());
        $SQL->bindValue(3, $Jog->getFaixaEtaria());
        $SQL->bindValue(4, $Jog->getFoto());


        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                // A função ladtInsertId vai retornar o ultimo id selecionado
                //como a gente esta inserindo ele,logo o banco mostrar o id que foi inserido
                $_SESSION['idjogo'] = $conexao->lastInsertId();
                $Jog->setNomeJogo(null);
                $Jog->setDescJogo(null);
                $Jog->setFaixaEtaria(null);
                $Jog->setFoto(null);
                $estapreenchido = null;
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
if ($buscarjogouser == 'buscar') {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idjogo,nome_jogo,desc_jogo,faixa_etaria,foto
         FROM jogo");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
           
            $buscarjogouser = null;
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
if ($modaljogo == 'buscar') {
   
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idjogo,nome_jogo,desc_jogo,faixa_etaria,foto
         FROM jogo WHERE idjogo = ?");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindValue(1, $_SESSION['avaliarjogo']);
        
      
        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sufbcbccesso!</p>";
            $rp = $SQL->fetch(PDO::FETCH_OBJ);
           
            $motaljogo = null;
           
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
if ($buscarjogo == 'buscar') {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQLj = $conexao->prepare("SELECT idplataforma,desc_platafoma,idgenero,desc_genero,idjogo,nome_jogo,desc_jogo,faixa_etaria,foto
        FROM jogo,generos_jgo,plataforma_jogo,genero,plataforma
where jogo.idjogo = plataforma_jogo.fk_idjogo
and plataforma.idplataforma = plataforma_jogo.fk_idplataforma
and jogo.idjogo = generos_jgo.fk_idjogo
and genero.idgenero = generos_jgo.fk_idgenero;
");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        //$SQL->bindValue(1, $Jog->getIdJogo(), PDO::PARAM_INT);
        //  $SQL->bindValue(2, $Jog->getNomeJogo(), PDO::PARAM_INT);
        //  $SQL->bindValue(3, $Jog->getDescJogo(), PDO::PARAM_STR);
        //  $SQL->bindValue(4, $Jog->getFaixaEtaria(), PDO::PARAM_INT);
        //  $SQL->bindValue(5, $Jog->getFoto(), PDO::PARAM_INT);

        if ($SQLj->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            // echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQLj->fetch(PDO::FETCH_OBJ);
          //  $Jog->setIdJogo($rs->idjogo);
           // $Jog->setNomeJogo($rs->nome_jogo);
           // $Jog->setDescJogo($rs->desc_jogo);
           // $Jog->setFaixaEtaria($rs->faixa_etaria);
           // $Jog->setFoto($rs->foto);
            $buscarjogo = null;
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
if (isset($_POST['simjogo']) && $_SESSION['idjogodel'] != null) {
    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQLpla = $conexao->prepare("DELETE FROM plataforma_jogo WHERE fk_idjogo = ?;");
        $SQLpla->bindValue(1, $_SESSION['idjogodel']);
        $SQLpla->execute();
        $SQLgen = $conexao->prepare("DELETE FROM generos_jgo WHERE fk_idjogo = ? ");
        $SQLgen->bindValue(1, $_SESSION['idjogodel']);
        $SQLgen->execute();
        $SQL = $conexao->prepare("DELETE FROM jogo WHERE idjogo = ? ");
        $SQL->bindValue(1, $_SESSION['idjogodel']);

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $Jog->setIdJogo(null);
            $Jog->setNomeJogo(null);
            $Jog->setDescJogo(null);
            $Jog->setFaixaEtaria(null);
            $Jog->setFoto(null);
            $_SESSION['idjogo'] = null;
            $buscarjogodenovo = 'buscar';
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}
