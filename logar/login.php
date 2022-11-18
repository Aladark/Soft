<?php
session_start();

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
	<link href="../css/login.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		! function(o, c) {
			var n = c.documentElement,
				t = " w-mod-";
			n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
		}(window, document);
	</script>
	<link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon" />
</head>

<body class="body-2">
	<div class="section-5 wf-section">
		<div class="container-7 w-container">
			<form name=id method="post">
				<a href="../index.php" name="menu" class="w-inline-block">
					<img src="https://uploads-ssl.webflow.com/62746385528a3624f3e55b4c/62751fb0343133b5fc4687ef_whitelogo.png" loading="lazy" sizes="150px" srcset="https://uploads-ssl.webflow.com/62746385528a3624f3e55b4c/62751fb0343133b5fc4687ef_whitelogo-p-500.png 500w, https://uploads-ssl.webflow.com/62746385528a3624f3e55b4c/62751fb0343133b5fc4687ef_whitelogo.png 735w" alt="" class="image-7" />
				</a>
			</form>
			<h1 class="heading-5">KoftTec</h1>
			<h1>Bem-vindo de volta!</h1>

			<div class="form-block-2 w-form">
				<!--========================================================LOTE 1==================================================================================-->
				<?php if ($_SESSION['lote'] == 1) :
			
					// acima do if, cria o inicio do form, a baixo do if, cria a primeira tela de login (inserir email)
				?>
					<form name="loginemail" method="post" class="form">
						<label for="email" class="field-label-4">Insira seu endereço de e-mail</label>
						<input type="email" class="text-field w-input" maxlength="200" name="emailuser" placeholder="E-mail" require />
						<button type="submit" name="botaoemail" data-wait="Por favor, aguarde..." class="submit-button-2 w-button">Avançar</button>
					</form>
					<!--========================================================LOTE 2==================================================================================-->
				<?php elseif ($_SESSION['lote'] == 2) :
					//Parte do codigo que mostra a segunda tela (inserir senha)

					echo 	$_SESSION['id'];
				?>
					<form name="loginsenha" method="post" class="form">
						<label for="senha" class="field-label-4">Insira sua senha</label>
						<input type="password" class="text-field w-input" maxlength="100" name="senhauser" placeholder="Senha" />
						<button type="submit" name="botaosenha" data-wait="Por favor, aguarde..." class="submit-button-2 w-button">Avançar</button>
						<br><br>
						<button type="submit" name="voltar" data-wait="Por favor, aguarde..." class="submit-button-2 w-button">Voltar</button>
					</form>

				<?php endif; ?>

				<?php
				// Busca o usuario e senha no banco de dados.
				// Grava as informação na SESSION.
				if (isset($_POST['botaoemail'])) {
					if (!empty($_POST['emailuser'])) {
						$email = $_POST['emailuser'];
						//include('../classe/conexao.php');
					  include_once("../classe/usuariologarSQL.php");
						$rm = $SQL->fetch(PDO::FETCH_OBJ);
					
						if ($SQL->rowCount() > 0) {
							// Chama o arquivo SQL para chamar os dados.
							$_SESSION['nome']   = $usu->GetNome();
							$_SESSION['vlogin'] = $usu->GetLogin();
							$_SESSION['vsenha'] = $usu->GetSenha();
							$_SESSION['nvlacss'] = $usu->GetFk_IdTipo_Conta();
							$_SESSION['id'] = $usu->GetIdUsuario();
							
							$_SESSION['lote'] = 2;
							echo "<script>
						window.location.replace('login.php');
					  </script>";
						} else {
							echo "<script>
				alert('Usuário não encontrado');
			  </script>";
						}
					} else {
						echo "<script>
				alert('informe um email');
			  </script>";
					}
				}
				?>

				<?php
				// Busca as informações na SESSION.
				// verifica se as infomações são iguais.
				if (isset($_POST['botaosenha'])) {
					if (!empty($_POST['senhauser'])) {
						$senha 	= $_POST['senhauser'];
						$vsenha = $_SESSION['vsenha'];
						$login	= $_SESSION['vlogin'];
						$nivel  = $_SESSION['nvlacss'];
					
						if ($senha == $vsenha) {
				
							// Lembrar de criar novos requisitos do nivel(moderador e adm).		
							if ($nivel == 1) {
								$_SESSION['sessao'] = 'ok';
								echo "<script>
										alert('Bem-vindo $login')
										window.location.replace('../usuario/index.php');
										</script>";
							}if ($nivel == 2) {
								$_SESSION['sessao'] = 'ok';
								echo "<script>
										alert('Bem-vindo $login')
										window.location.replace('../moderador/index.php');
										</script>";
							}if ($nivel == 3) {
								$_SESSION['sessao'] = 'ok';
								echo "<script>
										alert('Bem-vindo $login')
										window.location.replace('../adm/index.php');
										</script>";
							}
						} else {
							echo "<script>
									alert('Senha digitada incorreta');
									</script>";
						}
					}else {
						echo "<script>
								alert('Digite sua senha');
								</script>";
				}}
				
				// Volta para a primeira parte.
				if (isset($_POST['voltar'])) {
					$_SESSION['lote'] = 1;

					echo $_SESSION['lote'];
					unset($_SESSION['vsenha']);
					unset($_SESSION['vlogin']);
					echo "<script>window.location.href = 'login.php'</script>";
				}

				?>








				<div class="w-form-done">
					<div>Thank you! Your submission has been received!
					</div>
				</div>

				<div class="w-form-fail">

					<div>Oops! Something went wrong while submitting the form.
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62746385528a3624f3e55b4c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
	</script>
</body>

</html>