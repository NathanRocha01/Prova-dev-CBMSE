
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Adicionar Contato</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <div class="page justify-content-between">
    <?php include('../components/header.html');
      if (isset($_GET['cod'])) {
    include_once '../classes/ClasseContato.php';
      $contato = new contato();
      $dados= $contato -> Consultar($_GET['cod']);
    ?>
    
    <div class="content justify-content-center col-md-4 mx-auto pt-3 pb-3 "> 

      <div class="container d-flex justify-content-between flex-wrap">
        <h3>Editar Contato</h3>    
      </div>

      <div class="form-group container">
        <label for="mostrarNome">Nome</label>
        <input type="text" value="<?php echo($dados[2]) ?>" class="form-control" disabled="">
      </div>
      <div class="form-group container">
        <label for="mostrarSobrenome">Sobrenome</label>
        <input type="text" value="<?php echo($dados[3]) ?>" class="form-control" disabled="">
      </div>  

      <form action="../processamento/CrudContato" method="post" class="">
        <input type="hidden" name="cod" value="<?php echo($_GET['cod']) ?>">
        <input type="hidden" name="pessoa_id" value="<?php echo($dados[1]) ?>">
          <div class="container">
            <div class="form-group">
              <label for="selectContato">Tipo de Contato</label>
              <select class="form-control" name="tipo_contato_id" id="selectContato">
                <?php
                switch ($dados[4]) {
                  case '1':
                    echo "<option value='1' selected>Telefone</option>
                          <option value='2' >Celular</option>
                          <option value='3' >E-mail</option>
                          <option value='4' >Outros</option>";
                    break;
                  case '2':
                    echo "<option value='1' >Telefone</option>
                          <option value='2' selected>Celular</option>
                          <option value='3' >E-mail</option>
                          <option value='4' >Outros</option>";
                    break;
                  case '3':
                    echo "<option value='1' >Telefone</option>
                          <option value='2' >Celular</option>
                          <option value='3' selected>E-mail</option>
                          <option value='4' >Outros</option>";
                    break;
                  case '4':
                    echo "<option value='1' >Telefone</option>
                          <option value='2' >Celular</option>
                          <option value='3' >E-mail</option>
                          <option value='4' selected>Outros</option>";
                    break;
                }
                ?>
              </select>
            </div>
            
            <div class="form-group">
              <label for="inputAddContato">Informe o Contato</label>
              <input type="text" name="contato" value="<?php echo($dados[0]) ?>" class="form-control" required="" id="inputAddContato">
            </div>
          </div>

          <div class="form-group container">
            <input type="submit" name="submit" value="Alterar" class="btn btn-primary"></input>
            <a href="visualizarContato.php?cod=<?php echo($dados[1]) ?>" class="btn btn-primary">Cancelar</a>
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
