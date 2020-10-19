
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Editar Pessoa</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <div class="page justify-content-between">
    <?php include('../components/header.html');  
    if (isset($_GET['cod'])) {
    include_once '../classes/ClassePessoa.php';
      $pessoa = new Pessoa();
      $dados= $pessoa -> Consultar($_GET['cod']);
      ?>
    
    <div class="content justify-content-center col-md-4 mx-auto pt-3 pb-3 "> 

      <div class="container d-flex justify-content-between flex-wrap">
        <h3>Editar Pessoa</h3>    
      </div>

      <form action="../processamento/CrudPessoa" method="post" class="">
          <div class="form-group container">
            <input type="hidden" name="cod" value="<?php echo($_GET['cod']) ?>">
            <label for="inputMudarNome">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="João" id="inputMudarNome" value="<?php echo($dados[0]) ?>" required="">
          </div>
          <div class="form-group container">
            <label for="inputMudarSobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" placeholder="Silva dos Santos" id="inputMudarSobrenome" value="<?php echo($dados[1]) ?>" required="">
          </div>
          <div class="form-group container">
            <input type="submit" name="submit" value="Alterar" class="btn btn-primary"></input>
            <a href='index.php' class="btn btn-primary">Cancelar</a>
          </div>
      </form>
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
