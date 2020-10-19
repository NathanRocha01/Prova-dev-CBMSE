<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Home</title>

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
   ?>

    <div class="content justify-content-center pt-3 pb-3 "> 
      
      <div class="container d-flex justify-content-between flex-wrap">
        <h3>Lista dos Contatos</h3>
        <a href="adicionarPessoa.php" class="btn btn-outline-primary my-2 my-sm-0"><i class="fas fa-user-plus"></i> Adicionar Pessoa</a>         
      </div>

      <div class="table p-3">
        <?php
        include_once '../classes/ClassePessoa.php';
        $pessoa = new Pessoa();
        echo $pessoa -> Listar();
        ?>
      </div>
    </div>
    
    <?php include('../components/footer.html') ?>

</div>


</body> 
</html>

