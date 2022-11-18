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



//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.

if ($useradm == 'sim') {
    try {
            $SQL = $conexao->prepare("INSERT INTO usuario(login,senha,nome,email,data_nascimento,level,sexo,fk_idtipo_conta,foto,moeda) 
        VALUES (?,?,?,?,?,1,?,?,?,0,1);
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
        $SQL->bindValue(7, $usu->GetFk_IdTipo_Conta());
        $SQL->bindValue(8, $usu->GetFoto());

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
}
//============================================= SALVAR =========================================================

// Quando clicar no botão "salvar" e nele estiver "enviar".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if ($_SESSION['pagar'] != null) {
    try {
      
            $SQL = $conexao->prepare("UPDATE  usuario SET moeda =? WHERE idusuario = ?;
            ");
        $
        $SQL->bindParam(1,  $_SESSION['pagar']);
        $SQL->bindParam(2, $usu->GetIdUsuario());
        
        
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
                $valor = null;
                $_SESSION['pagar'] = null;
                $pagamento = null;
                $pagar = null;
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
/*if ($buscamigo = 'buscar') {
    
    try {
        // Como o Codigo permite buscar com o Email ou com o IdUsuario.
        // Precisamos de duas declarações SQL.
       
            $SQL = $conexao->prepare("SELECT idusuario,login,foto 
            FROM usuario WHERE login LIKE '% ? %' ");
            // bindValue e uma palavra reservada 
            // que quando estiver um "?" ela vai substituir por outro valor
            // ela serve para esse tipo de caso
            // porem se tiver uma alteração na variavel o Codigo não substitui o valor anterior
            $SQL->bindValue(1, $_SESSION['buscamigo']);
        

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
            $buscamigo = null;
            }
        } else {
            // se nada ter cedo imprima uma mensagem.
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}*/

//====================================== BUSCAR ===============================================================

// Quando clicar no botão "buscar" e nele estiver "estoucomfome".
// O codigo vai pegar as informaçoes do DAO e repasar para linha SQL.
if ($perfil = 'sim') {
    try {
        // Como o Codigo permite buscar com o Email ou com o IdUsuario.
        // Precisamos de duas declarações SQL.
        
            // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
            $SQL = $conexao->prepare("SELECT idusuario,login,senha,nome,email,data_nascimento,level,sexo,fk_idtipo_conta,foto,moeda 
        FROM usuario,tipo_conta 
        where tipo_conta.idtipo_conta = usuario.fk_idtipo_conta
        and  idusuario = ?");
            // bindParam e uma palavra reservada 
            // que quando estiver um "?" ela vai substituir por outro valor
            // ela serve para esse tipo de caso
            $SQL->bindValue(1, 1);
            if ($SQL->execute()) {
                if($SQL->rowCount() > 0){
                // Se tudo ter certo imprime uma mensagem.
                // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
                // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
                
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
                $perfil = null;
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
if ($moeda == 'sim') {
    try {
        // Como o Codigo permite buscar com o Email ou com o IdUsuario.
        // Precisamos de duas declarações SQL.
        
            // Não sei se vai precisar trazer o usuario, mas qualquer coisa ja esta pronto. 
            $SQL = $conexao->prepare("SELECT moeda 
        FROM usuario 
        where idusuario = ?");
            // bindParam e uma palavra reservada 
            // que quando estiver um "?" ela vai substituir por outro valor
            // ela serve para esse tipo de caso
            $SQL->bindValue(1, 1);
            if ($SQL->execute()) {
                if($SQL->rowCount() > 0){
                // Se tudo ter certo imprime uma mensagem.
                // $rs = recepe o retorno do banco, ja que nesse arquivo "conecxao" não existe retorno.
                // como ele esta retornado algo do banco, utlizaremos as funçoes SET.
                
                $rs = $SQL->fetch(PDO::FETCH_OBJ);
                
                $perfil = null;
                $moeda = null;
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
if (isset($_POST["deletar"]) && $_POST["deletar"] == "del") {
    try {
        // bindParam e uma palavra reservada 
        // que quando estiver um "?" ela vai substituir por outro valor
        // ela serve para esse tipo de caso
        $SQL = $conexao->prepare("DELETE FROM usuario WHERE idusuario = ? ;
        ");

        $SQL->bindParam(1, $usu->GetIdUsuario(), PDO::PARAM_INT);


        if ($SQL->execute()) {
            // Se tudo ter certo imprime uma mensagem.
            // e apaga todas as informações que foi utilizada.
            // para previnir erros futuros por dados ja utilizados .
            echo "<p class=\"bg-success\">Registro foi excluído com êxito</p>";
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
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}
