<?php
session_start();
session_destroy();
session_start();
$_SESSION['login'] = $_POST['login'];
$_SESSION['senha'] = MD5($_POST['senha']);;

$connect = mysqli_connect('estoquesites.mysql.dbaas.com.br','estoquesites','Estoque@123');
$db = mysqli_select_db($connect, 'estoquesites') or die(mysqli_error($connect));

$resultado =mysqli_query($connect, "SELECT login FROM usuarios WHERE login='".$_SESSION['login']."' ORDER BY RAND() LIMIT 1");
$row = mysqli_fetch_array($resultado);

if ($row['login'] == $_POST['login']){
    echo( "olá $_SESSION[login]");
    header("Location:mapa.php");
}
else {echo"algo deu errado, por favor, tente se cadastrar";}



?>

