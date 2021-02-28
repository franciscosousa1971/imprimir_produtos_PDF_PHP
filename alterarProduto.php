<?php
include('menu.php');
?>
<html>
<head> 
	<title>Alteração de Produtos</title>
</head>
	<body>
		<h2 align="center">Alteração de Produtos</h2><hr>
		<?php
		require_once("conecta.php");
		if (!isset($_POST["cod"])&& !isset($_POST["enviar"])){
		?>
			<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			<p>Código do Produto:<input type="text" name="cod" />
			<input type="submit" value="ALTERAR PRODUTO" name="alterar"></p>
			</form>
		<?php
		}
		else if(!isset($_POST["enviar"])){
		$codigo_produto=$_POST["cod"];
		$sql1="select * from produtos where codigo_produto='".$codigo_produto."'";
		$res1=mysqli_query($conexao,$sql1);
		$l=mysqli_num_rows($res1);
		if ($l==0) 
		{
			echo "Produto não encontrado $codigo_produto";}
		else{ 
			echo "Produto encontrado";
			$registro=mysqli_fetch_row($res1);//seta a linha de registro do
			$nome_produto=$registro[1];
			$descricao_produto=$registro[2];
			$preco=$registro[3];
		?>
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		<p>Código:<input type="text" name="cod" size="40" value="<?php echo
		$codigo_produto; ?>" </b><br><br>
		Nome:<input type="text" name="nome_produto" value="<?php echo
		$nome_produto;?>"><br>
		Descricao:<br><textarea rows="2" name="descricao_produto"cols="30"><?php
		echo $descricao_produto;?> </textarea><br>
		Preço:<input type="text" name="preco" value="<?php echo
		$preco;?>"><br>
		<input type ="hidden" name="codigo_produto" value="<?php echo
		$codigo_produto;?>">
		<input type ="hidden" name="enviar"
		value="S">
		<input type ="submit" value="Alterar produto" name="Alterar"></p>
		</form>
		<?php
		mysqli_close($conexao);
		}
	}else{
		$codigo_produto=$_POST["cod"];
		$nome=$_POST["nome_produto"];
		$descricao=$_POST["descricao_produto"];
		$preco=$_POST["preco"];
		$sql="UPDATE produtos SET
		nome_produto='$nome',descricao_produto='$descricao',preco='$preco' WHERE
		codigo_produto=$codigo_produto";
		if(mysqli_query($conexao,$sql)){
			echo"<p align='center'>Produto alterado comsucesso!</p>";
			}else{
				$erro=mysqli_error($conexao);
				echo "<p align='center'>Erro:$erro</p>";
			}
			mysqli_close($conexao);
		}
		?>
	</body>
</html>