<?php
	session_start();
	include "conexao_mysql.php";
	//Remover as informações dos usuários.
	unset($_SESSION['email'], $_SESSION['senha']);
	header("Location: ../login.html");
?>
