<?php
include('menu.php');
?>
<html>
<head> 
	<title>Lista de Produtos</title>
</head>
	<body>
	<h2 align="center">Lista de Produtos</h2><hr>
	<?php
	//CONEXÃO COM BANCO
	require_once "conecta.php";
	//COMANDO SQL PARA SELECIONAR TODOS OS REGISTROS
	$sql1="SELECT * FROM produtos";
	//EXECUÇÃO DO COMANDO
	$res=mysqli_query($conexao,$sql1);
	//SETANDO UM REGISTRO POR VEZ
	while($registro=mysqli_fetch_row($res))
	{
	$codigo_produto=$registro[0];
	$nome_produto=$registro[1];
	$descricao_produto=$registro[2];
	$preco=number_format($registro[3],2,",",",");
	echo "Código: $codigo_produto<br>";
	echo "Nome: $nome_produto<br>";
	echo "Descrição: $descricao_produto<br>";
	echo "Preço: $preco<br>";
	}
	//FECHANDO A CONEXÃO
	mysqli_close($conexao);
	?>
	</body>
</html>