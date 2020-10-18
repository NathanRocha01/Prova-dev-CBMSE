<?php
Class Pessoa{
	private $Nome;
	private $Sobrenome;

//Construtor--------------------------
public function __construct(){
	$this->PreparaPessoa();
}
private function PreparaPessoa(){
	$this->Nome = "Não Informado";
	$this->Sobrenome = "Não Informado";
}
//------------------------------------

//GET e SET---------------------------
 public function getNome() {
    return $this->Nome;
  }
   public function getSobrenome() {
    return $this->Sobrenome;
  }
  public function setNome($Nome) {
    $this->Nome= $Nome;
  }
  public function setSobrenome($Sobrenome) {
    $this->Sobrenome= $Sobrenome;
  }
//------------------------------------

//Cadastro--------------------------
public function Cadastro(){
$Valores = [
0 => $this->getNome(),
1 => $this->getSobrenome(),
];

$Variaveis = [
    0 => "nome",
	1 => "sobrenome",
    ];

include_once 'ClasseBD.php';
$bd = new BD("pessoa");
$dados = $bd -> Consultar("nome = $Valores[0] AND sobrenome = $Valores[1]");
  if(isset($dados)){
  	$dados="false";
  }else{
  	$bd -> Cadastrar($Variaveis, $Valores);
  	$dados="true";
  }
  return $dados;
}
//--------------------------------

//Listar--------------------------
public function Listar(){
	$Variaveis = [
    0 => "nome",
	1 => "sobrenome",
    ];

  include_once 'ClasseBD.php';
  $bd = new BD("pessoa");
  $dados = $bd -> Consultar("1");
  if ($dados == null) {
    $tabela = "<alert style=' font-size: 18pt; position: absolute; top: 20%;left: 37%;'>Não há pessoas cadastradas</alert>";
	}elseif ($dados != null) {
		$tabela = "<table>";
    $tabela .="<thead>";
    $tabela .= "<tr>";
    $tabela .= "<th>Nome</th> 
    			<th>Ações</th>";
     $tabela .= "</tr>";
    $tabela .="</thead>";
    $tabela .="<tbody>";
    for ($i=0; $i < count($dados) ; $i++) { 
    	$tabela.="<tr>";
    	$tabela.="<td>".($dados[$i][$Variaveis[0]])." ".($dados[$i][$Variaveis[1]])."</td>";
    	$tabela.="<td style='word-spacing: 10px;'><a><i class='fas fa-plus'></i>AdicionarContato</a> <a href='ConsultarPessoa.php?cod=".$dados[$i]['id']."'><i class='far fa-eye'></i>Visualizar</a> <a href='EditarPessoa.php?cod=".$dados[$i]['id']."'><i class='fas fa-pencil-alt'></i>Editar</a> <a href='CrudPessoa.php?cod=".$dados[$i]['id']."&acao=-'><i class='far fa-trash-alt'></i>Deletar</a></td>";
    	$tabela.="</tr>";
    }
	}
return $tabela;
}
//--------------------------------

//Consultar--------------------
  public function Consultar($Codigo){
    $Variaveis = [
    0 => "nome",
	1 => "sobrenome",
    ];
    include_once 'ClasseBD.php';
    $bd = new BD("pessoa");
    $dados = $bd -> Consultar("id = '$Codigo'");
    for ($j=0; $j < count($dados); $j++) { 
     for ($i=0; $i < count($Variaveis); $i++) { 
    $vars[] = $dados[$j][$Variaveis[$i]]; 
  }
}
return $vars;
}
//-----------------------------

//Alterar----------------------
public function Alterar($codigo){ 
$Valores = [
0 => $this->getNome(),
1 => $this->getSobrenome(),
];

$Variaveis = [
    0 => "nome",
	1 => "sobrenome",
    ];
    include_once 'ClasseBD.php';
    $bd = new BD("pessoa");
	$dados = $bd -> Consultar("nome = $Valores[0] AND sobrenome = $Valores[1]");
  if(isset($dados)){
  	$dados="false";
  }else{
  	$bd -> Alterar($Variaveis, $Valores, "id",$codigo);
  	$dados="true";
  }
  return $dados;
  }
//-----------------------------

//Excluir----------------------
  public function Excluir($codigo){
  include_once 'ClasseBD.php';
  $bd = new BD("pessoa");
  $bd -> Excluir("id",$codigo); 
  }
//-----------------------------
}
?>