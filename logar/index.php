<?php
session_start();
include_once("class/funcoes_sql.php");
include_once("redirecionamento.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Tela De login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  
  
<main class="form-signin">
    <form name=login method=post>
    <img class="mb-4" src="img/indice.png" alt="" width="100" height="100">
	<h1 class="h3 mb-3 fw-normal">bem-vindos de volta</h1>
	<?php 
	
 if(!isset($_SESSION['vlogin'], $_SESSION['vsenha'])): // ?>
	
	
	
	
  
	
    <div class="form-floating">
	
      <input type="email" class="form-control" name="email" placeholder="Email do Usuario">
    </div>
	 <br>
	  <button class="w-100 btn btn-lg btn-primary" type="submit" name=logar1>Prosseguir</button>
  </form>
    </div>
	
	<?php elseif(isset($_SESSION['vlogin']) and isset($_SESSION['vsenha'])):?>	
	
    <div class="form-floating">
      <input type="password" class="form-control" name="senha" placeholder="Senha">
     
    </div>
<button class="w-100 btn btn-lg btn-primary" type="submit" name=logar2>Entrar</button>
	  <br>
	  <button class="w-75 btn btn-sm btn-primary mt-3" type="submit" name=voltar>Voltar</button>
  </form>
    </div>
	 <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
<?php endif; ?>
   
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


<?php
// Busca o usuario e senha no banco de dados.
// Grava as informação na SESSION.
if(isset($_POST['logar1']))
{
	$email = $_POST['email'];
	
	$logar = new funcoes_sql();
	$logar->setconsulta("select idusuario,login,senha,email,nivel 
	from usuario, tipo_conta 
	where tipo_conta.idtipo_conta = usuario.fk_idtipo_conta 
	and email = '$email';");
	
	$total = $logar->selecionar();
	
	if(is_array($total)) 
	{
		if(count($total) == 1)
		{			
			foreach($total as $result)
			{
				$_SESSION['nome']   = $result[3];
				$_SESSION['vlogin'] = $result[1];
				$_SESSION['vsenha'] = $result[2];
				$_SESSION['nvlacss'] = $result[4];
				$_SESSION['id'] = $result[0];
				
				echo "<script>
						window.location.replace('/tcc/index.php');
					  </script>";
			}
		}
	}else{
		
		echo "<script>
				alert('Usuário não encontrado');
			  </script>";
		
	}
}

// Busca as informações na SESSION.
// verifica se as infomações são iguais.
if(isset($_POST['logar2']))
{
	$senha 	= $_POST['senha'];
	$vsenha = $_SESSION['vsenha'];
	$login	= $_SESSION['vlogin'];
	$nivel  = $_SESSION['nvlacss'];
	$_SESSION['sessao'] = 'ok';
	
	if($senha == $vsenha)
	{
// Lembrar de criar novos requisitos do nivel(moderador e adm).		
		if($nivel == 1){
		echo "<script>
				alert('Bem-vindo $login')
				window.location.replace('usuario/index.php');
			  </script>";
		}elseif($nivel == 2){
		echo "<script>
				alert('Bem-vindo $login')
				window.location.replace('moderador/index.php');
			  </script>";
		}elseif($nivel == 3){
		  echo "<script>
				alert('Bem-vindo $login')
				window.location.replace('adm/index.php');
			  </script>";
		}
	}else{
		
		echo "<script>
				alert('Senha digitada incorreta');
			  </script>";
		
	}
}
// Volta para a primeira parte.
if(isset($_POST['voltar']))
{
	unset($_SESSION['vsenha']);
	echo "<script>window.location.href = 'http://localhost/tcc/index.php'</script>";
}

?>
    
  </body>
</html>
