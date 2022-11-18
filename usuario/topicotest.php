<?php
session_start();
$topico = "buscar";
?>
<form method=post>

<input name=descricaotopico type="text">

<button name=topico>criar topico</button>


<?php
if(isset($_POST['topico'])){
if(!empty($_POST['descricaotopico'])){
include_once('../classe/topicoSQL.php');

}
}

  ?>
  <table>
      <thead>
          <tr>
              <th>nome</th>
              <th>descrição</th>
          </tr>
      </thead>
      <tbody>

          <?php
           $topico = 'buscar';
          include_once("../classe/topicoSQL.php");
          if ($SQL->execute()) {
              while ($rs = $SQL->fetch(PDO::FETCH_OBJ)) {
          ?>
                  <tr> 
                    <td><?php echo $rs->login; ?></td>

                      <td><?php echo $rs->descrição; ?></td>
                      <td><?php echo $rs->data_topico; ?></td>
                      <td>
                          <button type="submit"  name=entartopico value=<?php echo $rs->idtopico ?>><a href="index.php?mr=conversatopico">entrar</a></button>
                      </td>
                  </tr>
      </tbody>
<?php
              }
          }
if(isset($_POST['entartopico'])){
$_SESSION['mudar'] = "conversatopico";

echo   $_SESSION['mudar'] ;
 
}
?>

</form>