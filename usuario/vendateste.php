<?php
$moeda = 'sim';
include("../classe/UsuarioSQL.php");
$moeda = $usu->GetMoeda();
echo $valor;
$_SESSION['moeda'] =  $usu->GetMoeda();
$buscaritem = "venda";
include_once("../classe/ItemSQL.php");
if($SQL->execute()) {
    while ($ri = $SQL->fetch(PDO::FETCH_OBJ)) { ?>
    <form method=post>
        <label ><?php echo $ri->IdItem?></label></br>
        <label><?php echo $ri->desc_item?></label></br>
        <label><?php echo $ri->desc_tipo_item?></label></br>
        <imput name=venda  value=<?php echo $ri->valor;?>><?php echo $ri->valor;?></imput></br>
        <button name=iditem  value=<?php echo $ri->IdItem;?>>comprar</button></br>
        
<?php   }
}
if(isset($_POST['iditem'])){
 $_SESSION['pagar'] = $valor - $_POST['venda'];
 
    if($moeda >  $valor){
        echo  $_SESSION['pagar'] ;
        include_once("../classe/UsuarioSQL.php");
        //include_once('../classe/VendaSQL.php');
    }else{
        echo"vc não tem moeda suficiente";
    }
    
}


?>
 </form>