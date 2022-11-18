<?php
// Função carrega.
function carrega()
{
	
$arg['pasta']   = "../imagem/";
$arg['tamanho'] = 1024*1024*2;
$arg['ext']     = array('jpeg','jpg','png','gif');

$arg['error'][0]="Não houve erro";
$arg['error'][1]="Tamanho execede limete do PHP";
$arg['error'][2]="Tamanho execede limete do HTML";
$arg['error'][3]="Arquivo carregado parcialmente";
$arg['error'][4]="Nenhum arquivo enviado";

if ($_FILES['arquivo']['erro'] = ![0])
{
	die("Não foi possivel cerregar o arquivo ".$arg['error'][$_FILES['arquivo']['error']]);

}
$tmp = explode(".",$_FILES['arquivo']['name']);
$extensao = strtolower(end($tmp));

if(array_search($extensao,$arg['ext']) === false){
	//verifica se é do tipo esperado
	echo"Arquivo inesperado";
	exit;
}elseif($arg['tamanho'] < $_FILES['arquivo']['size']){
	//tamanho excede
	echo"Tamanho não permitido";
	exit;
}else{
	//mover o arquivo
	$novonome = time().'.'.$extensao;
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$arg['pasta'].$novonome)){
		echo "sucesso";
		
	}else{
		echo "erro";
	}	
}
return $novonome;
}
?>
