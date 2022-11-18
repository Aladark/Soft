<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/AvaliacaoUsuarioDAO.php");

$avu = new AvaliacaoUsuarioDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $avu->setFkIdUsuario(1);
    $avu->setFkIdGrupos(1);
    $avu->setidAvaliacaousuario(filter_input(INPUT_POST, "$idavaliacao"));
    $avu->setAvaliacao(filter_input(INPUT_POST, 'avaliacaouser'));
    $avu->setComenatario(filter_input(INPUT_POST, 'descavaliauser'));
    $avu->setDenuncia(filter_input(INPUT_POST, 'denuncia'));
    $avu->setRevisasdo(filter_input(INPUT_POST, ''));
    $avu->setDataAvaliacao(filter_input(INPUT_POST, ''));
    $avu->setFkIdModerador(filter_input(INPUT_POST, ''));
}


//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["avaliaruser"])) {
    try {
        if ($avu->getRevisasdo() > 0) {
            $SQL = $conexao->prepare("UPDATE avaliativo_usuario  SET revisasdo = ? ,data_avaliacao = ?,fk_idmoderador = ? 
             WHERE  idavaliativo_usuario = ? ");
            $SQL->bindParam(1, $avu->getFkIdUsuario());
            $SQL->bindParam(6, $avu->getRevisasdo(), PDO::PARAM_INT);
            $SQL->bindParam(7, $avu->getDataAvaliacao(), PDO::PARAM_INT);
            $SQL->bindParam(8, $avu->getFkIdModerador(), PDO::PARAM_INT);
        } else {
            $SQL = $conexao->prepare("INSERT INTO avaliativo_usuario (fk_idusuario,fk_idgrupos,avaliacao,comenatario,denuncia) 
        VALUES (?,?,?,?,?)");
        }

        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.
        $SQL->bindValue(1, $avu->getFkIdUsuario());
        $SQL->bindValue(2, $avu->getFkIdGrupos());
        $SQL->bindValue(3, $avu->getAvaliacao());
        $SQL->bindValue(4, $avu->getComenatario());
        $SQL->bindValue(5, $avu->getDenuncia());

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $avu->setFkIdUsuario(null);
                $avu->setFkIdGrupos(null);
                $avu->setAvaliacao(null);
                $avu->setComenatario(null);
                $avu->setDenuncia(null);
                $avu->setRevisasdo(null);
                $avu->setDataAvaliacao(null);
                $avu->setFkIdModerador(null);
                $avu->setidAvaliacaousuario(null);
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
if ($avaliar == 'não') {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT login,nome_grupo,avaliacao,comenatario,denuncia FROM avaliativo_usuario,usuario,grupos
        where usuario.idusuario = avaliativo_usuario.fk_idusuario
        and avaliativo_usuario.fk_idgrupos = grupos.idgrupos
        and revisasdo is not null
        ;
        
        
        ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);

            $avaliar = null;
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
if ($avaliar == 'sim') {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT login,nome_grupo,avaliacao,comenatario,denuncia FROM avaliativo_usuario,usuario,grupos
        where usuario.idusuario = avaliativo_usuario.fk_idusuario
        and avaliativo_usuario.fk_idgrupos = grupos.idgrupos
        and revisasdo is null
        ;
        
        ");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);

            $avaliar = null;
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
if (isset($_POST["negativo"])) {
    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL = $conexao->prepare("DELETE FROM avaliativo_usuario WHERE idavaliativo_usuario =?
        ");


        $SQL->bindValue(1, $avu->getidAvaliacaousuario());



        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $avu->setFkIdUsuario(null);
            $avu->setFkIdGrupos(null);
            $avu->setAvaliacao(null);
            $avu->setComenatario(null);
            $avu->setDenuncia(null);
            $avu->setRevisasdo(null);
            $avu->setDataAvaliacao(null);
            $avu->setFkIdModerador(null);
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}
