<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/venda.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Loja</title>
</head>

<body>
    <div class="main">
        <div class="filtro" style="display: none;">

            <h2>Filtrar</h2>

            <div style="border-bottom: 2px solid white; width: 80%; margin: auto;"></div>

            <div class="checkboxs">

                <div>
                <input type="checkbox" name="" id="filtro">
                <label for="filtro">bandeiras</label>
            </div>
            <div>
                <input type="checkbox" name="" id="filtro">
                <label for="filtro">dsadsa</label>
            </div>
        <div>

                <input type="checkbox" name="" id="filtro">
                <label for="filtro">dsadsa</label>
            </div>

            </div>


            <div id="barraesq" style="border-bottom: 2px solid white; width: 80%; margin: auto;"></div>
           <?php $moeda = 'sim';
include("../classe/UsuarioSQL.php");
$moeda = $usu->GetMoeda();

$_SESSION['moeda'] =  $usu->GetMoeda();?>
        </div>
        <div class="conteudo" style="width: 100%;">
            <div style="margin: 0 20px 0 20px ;">
                <!-- <h2 style="float: left;">*Coloque o mouse na esquerda para os <br> filtros, e na direita a organização</h2> -->
                <h2 style="float: right;">KofCoins <?php echo $moeda?> </h2>
            </div>

            <form method=post>
            <div class="container">
            <?php

$buscaritem = "venda";
include_once("../classe/ItemSQL.php");
if($SQL->execute()) {
  while ($ri = $SQL->fetch(PDO::FETCH_OBJ)) { 
?>
                <div>
                    <img src="../img/among-us-icon-png-02.png" alt="">
                    <h3><?php echo $ri->desc_tipo_item?></h3>
                    <h3><?php echo $ri->desc_item?></h3>
                    <button  name=iditem  value=<?php echo $ri->IdItem;?> class="comprar"><h1><?php echo $ri->valor;?>.00K$</h1></button>
                </div>
                
               <?php
}}

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
               
            </div>

        
            <div class="container">
                
        
            </div>

        </div>
        <div class="preco" style="display: none;">
            <h2> Ordenar</h2>

            <div style="border-bottom: 2px solid white; width: 80%; margin: auto;"></div>

            <div class="ordem">
            <input type="radio" name="ordem" id="1">
            <label for="1">Alfabética</label><br>
            <input type="radio" name="ordem" id="2">
            <label for="2">Maior preço</label><br>
            <input type="radio" name="ordem" id="3">
            <label for="3">Menor preço</label>
        </div>



        <div id="barradi" style="border-bottom: 2px solid white; width: 80%; margin: auto;"></div>

        </div>



    </div>
</body>

<script>
    $(document).ready(function(){
    $('.preco').hover(function(){
        $(this).prev().toggleClass('conteudo2');
    });
});
</script>

</html>