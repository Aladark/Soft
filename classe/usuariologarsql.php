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
    $usu->SetMoeda(filter_input(INPUT_POST,  $valorpagar));

    
}
//====================================== BUSCAR ===============================================================

// Quando clicar no botão "buscar" e nele estiver "estoucomfome".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if (isset($_POST['botaoemail'])) {
    try {
      
            $SQL = $conexao->prepare("SELECT idusuario,login,senha,nome,data_nascimento,level,sexo,fk_idtipo_conta,foto,moeda 
         FROM usuario,tipo_conta 
         where tipo_conta.idtipo_conta = usuario.fk_idtipo_conta
         and  email= ? ");
            // bindValue e uma palavra reservada 
            // que quando estiver um "?" ela vai substituir por outro valor
            // ela serve para esse tipo de caso
            // porem se tiver uma alteração na variavel o Codigo não substitui o valor anterior
            $SQL->bindValue(1, $usu->getEmail());
        

       // Se o SQL consequir executar entrar, 
       // Porem mesmo com os parametros NULL o sql vai executar
       // Por isso que preciso de uma verificação para contar as linhas encontradas. 
        if ($SQL->execute()) {
            if($SQL->rowCount() > 0){
            // Se tudo ter certo imprime uma mensagem.
            // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
            // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
            echo "<p class=\"bg-success\">Dados encontrados com sucesso!</p>";
            $rs = $SQL->fetch(PDO::FETCH_OBJ);
            $usu->SetIdUsuario($rs->idusuario);
            $usu->SetLogin($rs->login);
            $usu->SetSenha($rs->senha);
            $usu->SetNome($rs->nome);
            $usu->SetEmail($rs->email);
            $usu->SetData_Nascimento($rs->data_nascimento);
            $usu->SetLevel($rs->level);
            $usu->SetSexo($rs->sexo);
            $usu->SetFk_IdTipo_Conta($rs->fk_idtipo_conta);
            $usu->SetFoto($rs->foto);
            $usu->SetMoeda($rs->moeda);
            $login = null;
            }
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}
?>