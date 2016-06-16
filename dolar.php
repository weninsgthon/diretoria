<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <meta name="description" content="Document">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As meta tags acima devem vir em primeiro lugar dentro do "head" qualquer
        outro conteúdo deve vir após essas tags -->
        <title>Document</title>
        <!-- Conteúdo CSS do Bootstrap -->
        <?php include 'css.php';?>
    </head>
    <body> 

        <?
            //importar a classe
             require("class.UOLCotacoes.php");

            $uol = new UOLCotacoes(); // criar uma instancia da classe

            //receber os valores
            list($dolarComercialCompra, $dolarComercialVenda, $dolarTurismoCompra, $dolarTurismoVenda, $euroCompra, $euroVenda, $libraCompra, $libraVenda, $pesosCompra, $pesosVenda) = $uol->pegaValores();
            //Data e hora local padrao America/Porto_Velho
            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Porto_Velho');
            $date = date('d/m/Y,');

            $dia = strftime('%A'."-FEIRA");
                          
            
        ?>

            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icofont icofont-bank"></i> PTAX - <?echo $date.strtoupper($dia);?></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Taxa de Compra</th>
                                    <th class="text-center">Taxa de Venda</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <td><?php echo $dolarComercialCompra;?></td>
                                <td><?php echo $dolarComercialVenda;?></td>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
</body>
</html>