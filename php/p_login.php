<?php
  include "conexao_mysql.php";
  
   $varemail=$_POST["email"];
   $varsenha=$_POST["senha"];
   include "criptografia.php";
	$criptografando2 = base64_encode($varsenha);
	
   if($criptografando !== $criptografando2){
	$novasenha = base64_decode($criptografando);
	$query = mysqli_query($conexao, "UPDATE usuario set senha = '$novasenha' where email = '$varemail'");
	$sql_logar = mysqli_query($conexao,"SELECT * FROM usuario WHERE email = '$varemail' && senha = '$novasenha'");    
	$sql_campos = mysqli_fetch_assoc($sql_logar);
   }else{
	 $sql_logar = mysqli_query($conexao,"SELECT * FROM usuario WHERE email = '$varemail' && senha = '$varsenha'");    
	$sql_campos = mysqli_fetch_assoc($sql_logar);
   }
   if (mysqli_num_rows($sql_logar) == 0){
		echo '<script language="JavaScript" charset="utf-8">alert("Login Inválido!")</script>';
		include "verbd.php";
   }
   else{
    session_start();
		$_SESSION["nome"]    = $sql_campos["nome"];
	 	$_SESSION["usuario"] = $_POST["email"];
		$_SESSION["foto"] = $sql_campos["foto"];
		$_SESSION["ultimoacesso"] = $sql_campos["ultimoacesso"];
		header("Location: principal.php");     
   }
?>
