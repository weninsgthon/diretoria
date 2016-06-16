<?php
// -------------------------------- //
// Origem: http://sites.google.com/site/silviogarbes/dicas/cotacao-do-dolar
// Autor: Sílvio Garbes Lara <silviogarbes@gmail.com>
// http://www.silviogarbes.com.br
// -------------------------------- //

function cotacaoDolar(){
        //abrindo  arquivo
        if(!$fp=fopen("http://economia.uol.com.br/cotacoes/" ,"r" )) { 
            echo "Erro ao abrir a página de cotação" ; 
            return(0);
        } 

        //variáveis de classe
        $arrayValores = array();

        //inicio do processamento - ler página
        $uolHTML = "";
        while(!feof($fp)) { // leia o conteúdo da página, uma linha por vez, armazene na variável uolHTML
            $uolHTML .= fgets($fp); 
        }
        fclose($fp);



$position = value("peso" => "dolarComercial" => "/pg-color10.*dolar-comercial-estados-unidos/",)
         
//echo "<pre>";
//print_r($uolHTML);

       for($i=0; $i<count($uolHTML->channel->item); $i++){
         if($uolHTML->channel->item[$i]->guid == 'US$PTAX'){
           $ptax_id = $i;
         }else
         if($uolHTML->channel->item[$i]->guid == 'US$'){
           $dolar_id = $i;
         }
       }

         $texto_ptax_temp = explode("<div id='value'>",$uolHTML->channel->item[$ptax_id]->description);
         $texto_ptax_temp1 = explode("</div>",$texto_ptax_temp[1]);
         $texto_ptax_temp2 = explode("</div>",$texto_ptax_temp[2]);
         $texto_ptax['data'] = substr($uolHTML->channel->item[$ptax_id]->pubDate,5,2)." ".substr($uolHTML->channel->item[$ptax_id]->pubDate,8,3)." (PTAX)";
         $texto_ptax['compra'] = $texto_ptax_temp1[0];
         $texto_ptax['venda'] = $texto_ptax_temp2[0];

         $texto_dolar_temp = explode("<div id='value'>",$uolHTML->channel->item[$dolar_id]->description);
         $texto_dolar_temp1 = explode("</div>",$texto_dolar_temp[1]);
         $texto_dolar_temp2 = explode("</div>",$texto_dolar_temp[2]);
         $texto_dolar['data'] = substr($uolHTML->channel->item[$dolar_id]->pubDate,5,2)." ".substr($uolHTML->channel->item[$dolar_id]->pubDate,8,3)."";
         $texto_dolar['compra'] = $texto_dolar_temp1[0];
         $texto_dolar['venda'] = $texto_dolar_temp2[0];

//echo "</pre>";

         $tabela_cotacao = $tabela_cotacao."</center>";
         
         return $tabela_cotacao;
}

echo cotacaoDolar();
?>