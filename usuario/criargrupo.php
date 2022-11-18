
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