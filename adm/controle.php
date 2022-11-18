<?php
if (isset($_GET['md'])) {
    $mudar = $_GET['md'];
} else {
    $mudar = "";
}
switch ($mudar) {
  
    case "naoavaliados":
        include_once ('avaliar.php');
        break;
        
    default:
        include_once ("naoavaliados.php");
        break;
}
?>