<!DOCTYPE html>
<html>
<head> 
	<title>CrudPessoa</title>
</head>
<body>
<?php
include_once '../classes/ClassePessoa.php';
$pessoa = new Pessoa();
if (isset($_POST['submit'])) {
if ($_POST['submit']=="Enviar") {
$pessoa -> setNome("'".$_POST["nome"]."'");
$pessoa -> setSobrenome("'".$_POST["sobrenome"]."'");
$verificação = $pessoa -> Cadastro();
if ($verificação == "false") {
	session_start();
	$_SESSION['msg']= "<alert style='color: red; font-size: 20pt'>Usuário ja existe</alert>";
}else{
	session_start();
	$_SESSION['msg']= "<alert style='color: green; font-size: 20pt'>Cadastrado com sucesso</alert>";
}
}
if ($_POST['submit']=="Alterar"){
$pessoa -> setNome("'".$_POST["nome"]."'");
$pessoa -> setSobrenome("'".$_POST["sobrenome"]."'");
$verificação = $pessoa -> Alterar($_POST['cod']);
if ($verificação == "false") {
	session_start();
	$_SESSION['msg']= "<alert style='color: red; font-size: 20pt'>Dados do usuário ja existem</alert>";
}else{
	session_start();
	$_SESSION['msg']= "<alert style='color: green; font-size: 20pt'>Dados alterados com sucesso</alert>";
}

}
}
if (isset($_GET['acao'])) {
	if ($_GET['acao']=='-') {
		$pessoa->Excluir($_GET['cod']);	
	}

}
header("location: ../pages/index.php")
?>
</body>
</html>