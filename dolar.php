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

 <?php
/* Por Hugo Senna - hugosenna@gmail.com - www.hugosenna.com.br - 2013  */

function getPage($url, $referer='', $timeout=30, $header=''){
    if ($referer=='') $referer='http://'.$_SERVER['HTTP_HOST'];
    if(!isset($timeout)) $timeout=30;
    $curl = curl_init();
    if(strstr($referer,"://")){
      curl_setopt ($curl, CURLOPT_REFERER, $referer);
    }
    curl_setopt ($curl, CURLOPT_URL, $url);
    curl_setopt ($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
    curl_setopt ($curl, CURLOPT_HEADER, (int)$header);
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $html = curl_exec ($curl);
    curl_close ($curl);
    return $html;
    }

//url do site que vai ser nossa fonte
$url = 'http://economia.uol.com.br/cotacoes/';

$site = getPage($url);

$data1 = explode('<td class="pg-color4"', $site); //procurei a parte onde exibe os valores, e dou um explode para separa as colunas  da linha que contém a class "baixa"

$teste = explode('<td>', $data1[1]); // exibe a linha do Dólar comercial
$teste2 = explode('<td>', $data1[2]); // exibe a linha do Dólar turismo

?>

            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icofont icofont-bank"></i> PTAX - 10/06/2016, Sexta-feira:</h3>
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
                                <td><?php echo $teste[1];?></td>
                                <td><?php echo $teste[2];?></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
</body>
</html>