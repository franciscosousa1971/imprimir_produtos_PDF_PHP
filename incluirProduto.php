<?php
include('menu.php');
?>
<html>
<head> 
	<title>Inclusão Registros</title>
</head>
	<body>
	<h2 align="center">Inclusão de Produtos</h2><hr>
	<?php
	require_once("conecta.php");
	if(!isset($_POST["enviar"])){
	?>
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		Nome:<input type="text" name="nome_produto">
		<br>
		Descrição:<br><textarea rows="2" name="descricao_produto" cols="30"></textarea>
		<br>
		Preço:<input type="text" name="preco" ><br>
		<input type ="hidden" name="enviar" value="S">
		<br> 
		<input type="submit" value="Incluir Produto" name="incluir"></p>
		</form>
	<?php
	}else{
		if ($conexao){
			$nome=$_POST["nome_produto"];
			$descricao=$_POST["descricao_produto"];
			$preco=$_POST["preco"];
			$sql="insert into produtos(nome_produto,descricao_produto,preco)
			values('$nome','$descricao','$preco')";
			if (mysqli_query($conexao, $sql)){
				echo"<p align='center'>Produto incluido com sucesso!</p>";
			}else{
				$erro=mysqli_error();
				echo "<p align='center'>Erro: $erro</p>";
			}
		}
	}
	mysqli_close($conexao);
	?>
	</body>
</html>