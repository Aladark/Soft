<?php
session_start();
?>
<form method=post>
  <input name=nomegrupo type="text">
  <input name=descricaogrupo type="text">
  <input name=quantidade type="text">
  <select class='form-select' name=jogo aria-label='Default select example'>;
    <?php
    $buscarjogouser = 'buscar';
    include("../classe/JogoSQL.php");
    ?> <option value=0></option>;<?php
                              if ($SQL->execute()) {
                                while ($rj = $SQL->fetch(PDO::FETCH_OBJ)) {
                              ?>
    <option value=<?php echo $rj->idjogo; ?>><?php echo $rj->nome_jogo; ?></option>;
<?php
                                }
                              }
?>
  </select>
  <button name=grupo>criar grupo</button>

  <?php
  if (isset($_POST['grupo'])) {
    if (!empty($_POST['nomegrupo']) && !empty($_POST['descricaogrupo']) && !empty($_POST['quantidade'])) {
      if ($_POST['quantidade'] != 0) {
        echo $_POST['jogo'];
        $grupojogo = 'inserir';
        include_once("../classe/GrupoSQL.php");
      }
    }
  } ?>
  <table>
    <thead>
      <tr>
        <th>nome</th>
        <th>descrição</th>
        <th>quantidade</th>
        <th>jogo</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $buscargrupo = 'buscar';
      include_once("../classe/grupoSQL.php");
      if ($SQL->execute()) {
        while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
      ?>
          <tr>
            <td><?php echo $rs->nome_grupo; ?></td>
            <td><?php echo $rs->descricao_grupo; ?></td>
            <td><?php echo $rs->quantidademax; ?></td>
            <td><?php echo $rs->nome_jogo; ?></td>
            <td>
              <button type="submit" name=grupotopico value=<?php echo $rs->idgrupos ?>><a href="index.php?mr=conversagrupo">entrar</a></button>
            </td>
          </tr>
    </tbody>
<?php
        }
      }
?>

</form>