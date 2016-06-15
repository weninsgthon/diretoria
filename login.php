  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
  	<meta charset="utf-8">
  	<meta name="description" content="Document">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- As meta tags acima devem vir em primeiro lugar dentro do "head" qualquer
          outro conteúdo deve vir após essas tags -->
          <title>Login</title>
          <!-- Conteúdo CSS do Bootstrap -->
          <?php include 'css.php';?>

      </head>


      <body>
      	<div class="section">
      		<div class="container">
      			<div class="row">
      				<div class="col-sm-6 col-md-4 col-md-offset-4">
      					<img height="20" alt="logo" src="image/logo.png" class="center-block img-responsive">
      					<form role="form">
      						<div class="form-group">
      							<input class="form-control input-lg" id="Usuario" placeholder="Usuário" type="text">
      						</div>
      						<div class="form-group has-feedback">
      							<input class="form-control input-lg" id="exampleInputPassword1" type="password" placeholder="Senha">
      						</div>
      						<div class="form-group">
      							<div class="checkbox">
      								<label><input type="checkbox"> Lembrar-me</label></div>
      							</div><button type="submit" class="btn btn-block btn-lg btn-primary">Entrar</button></form>
      						</div>
      					</div>
      				</div>
      			</div>
      			<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
      			<?php include 'js.php';?>
      		</body>