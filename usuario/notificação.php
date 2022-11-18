<?php if (isset($_POST['notificacao'])) {
  $amizade = 'buscar';
  include("../classe/AmizadeSQL.php");
  if ($SQL->execute()) {
    while ($ri = $SQL->fetch(PDO::FETCH_OBJ)) {
      echo $ri->fk_idusuario
?><br><?php $ri->fk_idamigo
            ?><br><?php $ri->data_solicitacao
            ?><br><?php $ri->confirmacao;
            ?>
      <button type='submit' name='aceitar' value=<?php echo $ri->fk_idamigo ?> class='btn btn-info'>aceitar</button>";
      <button type='submit' name='recusar' value=<?php echo $ri->fk_idamigo ?> class='btn btn-info'>recusar</button>";
<?php }
  }
}

// Se o usuario clicar no botão recusar,
// O codigo altera as informações no banco.
if (isset($_POST['recusar'])) {
  $_SESSION['idamizade'] = $_POST['recusar'];
  $apagar = 'sim';
  include("../classe/AmizadeSQL.php");
}


?>