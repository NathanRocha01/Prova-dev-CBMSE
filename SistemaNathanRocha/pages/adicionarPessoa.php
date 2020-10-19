
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Adicionar Pessoa</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <div class="page justify-content-between">
    <?php include('../components/header.html')  ?>
    
    <div class="content justify-content-center col-md-4 mx-auto pt-3 pb-3 "> 

      <div class="container d-flex justify-content-between flex-wrap">
        <h3>Adicionar Pessoa</h3>    
      </div>

      <form action="../processamento/CrudPessoa" method="post" class="">
          <div class="form-group container">
            <label for="inputAddNome">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="João" id="inputAddNome" required="">
          </div>
          <div class="form-group container">
            <label for="inputAddSobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" placeholder="Silva dos Santos" id="inputAddSobrenome" required="">
          </div>
          <div class="form-group container">
            <input type="submit" name="submit" value="Enviar" class="btn btn-primary"></input>
            <a href='index.php' class="btn btn-primary">Cancelar</a>
          </div>
      </form>
    </div>

    <?php include('../components/footer.html')  ?>
  </div>
</body>
</html>
