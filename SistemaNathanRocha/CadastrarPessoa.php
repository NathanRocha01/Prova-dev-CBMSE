<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Pessoa</title>
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
 <div>Cadastrar Pessoa</div>
 <form action="CrudPessoa.php" method="post">
 	Nome:<br>
 	<input type="text" name="nome" placeholder="Ex: Nathan" required=""><br>
 	Sobrenome:<br>
 	<input type="text" name="sobrenome" placeholder="Ex: Rocha" required=""><br>
 	<input type="submit" class="boton" name="submit" value="Enviar">
 	<a href="ListaContatos.php"><input type="button" class="boton" value="Cancelar" style="left: 118%"></a>
 </form>
</body>
</html>