<?php
	include "conexao_mysql.php";
	
		$varnome = $_POST["nome"];
		$varemail = $_POST["email"];
		$varsenha = $_POST["senha"];
		include "criptografia.php";
		$varfoto = $_POST["foto"];
		$query = mysqli_query($conexao, "INSERT INTO usuario
		(email,senha,foto,nome) VALUES
		('$varemail','$criptografando', '$varfoto', '$varnome')");
		echo '<script language="JavaScript" charset="uft-8">
		alert("Cadastro efetuado com sucesso!")</script></p>';
?>
<html>
	<p><a href="../formcadastro.html" id="letramaior">Voltar a pagina de cadastro</a></p>
</html>