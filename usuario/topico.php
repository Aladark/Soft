<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/topico.css" />
  <title>Document</title>
</head>

<body>

  <form method=get>
    <div class="container">
      <?php
      $topico = 'buscar';
      include_once("../classe/topicoSQL.php");
      if ($SQL->execute()) {
        while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
      ?>
          <a href="index.php?mr=chattopico&idtopico=<?php echo $rs->idtopico; ?>">
            <div class="topico" onclick="irtopico()">
              <div>
                <div style="display: flex;">
                  <h2 style="width: 100%;"><?php echo $rs->descrição; ?></h2>
                  <h2><?php echo $rs->login; ?></h2>
                </div>
                <p><?php echo $rs->data_topico; ?>
                </p>
              </div>
            </div>
          </a>
   
<?php
        }
      }
?>

</div>

  </form>

</body>
<?php
if (isset($_POST['idtopico'])) {
  $_SESSION['idtopico'] = $_POST['idtopico'];
?>
  <script>
    function irtopico() {
      window.location.href = "index.php?mr=chattopico"
    }
  </script>
<?php
}
?>

</html>