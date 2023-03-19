<html>

<meta charset="UTF-8">
	<title>GAM - O jogo</title>


<a href='mapa.php?esquerda=true'>ESQUERDA</a>
<a href='mapa.php?direita=true'>DIREITA</a>
<div>
<div class="container" width="200" height="50">
		Bem vindo
	</div>

 <canvas  id="mundo" width="1500" height="1200" style="background-image:url(mapa1.jpg)">   
    </canvas>
    </html>

<?php 

header('X-Content-Type-Options: nosniff');
//header("Refresh: 0.1; url = mapa.php");


if (isset($_GET['esquerda'])) {
    esquerda();
}


if (isset($_GET['direita'])) {
    direita();
}



$connect = mysqli_connect('estoquesites.mysql.dbaas.com.br','estoquesites','Estoque@123');
$db = mysqli_select_db($connect, 'estoquesites') or die(mysqli_error($connect));

$resultx= mysqli_query($connect, "SELECT x FROM NPCs WHERE nome = 'Monstro1' ORDER BY RAND() LIMIT 1");
$rowx = mysqli_fetch_array($resultx);

$resulty= mysqli_query($connect, "SELECT y FROM NPCs WHERE nome = 'Monstro1' ORDER BY RAND() LIMIT 1");
$rowy = mysqli_fetch_array($resulty);


function esquerda(){

    $connect = mysqli_connect('estoquesites.mysql.dbaas.com.br','estoquesites','Estoque@123');
$db = mysqli_select_db($connect, 'estoquesites') or die(mysqli_error($connect));
$resultxx = mysqli_query($connect, "UPDATE NPCs set x=x-16 WHERE nome = 'Monstro1'");
}
;


function direita(){
   
    $connect = mysqli_connect('estoquesites.mysql.dbaas.com.br','estoquesites','Estoque@123');
$db = mysqli_select_db($connect, 'estoquesites') or die(mysqli_error($connect));
    $resultxx = mysqli_query($connect, "UPDATE NPCs set x=x+16 WHERE nome = 'Monstro1'");
}



echo"<script language='javascript' type='text/javascript'>


let canvas = document.getElementById('mundo');
let ctx = canvas.getContext('2d');
var xx = $rowx[0];
var yy = $rowy[0];
const drawImage = new Image();
    drawImage.src = 'LL.png';

    drawImage.onload = () => {
   

  
          ctx.drawImage(drawImage, xx, yy, 50,50);
    };


          


         
  
        
  
  
  </script>";


     
  ?>




  


 





