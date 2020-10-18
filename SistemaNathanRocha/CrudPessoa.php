<!DOCTYPE html>
<html>
<head> 
	<title>CrudPessoa</title>
</head>
<body>
<?php
include_once 'ClassePessoa.php';
$pessoa = new Pessoa();
if (isset($_POST['submit'])) {
if ($_POST['submit']=="Enviar") {
$pessoa -> setNome("'".$_POST["nome"]."'");
$pessoa -> setSobrenome("'".$_POST["sobrenome"]."'");
$verificação = $pessoa -> Cadastro();
if ($verificação == "false") {
	session_start();
	$_SESSION['msg']= "<alert style='color: red; font-size: 10pt'>Usuário ja existe</alert>";
}else{
	session_start();
	$_SESSION['msg']= "<alert style='color: green; font-size: 10pt'>Cadastrado com sucesso</alert>";
}
}
if ($_POST['submit']=="Alterar"){
$pessoa -> setNome("'".$_POST["nome"]."'");
$pessoa -> setSobrenome("'".$_POST["sobrenome"]."'");
$verificação = $pessoa -> Alterar($_POST['cod']);
if ($verificação == "false") {
	session_start();
	$_SESSION['msg']= "<alert style='color: red; font-size: 10pt'>Dados do usuário ja existem</alert>";
}else{
	session_start();
	$_SESSION['msg']= "<alert style='color: green; font-size: 10pt'>Dados alterados com sucesso</alert>";
}

}
}
if (isset($_GET['acao'])) {
	if ($_GET['acao']=='-') {
		$pessoa->Excluir($_GET['cod']);	
	}

}
header("location: ListaContatos.php")
?>
</body>
</html>