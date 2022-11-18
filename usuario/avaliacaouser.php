<?php


?>
<form method=post>
<input name='descavaliauser' type="text">
<select name=avaliacaouser class='form-select' aria-label='Default select example'>;
  <option value=0 selected></option>;
  <option value=1>1</option>;
  <option value=2>2</option>;
  <option value=3>3</option>;
  <option value=4>4</option>;
  <option value=5>5</option>;
  <option value=6>6</option>;
  <option value=7>7</option>;
  <option value=8>8</option>;
  <option value=9>9</option>;
  <option value=10>10</option>;
</select>

<select name=denuncia class='form-select' aria-label='Default select example'>;
  <option value=0 selected></option>;
  <option value=1>uso de hack ou chet</option>;
  <option value=2>abuso verbal</option>;
  <option value=2>2assedio, racismo,sexismo,entre outros</option>;
  <option value=2>anti-jogo</option>;
</select>
<button type="submit" name=avaliaruser >avaliar usuario</button>
<?php
if(isset($_POST['avaliaruser'])){
  if($_POST['avaliacaouser'] != 0){
  include_once('../classe/AvaliacaoUsuarioSQL.php');

}else{
  echo 'avalie seu parseiro';
}
}
?>
</form>