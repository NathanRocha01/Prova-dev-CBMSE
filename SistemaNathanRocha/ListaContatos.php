<!DOCTYPE html>
<html>
<head>
	<title>Lista dos Contatos</title>
	<script src="https://kit.fontawesome.com/c9c913ec2e.js"></script>
	<style type="text/css">
		div{
			position: absolute;
			top: 10%;
			left: 10%;
			font-family: Arial;
			font-size: 25pt;
		}
		button{
			position: absolute;
			top: 11%;
			left: 70%;
			background-color: white;
			padding: 15px 32px;
			font-family: Arial;
			transition-duration: 0.5s;
			border-radius: 5px;
		}
		button:hover{
			background-color: black;
			color: white;
		}
		table{
			position: absolute;
			top: 20%;
			left: 30%;

			/*width: 71.5%;*/
			border-collapse: collapse;
		}
		table, tr, td, th{
			border: 1px solid black;
			padding: 10px;
		}
		tbody{
			text-align: center;
		}
		i{
			margin: 0 5px;
		}
	</style>
	</head>
<body>
	<?php
	session_start();
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		session_destroy();
	}
	?>
<div>Lista dos contatos</div>
<a href="CadastrarPessoa.php"><button><i class="fas fa-plus"></i>Adicionar Pessoa</button></a>
<?php
include_once 'ClassePessoa.php';
  $pessoa = new Pessoa();
  echo $pessoa -> Listar();
?>
</body>
</html>
