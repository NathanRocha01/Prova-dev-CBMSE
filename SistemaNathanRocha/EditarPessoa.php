<!DOCTYPE html>
<html> 
<head>
	<title>Editar Pessoa</title>
	<style type="text/css">
		div{
			position: absolute;
			top: 10%;
			left: 10%;
			font-family: Arial;
			font-size: 25pt;
		}
		form{
			position: absolute;
			top: 20%;
			left: 10%;
			font-family: Arial;
			line-height: 1.5;
		}
		.boton{
			position: absolute;
			top: 125px;
			left: 80%;
		}
	</style>
</head>
<body>
	<?php
	if (isset($_GET['cod'])) {
		include_once 'ClassePessoa.php';
  		$pessoa = new Pessoa();
  		$dados= $pessoa -> Consultar($_GET['cod']);
		?>
 <div>Editar dados da Pessoa</div>
 <form action="CrudPessoa.php" method="post">
 	<input type="hidden" name="cod" value="<?php echo($_GET['cod']) ?>">
 	Nome:<br>
 	<input type="text" name="nome" value="<?php echo($dados[0]) ?>" required=""><br>
 	Sobrenome:<br>
 	<input type="text" name="sobrenome" value="<?php echo($dados[1]) ?>" required=""><br>
 	<input type="submit" class="boton" name="submit" value="Alterar">
 	<a href="ListaContatos.php"><input type="button" class="boton" value="Cancelar" style="left: 118%"></a>
 	<?php
 }else{
 	?>
 	<div>Erro ao entrar na pagina</div>
 	<a href="ListaContatos.php">Voltar para Pagina inicial</a>
 	<?php
 }
 	?>
 </form>
</body>
</html>