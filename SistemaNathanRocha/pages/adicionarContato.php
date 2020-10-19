
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
    include_once '../classes/ClassePessoa.php';
      $pessoa = new Pessoa();
      $dados= $pessoa -> Consultar($_GET['cod']);  
    ?>
    
    <div class="content justify-content-center col-md-4 mx-auto pt-3 pb-3 "> 

      <div class="container d-flex justify-content-between flex-wrap">
        <h3>Adicionar Contato</h3>    
      </div>

      <div class="form-group container">
        <label for="mostrarNome">Nome</label>
        <input type="text" value="<?php echo($dados[0]) ?>" class="form-control" disabled="">
      </div>
      <div class="form-group container">
        <label for="mostrarSobrenome">Sobrenome</label>
        <input type="text" value="<?php echo($dados[1]) ?>" class="form-control" disabled="">
      </div>  

      <form action="../processamento/CrudContato" method="post" class="">
        <input type="hidden" name="pessoa_id" value="<?php echo($_GET['cod']) ?>">
          <div class="container">
            <div class="form-group">
              <label for="selectContato">Tipo de Contato</label>
              <select class="form-control" name="tipo_contato_id" id="selectContato" required="">
                <option data-default disabled selected></option>
                <option value="1" >Telefone</option>
                <option value="2" >Celular</option>
                <option value="3" >E-mail</option>
                <option value="4" >Outros</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="inputAddContato">Informe o Contato</label>
              <input type="text" name="contato" required="" class="form-control" id="inputAddContato">
            </div>
          </div>

          <div class="form-group container">
            <input type="submit" name="submit" value="Enviar" class="btn btn-primary"></input>
            <a href="visualizarContato.php?cod=<?php echo($_GET['cod']) ?>" class="btn btn-primary">Cancelar</a>
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
