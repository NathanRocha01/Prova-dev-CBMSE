<?php
Class BD{ 
   private $servername;
   private $username;
   private $password;
   private $dbname;
   private $Tabela;

//Construtor----------------------
   public function __construct($Nome){
     $this-> PreparaBanco($Nome);
 }

 private function PreparaBanco($Nome){
  $this->servername = "localhost";
  $this->username = "root";
  $this->password = "";
  $this->dbname = "agenda";
  $this->Tabela = $Nome;
}
//--------------------------------

//Get e Set-----------------------
public function getServername() {
  return $this->servername;
}
public function getUsername() {
  return $this->username;
}
public function getPassword() {
  return $this->password;
}
public function getDBname() {
  return $this->dbname;
}
public function getTabela() {
  return $this->Tabela;
}

public function setServername($servename) {
  $this->servename= $servename;
}
public function setUsername($username) {
  $this->username= $username;
}
public function setPassword($password) {
  $this->password= $password;
}
public function setDBname($dbname) {
  $this->dbname= $dbname;
}
public function setTabela($tabela) {
  $this->Tabela= $tabela;
}
//--------------------------------

//Conectar----------------------
private function ConectarBanco(){
  $con = mysqli_connect($this->getServername(), $this->GetUsername(), $this->GetPassword(), $this->GetDBname());
  if(!$con){
    die("Connection failed".mysqli_connect_error());
}else{
    return $con;
}
}
//------------------------------

//Cadastrar---------------------
public function Cadastrar($Atributos, $Variaveis){
  $atr = " ";
  $cond = null;
  for ($i=0; $i < count($Atributos); $i++) {
    $atr .= $Atributos[$i].",";
}
$var = " ";
for ($i=0; $i < count($Variaveis); $i++) {
    $var .= $Variaveis[$i].",";
}
$atributos = substr($atr, 1, -1);
$variaveis = substr($var, 1, -1);
$linha = "INSERT INTO `".$this->GetTabela()."` ($atributos) VALUES ($variaveis)";
echo "$linha";
if (mysqli_query($this->ConectarBanco(),$linha)) {
  $cond = true;
}else{
 //die("Insert Erro".mysql_error());
$cond = false;
}
return $cond;
}
//------------------------------


//Alterar------------------------
public function Alterar($Atributos,$Variaveis,$Chave,$id){
  $inicio = "UPDATE `".$this->GetTabela()."` SET ";
  for ($i=0; $i < count($Atributos); $i++) {
    $inicio .= $Atributos[$i]." = ".$Variaveis[$i].",";
}
$linha = substr($inicio, 0, -1)." WHERE ".$this->GetTabela().".$Chave = '$id'";
echo "$linha";
if (mysqli_query($this->ConectarBanco(),$linha)) {
}else{
 //die("Insert Erro ".mysql_error());
}
}
//-------------------------------

//Excluir------------------------
public function Excluir($Chave,$id){
  $linha = "DELETE FROM `".$this->GetTabela()."` WHERE ".$this->GetTabela().".$Chave = '$id'";
  echo "$linha";
  if (mysqli_query($this->ConectarBanco(),$linha)) {
  }else{
     //die("Insert Erro ".mysql_error());
 }
}
//-------------------------------

//Consulta-----------------------
public function Consultar($Condição){
  $linha = "SELECT * FROM `".$this->GetTabela()."` WHERE $Condição";
  $linhas = null;
  if (mysqli_query($this->ConectarBanco(),$linha)) {
    $result = mysqli_query($this->ConectarBanco(),$linha);
}else{
 //die("Insert Erro".mysql_error());
$linhas = false;
}
if (isset($result)) {
  if (mysqli_num_rows($result)==0) {
    $dado = null;
  }else{
    while ($dados = mysqli_fetch_assoc($result)) {
    $dado[] = $dados;
    }
  }
}
return $dado;
}
//-------------------------------

//Consulta especifica------------
public function ConsultarEspecifica($Variavel,$Condição){
  $linha = "SELECT $Variavel FROM `".$this->GetTabela()."` $Condição";
  $linhas = null; 
  //echo "<strong style='color: white'> $linha </strong> <br>";
  if (mysqli_query($this->ConectarBanco(),$linha)) {
    $result = mysqli_query($this->ConectarBanco(),$linha);
}else{
 //die("Insert Erro".mysql_error());
$linhas = false;
}

if (isset($result)) {
  if (mysqli_num_rows($result)==0) {
    $dado = null;
  }else{
    while ($dados = mysqli_fetch_assoc($result)) {
    $dado[] = $dados;
    }
  }
}
return $dado;
}
//-------------------------------
}	
?>