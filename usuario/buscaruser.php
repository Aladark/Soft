<form method=post>
<input name='buscamigo' type="text">
<button name="procuraruser">buscar</button>
<?php
if (isset($_POST['procuraruser'])) {
  if (!empty($_POST['buscamigo'])) {
    $buscamigo = 'buscar';
    $_SESSION['buscamigo'] = $_POST['buscamigo'];
    ?>
    <table>
    <thead>
        <tr>
            <th>nome</th>
            <th>descrição</th>
            <th>faixa etaria</th>
            <th>foto</th>
        </tr>
    </thead>
    <tbody>

<?php
    include('../classe/UsuarioSQL.php');
    // Quando recuperado o codigo cria um botão para a solicitação de amizade.
    if ($SQL->execute()) {
      while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {?>

       <form method=post>
        
     <tr>
     <td><?php echo $rs->nome_jogo; ?></td>
     <td><?php echo $rs->nick_jogo; ?></td>
     <td>
         <button type="submit"  name=deletejogo value=<?php echo $rs->fk_idjogo ?>>excluir jogo</button>
     </td>
 </tr>
     <?php } ?>
     </tbody>
<?php
    } else {
      // Se ele não recuperer nada mostre a mensagem.
      echo "usuario não encontrardo";
    }
  }
}

?>
</form>