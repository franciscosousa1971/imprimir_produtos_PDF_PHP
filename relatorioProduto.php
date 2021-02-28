<?php

//Carrega a biblioteca fpdf.

require('fpdf/fpdf.php');

//Deriva uma classe PDF extendida da classe FPDF.

class PDF extends FPDF
{

//Cria o método de cabeçalho (Header ).

function Header()
{

//Define o texto a 5.5 cm da margem esquerda e a 0.5 cm da margem superior.

$this->SetXY(5.5, 0.5);

//Definimos a fonte.

$this->SetFont('Arial','B',15);

//Escrevemos o texto do cabeçalho.

$this->Write(1.5,'RELATORIO DE PRODUTOS');

//Quebra de linha

$this->Ln(0.5);

//Define o texto a 7.5 cm da margem esquerda e a 1 cm da margem superior.

$this->SetXY(7.5, 1);

//Definimos a fonte.

$this->SetFont('Arial','B',10);

//Escrevemos o autor do texto.

$this->Write(1.5,'PRODUTOS S/A');

//Quebra de linha para não sobrepor com o texto do corpo do documento

$this->Ln(2);

//Fim do método de cabeçalho).

}

//Cria o método de rodapé (Footer).

function Footer()
{

// Definimos a fonte

$this->SetFont('Arial','',10);

//Define o texto a 5 cm da margem esquerda e a -2 cm da margem inferior.

$this->SetXY(5,-2);

// Escrevemos o texto do rodapé.

$this->Write(1.5,'Copyright 2021 PRODUTOS S/A - Todos os direitos reservados');

//Define o texto a 8.5 cm da margem esquerda e a -1.5 cm da margem inferior.

$this->SetXY(8.5,-1.5);

//Define o número de páginas.

$this->Write(1.5,'Pagina '.$this->PageNo().' de {total}');

//Fim do método de rodapé).

}

//Fim da definição da classe extendida PDF

}

//Criamos um objeto a partir da classe extendida PDF que criamos no início.

$pdf=new PDF('P','cm','A4');

//Define o número de páginas total para o rodapé.

$pdf->AliasNbPages('{total}');

//Adiciona uma página nova ao documento.

$pdf->AddPage();

//Define a fonte arial, negrito tamanho 12.

$pdf->SetFont('Arial','B',12);

//Comando sql para selecionar registros existentes.
include_once("conecta.php");

$sql = "SELECT codigo_produto, nome_produto, descricao_produto from produtos ORDER BY nome_produto ASC";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$pdf->Write(1,'Codigo :'.$row['codigo_produto']);
$pdf->Ln();
$pdf->Write(1,'Nome :'.$row['nome_produto']);
$pdf->Ln();
$pdf->Write(1,'Descricao :'.$row['descricao_produto']);
$pdf->Ln();
$pdf->Write(1,'-----------------------------------------------------------------------------------------------------------------------------');
$pdf->Ln();
}
}
//Mostra o texto na tela do navegador

$pdf->Output();

?>