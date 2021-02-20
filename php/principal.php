<?php
	session_start();
	include "conexao_mysql.php";
	
	if (!isset($_SESSION))
		session_start();
	
	$nomeusuario=$_SESSION['nome'];
	
	echo "Bem-vindo(a) " . $nomeusuario;
	
	echo "<p><a href='dadosgerais.php'> Seu cadastro </a><p>";
	echo "<a href='desativasessao.php'> Desativa Sessao </a><p>";
	
	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Página Principal</title>
		
		<link href="../estilos/bootstrap.min.css" rel="stylesheet">
		<link href="../estilos/bootstrap-theme.min.css" rel="stylesheet">
		<link href="../estilos/theme.css" rel="stylesheet">
		<link href="../estilos/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<script src="../scripts/ie-emulation-modes-warning.js"></script>
		<script src="../scripts/jquery.js"></script>
	</head>
	<body role="document">		
		<?php
			include("menu.php");
			include("bem_vindo.php");
		?>				
		<script src="../scripts/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
		<script src="../scripts/bootstrap.min.js"></script>
		<script src="../scripts/docs.min.js"></script>
		<script src="../scripts/ie10-viewport-bug-workaround.js"></script>
		<button type="button">Matricula</button>
    </body>
</html>
