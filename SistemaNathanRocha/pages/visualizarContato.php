<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Visualizar Contatos</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
<div class="page justify-content-between">
  <?php include('../components/header.html');
  session_start();
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    session_destroy();
  } 
  if (isset($_GET['cod'])) {
    include_once '../classes/ClassePessoa.php';
      $pessoa = new Pessoa();
      $dados= $pessoa -> Consultar($_GET['cod']);  

  ?>
    <div class="content justify-content-center pt-3 pb-3 "> 

      <div class="form-group container">
        <label for="mostrarNome">Nome</label>
        <input type="text" value="<?php echo($dados[0]) ?>" class="form-control" disabled="">
      </div>
      <div class="form-group container">
        <label for="mostrarSobrenome">Sobrenome</label>
        <input type="text" class="form-control" value="<?php echo($dados[1]) ?>" disabled="">
      </div>       
      
      <div class="container d-flex justify-content-between flex-wrap">
        <h3>Contatos</h3>
        <a href="adicionarContato.php?cod=<?php echo($_GET['cod']) ?>" class="btn btn-outline-primary my-2 my-sm-0"><i class="fas fa-user-plus"></i> Adicionar Contato</a>         
      </div>

      <div class="table p-3">
        <?php
        include_once '../classes/ClasseContato.php';
        $contato = new Contato();
        echo $contato -> Listar($_GET['cod']);
        ?>
      </div>
    </div>
    <?php
 }else{
  ?>
  <div>Erro ao entrar na pagina</div>
  <a href="index.php">Voltar para Pagina inicial</a>
  <?php
 }
    include('../components/footer.html')  ?>

</div>


</body> 
</html>

