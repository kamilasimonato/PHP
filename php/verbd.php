<?php
	//Linhas 3 e 4 estão buscanddo informações do formulário para verificar se existem no banco de dados. A entrada é feita pelo usuário.
	$x=$_POST["email"];
	$y=$_POST["senha"];

	//Faz a conexão com o banco de dados - considerar o PHPMyAdmin através do servidor, usuário, senha e database - seguir esta ordem
	$conecta=mysqli_connect("localhost","root","","infocurso");

	//Consulta SQL que irá verificar se na tabela usuario existe os campos login e senha, conforme informados pelo usuário através do formulário
	$verificarls=mysqli_query($conecta,"select * from usuario where email='$x' and senha='$y'");

	//Guarda na variável $campostabela os dados das colunas do select, conforme execução através da variável $verificarls
	$campostabela = mysqli_fetch_assoc($verificarls);

	//$Verifica a quantidade de linhas que trouxe a execução da consulta SQL através da variável $verificarls. 
	if(mysqli_num_rows($verificarls)==0){
		//Se o total de linhas for igual a 0, então não foi localizado o usuário e senha na tabela do BD, então ele executa um update na tabela, somando 1 na quantidade de tentativas, se existir o login. Agora se não existir, aí ele não soma
		$gravarvezes=mysqli_query($conecta,"update usuario set vezes=vezes+1 where email='$x'");
		echo "Usuario invalido!";
		echo "<p><a href='../login.html'>Tente outro ou cadastre um novo usuario</a>";
	}
	else{
		//Agora se a quantidade de linhas que trouxe a execução do SQL for maior que 0, então ele encontrou o login e a senha informados pelo usuário, aí ele verifica o total de vezes que o usuário tentou efetuar o login.
		if ($campostabela["vezes"]>3){
				//Se a quantidade de vezes que o usuário tentou foi maior que 3, então ele desativa o usuário, por questão de segurança, devido a quantidade de tentativas de acesso
				echo "Usuario desativado!";
				echo "<p><a href='../login.html'>Tente outro ou cadastre um novo usuario</a>";
		}	
		else{
				//O usuário terá acesso com o login e senha, sendo apresentado o nome dele.
				//Aqui abre uma sessão no PHP fazendo com que variáveis fiquem públicas para serem usadas no decorrer do programa até que a sessão seja desativada
				session_start(); //Ativando a sessão para usarmos as variáveis públicas
   				$_SESSION['email'] = $x; //Aqui x é a variável de login, fornecida pelo usuário onde ficará pública para ser usada nas demais páginas do PHP. Estas variáveis ficarão ativas até que façamos a desativação da sessão
   				$_SESSION['nome'] = $campostabela["nome"];

   				include "principal.php"; //Irá apresentar o conteúdo do arquivo externo do PHP - menu.php
			}
	}
?>