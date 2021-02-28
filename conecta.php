<?php
	$servidor="localhost"; //NOME DO SERVIDOR
	$bd="banco"; //NOME DO BANCO DE DADOS
	$usuario="root"; //USUÁRIO
	$senha="usbw"; //SENHA
	$conexao=mysqli_connect($servidor,$usuario, $senha)or die("ERRO NA CONEXÃO");
	$db=mysqli_select_db($conexao,$bd)or die("ERRO NA SELEÇÃO DO DATABASE");
?>
	