<?php
	$nome = $_POST["nome"]."\r\n";
	$datanas = $_POST["data"]."\r\n";
	$telefone = $_POST["telefone"]."\r\n";
	$email = $_POST["email"]."\r\n";
	$cidade = $_POST["cidade"]."\r\n\n";
	$arquivo = fopen("C:/xampp/htdocs/trabalhopwb/txt/pessoascontato.txt","a");
	fwrite($arquivo,"Nome: ".$nome);
	fwrite($arquivo,"Data: ".$datanas);
	fwrite($arquivo,"Telefone: ".$telefone);
	fwrite($arquivo,"Email: ".$email);
	fwrite($arquivo,"Cidade: ".$cidade);
	fclose($arquivo);
	echo "Os dados foram salvos no arquivo de texto";
?>
<html>
	<p><a href="../contato.html" id="letramaior">Voltar a pagina de contato</a></p>
</html>
