<!DOCTYPE html>
<html>
<head> 
	<title>CrudContato</title>
</head>
<body>
<?php
include_once '../classes/ClasseContato.php';
$contato = new Contato();
$cod=0;
if (isset($_POST['submit'])) {
$cod = $_POST["pessoa_id"];
if ($_POST['submit']=="Enviar") {
$contato -> setContato("'".$_POST["contato"]."'");
$contato -> setPessoa_id("'".$_POST["pessoa_id"]."'");
$contato -> setTipo_contato_id("'".$_POST["tipo_contato_id"]."'");
$verificação = $contato -> Cadastro();
if ($verificação == "false") {
	session_start();
	$_SESSION['msg']= "<alert style='color: red; font-size: 20pt'>Contato ja existe</alert>";
}else{
	session_start();
	$_SESSION['msg']= "<alert style='color: green; font-size: 20pt'>Cadastrado com sucesso</alert>";
}
}
if ($_POST['submit']=="Alterar"){
$contato -> setContato("'".$_POST["contato"]."'");
$contato -> setPessoa_id("'".$_POST["pessoa_id"]."'");
$contato -> setTipo_contato_id("'".$_POST["tipo_contato_id"]."'");
$verificação = $contato -> Alterar($_POST['cod']);
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
	$cod=$_GET['cod_pessoa'];
	if ($_GET['acao']=='-') {
		$contato->Excluir($_GET['cod']);	
	}

}
header("location: ../pages/visualizarContato.php?cod=$cod")
?>
</body>
</html>