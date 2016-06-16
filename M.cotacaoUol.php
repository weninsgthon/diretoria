<?
//importar a classe
require("class.UOLCotacoes.php");

$uol = new UOLCotacoes(); // criar uma instancia da classe

//receber os valores
list($dolarComercialCompra, $dolarComercialVenda, $dolarTurismoCompra, $dolarTurismoVenda, $euroCompra, $euroVenda, $libraCompra, $libraVenda, $pesosCompra, $pesosVenda) = $uol->pegaValores();
// Demonstrativo por Minha conta *--Paulo de Paula
echo "Dolar Comercial Para Compra:".$dolarComercialCompra; ?> <br> <?
echo "Dolar Comercial Para Venda: ".$dolarComercialVenda;  ?> <br> <?
echo "Dolar Turismo Para Compra:  ".$dolarTurismoCompra;   ?> <br> <?
echo "Dolar Turismo Para Venda:   ".$dolarTurismoVenda ;   ?> <br> <?
echo "Euro Para Compra:           ".$euroCompra;           ?> <br> <?
echo "Euro Para Venda:            ".$euroVenda;            ?> <br> <?
echo "Libra Para Compra 		  ".$libraCompra;		   ?> <br> <?
echo "Libra Para Venda            ".$libraVenda;		   ?> <br> <?
echo "Peso Para Compra 			  ".$pesosCompra;		   ?> <br> <?
echo "Peso Para Venda			  ".$pesosVenda;		   ?> <br> <?
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>      <br>    <br><br><br>

<!--$data = "data"	=> "/pg-color10.*dolar-comercial-estados-unidos/", -->
<!-- Identação minha mesmo -->
<? echo "Direitos autorais by Fofinho do T.I.  :)" ?>
