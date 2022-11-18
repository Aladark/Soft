<?php
// esse codigo vai facilitar a minha vida como programador baiano.
// é com ele que eu vou fazer todos os campos SQL.
// MAPA:
// tipoconta = nome do arquivo DAO
// $cam = as 3 primeiras letras do arquivo
// copiar e colar o set para todos os campos do banco
// copiar e colar o get para todos os campos do banco
// insert into = insert do banco
// update = update do banco
// select = select do banco 
// delete = delete do banco




// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/tipocontaDAO.php");

$cam = new tipocontaDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cam->setIdTipo_Conta(filter_input(INPUT_POST,''));
    $cam->setDesc_Tipo(filter_input(INPUT_POST,''));
    $cam->setNivel(filter_input(INPUT_POST,''));
}

//====================================== BUSCAR ===============================================================

// Quando clicar no botão "buscar" e nele estiver "estoucomfome".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if ($tipoconta = 'buscar') {
    try {
        // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
        $SQL = $conexao->prepare("SELECT idtipo_conta,desc_tipo,nivel FROM banco_pi.tipo_conta;");
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
     

        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            // $cam->setIdTipo_Conta($rs->idtipo_conta);
            // $cam->setDesc_Tipo($rs->desc_tipo);
            // $cam->setNivel($rs->nivel);
						$tipoconta = null;
          
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}


