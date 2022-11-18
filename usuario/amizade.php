<?PHP
session_start();
include_once("../class/funcoes_sql.php");
error_reporting(0);
?>

<! --form de busca-->
<form method=post>
<div>
 <input class="form-control input-sm" name="buscamigo" type="text">
<button type="submit" name="procurar" class="btn btn-info">procurar amigos</button>
<button type="submit" name="notificacao" class="btn btn-info">notificação</button>
</div>
</form>


<?php
// Se o usuario clicar no botão notificação,
// O codigo busca as informaçoes dos pedidos de amizades do usuario. 
if(isset($_POST['notificacao'])){
 
 $eu = 1;
 // $eu = $_SESSION['id'];
 $amigo = new funcoes_sql();
 $amigo->setconsulta("SELECT fk_idusuario,fk_idamigo,data_solicitacao,confirmacao 
						FROM  usuario cm ,amizade
						LEFT JOIN usuario am
						ON am.idusuario = amizade.fk_idamigo
						WHERE cm.idusuario = amizade.fk_idusuario  
						AND fk_idamigo = $eu;");
						
 
 $amigodv = $amigo->selecionar();
 if(is_array($amigodv)){
	echo" <form method=post>";
	 foreach ($amigodv as $n) {
		 echo "$n[fk_idusuario] <br> $n[fk_idamigo] <br> $n[data_solicitacao] <br> $n[confirmacao]";
		 $_SESSION['idamigo'] = $n[fk_idamigo];
		 echo"<button type='submit' name='aceitar' class='btn btn-info'>aceitar</button>";
		 echo"<button type='submit' name='recusar' class='btn btn-info'>recusar</button>";
	}
	echo"</form>";
 }
}

// Se o usuario clicar no botão aceitar,
// O codigo altera as informações no banco.
if(isset($_POST['aceitar'])){
	$eu = 1;
	// $eu = $_SESSION['id'];
	$amiguinho = $_SESSION['idamigo'];
	$aceitar = new funcoes_sql();
	$aceitar->setconsulta("UPDATE amizade 
							SET confirmacao = '2',data_confirmacao = curtime() 
							WHERE fk_idamigo = $amiguinho  and fk_idusuario = $eu;");
	$aceitardv = $aceitar->alterar();
	if($aceitardv->alterar() > 0){
	foreach ($aceitardv as $a) {
		echo" mais uma amizade foi feita";
}
}
}


// Se o usuario clicar no botão recusar,
// O codigo altera as informações no banco.
if(isset($_POST['recusar'])){
	$eu = 1;
	// $eu = $_SESSION['id'];
	$amiguinho = $_SESSION['idamigo'];
	$recusar = new funcoes_sql();
	$recusar->setconsulta("UPDATE amizade 
							SET confirmacao = '3',data_confirmacao = curtime() 
							WHERE fk_idamigo = $amiguinho  and fk_idusuario = $eu;");
	$recusardv = $recusar->alterar();
	if($recusardv->alterar() > 0){
	foreach ($recusardv as $r) {
		echo"pq vc e assim?";
}}}

// Se o usuario preencher o campo e clicar em procurar.
// O codigo vai no SQL recuperar o id, login e a foto do usuarios.
if(isset($_POST['procurar'])){
	if(!empty($_POST['buscamigo'])){
		$procuraramigo = $_POST['buscamigo'];
		$procurar = new funcoes_sql();
		$procurar->setconsulta("SELECT idusuario,login,foto 
								FROM usuario WHERE login LIKE '%$procuraramigo%';");
		$procurardn = $procurar->selecionar();
		// Quando recuperado o codigo cria um botão para a solicitação de amizade.
		if(is_array($procurardn)){
			echo"<form method=post>";
			foreach ($procurardn as $p) {
				echo"$p[foto] <br> $p[idusuario] <br> $p[login] ";
				echo"<button type='submit' name='solicitar' class='btn btn-info'>solicitar amizade</button>";
				$_SESSION['id2'] = $p[idusuario];
		}
		echo"</form>";
		}else{
			// Se ele não recuperer nada mostre a mensagem.
			echo"usuario não encontrardo";
		}
}
}
// Quando clicar no botão "solicitar" ele preenche a tabela amizade com as informaçoes abaixo.
// dados encontrados na $_SESSION. 
if(isset($_POST['solicitar'])){
	
	$amigo = $_SESSION['id2'];
	//$usario = $_SESSION['id'];
	$usario = 1;
	$solicitar = new funcoes_sql();
	$solicitar->setconsulta("insert into amizade value($usario,$amigo ,curtime(),null,1);");
	if($solicitar->inserir() > 0) {
		echo"solicitação enviada com sucesso!!";
	}
}

?>