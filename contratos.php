  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
   <meta charset="utf-8">
   <meta name="description" content="Document">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- As meta tags acima devem vir em primeiro lugar dentro do "head" qualquer
          outro conteúdo deve vir após essas tags -->
          <title>Contratos Firmados</title>
          <!-- Conteúdo CSS do Bootstrap -->
          <?php include 'css.php';?>
        </head>
        <body>
          <!-- Menu) -->
          <?php include 'menu.php';?>
          <?php include 'connect.php';?>
          
          
          <?php
          $stid0 = oci_parse($conn0,"select distinct DESCRICAO_PRODUTO AS P from GM_CTR_2017");
          oci_execute($stid0);
          ?>

          <?php
          $stid1 = oci_parse($conn0,"select distinct descricao_safra as SAFRA from safras order by 1");
          oci_execute($stid1);
                  ?>

          <div class="section">
            <div class="container-fluid">
              <div class="row">
                <!-- Select) -->
                <div class="col-md-4">
                  <form form-role="form" method="get" action="contratos.php ">
                   <div class="form-group">
                     <label class="control-label">Produto</label>

                     <!--select do produto -->
                     <select class="form-control" id="produto" name="produto">
                       <option></option>
                       <?php while (oci_fetch($stid0)) {
                        $VV_PROD = oci_result($stid0,'P');
                        ?>
                        <option> <?php echo "$VV_PROD"; ?> </option>
                        <?php
                      }
                      ?> 
                      <!--select da Safra -->
                    </select>
                    <label class="control-label">Safra</label>
                    <select class="form-control" id="safra" name="safra">
                     <option></option>
                     <?php while (oci_fetch($stid1)) {
                      $Safra = oci_result($stid1,'SAFRA');
                      ?>
                      <option> <?php echo "$Safra"; ?> </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Gerar</button>
                <br>
              </form>
            </div>

            <!--comparativos sacas inverso -->
            <div class="col-md-4">
             <div class="panel panel-primary">
              <div class="panel-heading">
              <!--<div class="dolar.php">-->
                <h3 class="panel-title"><i class="fa fa-area-chart" aria-hidden="true"></i> Comparativo de valor por saca inverso</h3>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="success text-center">QUANTIDADE</th>
                          <th class="success text-center">VALOR</th>
                          <th class="success text-center">MÉDIA(SC)</th>
                          
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <td></td>
          
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="success"></th>
                          <th class="success"></th>
                          <th class="success"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!--ptax -->
            <?php include "dolar.php";?>
            <div class="col-md-6">
            
            </div>

            <?php

            //Consulta ao BANCO DE DADOS

            $VPRODUTO= $_GET['produto'];
            $VSAFRA= $_GET['safra'];
            $stid = oci_parse($conn0, "select NR_CONTRATO, NOME_CLIENTE, DATA_CONTRATO, DESCRICAO_PRODUTO, SIGLA_MOEDA, round(QUANTIDADE/60) AS SACAS, VALOR_TOTAL, round(VALOR_UNITARIO,2) as UNITARIO from GM_CTR_2017 where DESCRICAO_PRODUTO = '$VPRODUTO'");

            oci_execute($stid);
           //while ($row = oci_fetch_row($stid)) {
             # code...
            // echo $row[DES_EMPRESA]."<br>";
            //}

            ?>
            <!--contratos firmados -->
            <div class="section">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Contratos Firmados</h3>
                      </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-striped">
                           <thead>
                            <tr>
                              <th class="success text-center">Contrato</th>
                              <th class="success text-center">Data</th>
                              <th class="success text-center">Cliente</th>
                              <th class="success text-center">Produto</th>
                              <th class="success text-center">Quantidade</th>
                              <th class="success text-center">Moeda <br></th>
                              <th class="success text-center">Valor Contrato</th>
                              <th class="success text-center">Unit. Saca(60kg)</th>
                              <th class="success text-center">Embarcar</th>
                              <th class="success text-center">Saldo Embarcar</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <tr>
                             <?php
                             $totalsacas=0;
                             while (oci_fetch($stid)) {
                              $totalsacas=$totalsacas+oci_result($stid, 'SACAS');
                              echo "<td>".oci_result($stid, 'NR_CONTRATO')."</td>";
                              echo "<td>".oci_result($stid, 'DATA_CONTRATO')."</td>";
                              echo "<td>".oci_result($stid, 'NOME_CLIENTE')."</td>";
                              echo "<td>".oci_result($stid, 'DESCRICAO_PRODUTO')."</td>";
                              echo "<td>".oci_result($stid, 'SACAS')."</td>";
                              echo "<td>".oci_result($stid, 'SIGLA_MOEDA')."</td>";
                              echo "<td>".oci_result($stid, 'VALOR_TOTAL')."</td>";
                              echo "<td>".oci_result($stid, 'UNITARIO')."</td>";
                              echo "<td>".oci_result($stid, '')."</td>";
                              echo "<td>".oci_result($stid, '')."</td>";
                              echo "</tr>";
                            }
                            echo "<tr><td><td><td><td><td>".$totalsacas."</td></tr>";
                          
                            

                            oci_free_statement($stid);
                            oci_close($conn);
                            ?>
                            <tr class="warning">
                              <td>Totais em <i class="fa fa-usd" aria-hidden="true"></i>
                              </td>
                              <td>8</td>
                              <td></td>
                              <td></td>
                              <td><i class="fa fa-usd" aria-hidden="true"></i>
                              </td>
                              <td>79.000.000,00</td>
                              <td>22.000.000,00</td>
                              <td><i class="fa fa-usd" aria-hidden="true"></i>
                               16,93</td>
                               <td></td>
                               <td>79.000.000,00</td>
                             </tr>
                             <tr class="info">
                              <td>Totais em R$</td>
                              <td>3</td>
                              <td></td>
                              <td></td>
                              <td>R$</td>
                              <td>9.000.000,00</td>
                              <td>11.450.000,00</td>
                              <td>R$ 76,33</td>
                              <td></td>
                              <td>9.000.000,00</td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr class="success">
                              <th class="text-center">Total Geral</th>
                              <th class="text-center">11</th>
                              <th class="text-center"></th>
                              <th class="text-center"></th>
                              <th class="text-center">R$</th>
                              <th class="text-center">88.000.000,00</th>
                              <th class="text-center">86.450.000,00</th>
                              <th class="text-center">R$ 59,00</td>
                                <th class="text-center"></th>
                                <th class="text-center">88.000.000,00</th>
                              </tr>
                            </tfoot>

                          </tbody>
                        </table>


                      </div>



                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
          <?php include 'js.php';?>
        </body>
        </html>