<?php

    
if (isset($_GET['mr'])) {
    $mudar = $_GET['mr'];
} else {
    $mudar = "";
}
switch ($mudar) {

    case "adicionarjogos":
        include_once('escolher_jogo.php');
        break;

    case "chattopico":
        include_once("chattopico.php");
        break;

    case 'conversagrupo':
        include_once("chatgrupo.php");
        break;

    case 'chat':
        include_once("chatmsg.php");
        break;

    case 'criargrupo':
        include_once("criargrupo.php");
        break;
    case 'grupo':
        include_once("grupo.php");
        break;
    case 'topico':
        include_once("topico.php");
        break;
    case 'loja':
        include_once("venda.php");
        break;
    default:
        include_once("perfil.php");
        break;
}
