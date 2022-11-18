<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/PlataformaDAO.php");

$pla = new PlataformaDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pla->setIdPlataforma(filter_input(INPUT_POST,"simplataforma"));
    $pla->setDescPlatafoma(filter_input(INPUT_POST, 'descplataforma'));
} 
 else if ($pla->getIdPlataforma() == null) {

    // Se não foi setado nenhum valor para variável $id
        $pla->setIdPlataforma((isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "");
    }

//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["salvarplataforma"])) {
    
    try {
        $SQL = $conexao->prepare("INSERT INTO plataforma (desc_platafoma) VALUES (?);");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL->bindValue(1, $pla->getDescPlatafoma());


        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $pla->setDescPlatafoma(null);
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



//========================================= DELETE ==========================================================

// Quando clicar no botão "deletar" e nele estiver "del".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST["simplataforma"])) {
    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL = $conexao->prepare("DELETE FROM plataforma WHERE idplataforma = ?;");
        $SQL->bindValue(1, $pla->getIdPlataforma());

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados.
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
            $pla->setIdPlataforma(null);
        }else{ // se nada ter cedo imprima uma mensagem.
        echo "<p class=\"bg-danger\">Erro ao tentar efetivar cadastro</p>";
        }
    } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}
//====================================== BUSCAR ===============================================================

// Quando clicar no botão "buscar" e nele estiver "estoucomfome".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if ($plata == "buscar")  {
    try {
        $SQL = $conexao->prepare("SELECT idplataforma,desc_platafoma FROM plataforma;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
       


        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
                // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
                //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $rs = $SQL->fetch(PDO::FETCH_OBJ);
                $plata = null;
               //$pla->setDescPlatafoma($rs->desc_platafoma());
                //$pla->setIdPlataforma(1, $pla->IdPlataforma());
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
if (isset($_POST['informacoesjogo']))  {
    try {
        $SQLp = $conexao->prepare("SELECT idplataforma,desc_platafoma FROM plataforma,plataforma_jogo 
        where plataforma.idplataforma = plataforma_jogo.fk_idplataforma
        and fk_idjogo = ?;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
       
 $SQLp->bindValue(1, $_SESSION['idjogo']);

        if ($SQLp->execute()) {
            if ($SQLp->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
                // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
                //echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $rs = $SQLp->fetch(PDO::FETCH_OBJ);
                $platauser = null;
               //$pla->setDescPlatafoma($rs->desc_platafoma());
                //$pla->setIdPlataforma(1, $pla->IdPlataforma());
            }
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
 }
