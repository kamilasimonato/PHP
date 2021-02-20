<?php
	//Faz a conexão com o banco de dados - considerar o PHPMyAdmin através do servidor, usuário, senha e database - seguir esta ordem
	$conecta=mysqli_connect("localhost","root","","infocurso");
	
	//Busca o conteúdo da variável sessão criada através da página verbd.php
	session_start();
   	$usuariologado=$_SESSION['usuario'];

   	//Executa consulta SQL para apresentar os dados da tabela no PHP. Observem que ele está buscando os dados através da sessão login ($usuariologado)
   	$buscardadosnoBD=mysqli_query($conecta,"SELECT * FROM usuario WHERE email='$usuariologado'");

   	//Guarda na variável $campostabela os dados repassados com a execução do select
   	$campostabela = mysqli_fetch_assoc($buscardadosnoBD);
   	
   	//Apresenta os dados através de cada campo
   	echo "<p>----------------------------------------------<p>";
   	echo "Nome: " . $campostabela["nome"] . "<p>";
   	echo "Senha: " . $campostabela["senha"] . "<p>";
   	echo "Total de vezes que acessou incorretamente com login e senha: " . $campostabela["vezes"];
   	echo "<p>----------------------------------------------<p>";
   	echo "<p><a href='principal.php'>Voltar ao menu </a>";
?>