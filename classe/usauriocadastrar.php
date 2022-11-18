<?php
// ESSE CODIGO PODE SER ALTERADO.
// ESSE CODIGO PRECISA SER ALTERADO.
include_once("conexao.php");
include_once("../DAO/usuarioDAO.php");

// conexao com o DAO.
$usu = new UsuariosDAO;

// Verificar se foi enviando dados via POST
// Todas as informações dos campos estão em outra dela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usu->SetIdUsuario($_SESSION['id']);
    $usu->SetLogin(filter_input(INPUT_POST, 'loginuser'));
    $usu->SetSenha(filter_input(INPUT_POST, 'senhauser'));
    $usu->SetNome(filter_input(INPUT_POST, 'nomeuser'));
    $usu->SetEmail(filter_input(INPUT_POST, 'emailuser'));
    $usu->SetData_Nascimento(filter_input(INPUT_POST, 'datanascimentouser'));
    $usu->SetLevel(filter_input(INPUT_POST, 'leveluser'));
    $usu->SetSexo(filter_input(INPUT_POST, 'sexouser'));
    $usu->SetFk_IdTipo_Conta(filter_input(INPUT_POST, 'tipoconta'));
    $usu->SetFoto(filter_input(INPUT_POST, 'fotouser'));
    $usu->SetMoeda(filter_input(INPUT_POST,  "$valorpagar"));

    
}


if (isset($_POST["salvaruser"])) {
    try {
       
            $SQL = $conexao->prepare("INSERT INTO usuario(login,senha,nome,email,data_nascimento,level,sexo,fk_idtipo_conta,foto,moeda) 
        VALUES (?,?,?,?,?,1,?,1,?,0);
        ");
        

        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso.


        $SQL->bindValue(1, $usu->GetLogin());
        $SQL->bindValue(2, $usu->GetSenha());
        $SQL->bindValue(3, $usu->GetNome());
        $SQL->bindValue(4, $usu->GetEmail());
        $SQL->bindValue(5, $usu->GetData_Nascimento());

        $SQL->bindValue(6, $usu->GetSexo());

        $SQL->bindValue(7, $usu->GetFoto());

        if ($SQL->execute()) {
            if ($SQL->rowCount() > 0) {
                // Se tudo ter certo imprime uma mensagem.
                // e apaga todas as informações que foi utilizada.
                // para previnir erros futuros por dados ja utilizados .
                echo "<p class=\"bg-success\">Usuario cadastrados com sucesso!</p>";
                $usu->SetIdUsuario(null);
                $usu->SetLogin(null);
                $usu->SetSenha(null);
                $usu->SetNome(null);
                $usu->SetEmail(null);
                $usu->SetData_Nascimento(null);
                $usu->SetLevel(null);
                $usu->SetSexo(null);
                $usu->SetFk_IdTipo_Conta(null);
                $usu->SetFoto(null);
                $usu->SetMoeda(null);
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
}?>