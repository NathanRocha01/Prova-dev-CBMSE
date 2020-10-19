<?php
Class Contato{
	private $contato;
  private $pessoa_id;
  private $tipo_contato_id;

//Construtor--------------------------
public function __construct(){
	$this->PreparaContato();
}
private function PreparaContato(){
	$this->contato = "Não Informado";
	$this->pessoa_id = 0;
  $this->tipo_contato_id = 0;
}
//------------------------------------

//GET e SET---------------------------
  public function getContato() {
    return $this->contato;
  }
  public function getPessoa_id() {
    return $this->pessoa_id;
  }
  public function getTipo_contato_id(){
    return $this->tipo_contato_id;
  }
  public function setContato($contato) {
    $this->contato= $contato;
  }
  public function setPessoa_id($pessoa_id) {
    $this->pessoa_id= $pessoa_id;
  }
  public function setTipo_contato_id($tipo_contato_id){
    $this->tipo_contato_id= $tipo_contato_id;
  }
//------------------------------------

//Cadastro--------------------------
public function Cadastro(){
$Valores = [
0 => $this->getContato(),
1 => $this->getPessoa_id(),
2 => $this->getTipo_contato_id(),
];

$Variaveis = [
    0 => "contato",
	  1 => "pessoa_id",
    2 => "tipo_contato_id"
    ];

include_once 'ClasseBD.php';
$bd = new BD("contato_pessoa");
$dados = $bd -> Consultar("contato = $Valores[0]");
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
public function Listar($cod){
	$Variaveis = [
    0 => "contato",
    1 => "pessoa_id",
    2 => "tipo_contato_id"
    ];

  include_once 'ClasseBD.php';
  $bd = new BD("contato_pessoa");
  $dados = $bd -> ConsultarEspecifica("contato_pessoa.id, `contato`, pessoa_id, tipo_contato.nomecontato","INNER JOIN pessoa ON pessoa.id = contato_pessoa.pessoa_id INNER JOIN tipo_contato ON tipo_contato.id = contato_pessoa.tipo_contato_id WHERE pessoa.id=$cod");
  if ($dados == null) {
    $tabela = "<alert style=' font-size: 18pt;'>Não há contatos cadastradas</alert>";
	}elseif ($dados != null) {
		$tabela = "<table class='table table-striped'>";
    $tabela .="<thead>";
    $tabela .= "<tr>";
    $tabela .= "<th  scope='col'>Tipo</th>
                <th  scope='col'>Contato</th> 
    			       <th  scope='col'>Ações</th>";
     $tabela .= "</tr>";
    $tabela .="</thead>";
    $tabela .="<tbody>";
    for ($i=0; $i < count($dados) ; $i++) { 
    	$tabela.="<tr>";
      $tabela.="<td>".($dados[$i]["nomecontato"])."</td>";
    	$tabela.="<td>".($dados[$i][$Variaveis[0]])."</td>";
    	$tabela.="<td class='d-flex justify-content-between flex-wrap'><a href='editarContato.php?cod=".$dados[$i]['id']."'><i class='fas fa-pencil-alt'></i>Editar</a> <a href='../processamento/CrudContato.php?cod=".$dados[$i]['id']."&acao=-&cod_pessoa=".$dados[$i]['pessoa_id']."'><i class='far fa-trash-alt'></i>Deletar</a></td>";
    	$tabela.="</tr>";
    }
    $tabela.="</tbody>";
    $tabela.="</table>";
	}
  return $tabela;
}
//--------------------------------

//Consultar--------------------
  public function Consultar($Codigo){
    $Variaveis = [
    0 => "contato",
    1 => "pessoa_id",
    2 => "nome",
    3 => "sobrenome",
    4 => "tipo_contato_id",
    ];
    include_once 'ClasseBD.php';
    $bd = new BD("contato_pessoa");
    $dados = $bd -> ConsultarEspecifica("contato_pessoa.id, `contato`, contato_pessoa.pessoa_id, pessoa.nome, pessoa.sobrenome, contato_pessoa.tipo_contato_id", "INNER JOIN pessoa ON pessoa.id = contato_pessoa.pessoa_id INNER JOIN tipo_contato ON tipo_contato.id = contato_pessoa.tipo_contato_id WHERE contato_pessoa.id=$Codigo");
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
0 => $this->getContato(),
1 => $this->getPessoa_id(),
2 => $this->getTipo_contato_id(),
];

$Variaveis = [
    0 => "contato",
    1 => "pessoa_id",
    2 => "tipo_contato_id"
    ];
    include_once 'ClasseBD.php';
    $bd = new BD("contato_pessoa");
	$dados = $bd -> Consultar("contato = $Valores[0] AND tipo_contato_id = $Valores[2]");
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
  $bd = new BD("contato_pessoa");
  $bd -> Excluir("id",$codigo); 
  }
//-----------------------------
}
?>