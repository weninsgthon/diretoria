<!DOCTYPE html>
<html>
<head>
<?php include 'css.php';?>
    <title>Testando</title>

    <script type="text/javascript">
    $(function(){
       $.ajax({
          url: 'http://www4.bcb.gov.br/pec/taxas/batch/taxas.asp?id=txdolar', // página da requisição externa
          type: 'GET',
          // parâmetro "html" vem com o conteúdo da página completo
          success: function(html) {

           // Pegamos somente <li> da página externa
            var $lis = $(html).find('#conteudo > tr > th');

           // Mandamos para o elemento de id "cabecalho" da nossa página
            $("#cabecalho").html($lis);
        }
      }); 
    });
    </script>
</head>
<body>

<?php

  $linha = file ("http://www4.bcb.gov.br/pec/taxas/batch/taxas.asp?id=txdolar/");

  for ( $i = 23; $i <= 31; $i ++ )
     echo $linha[$i];

?>
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<?php include 'js.php';?>     
</body>
</html>