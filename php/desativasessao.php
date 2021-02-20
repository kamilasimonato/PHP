<?php
	session_destroy();

	unset($_SESSION['login'],$_SESSION['nome']);
	header("Location: ../login.html");
?>