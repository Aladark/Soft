<?php
// Grupo
class Grupo{


 private $IdGrupos = null;
 private $Nome_Grupo = null;
 private $Descricao_Grupo = null;
 private $QuantidadeMax = null;
 private $Fk_IdJogo = null;
 private $Data_Grupo = null;


 //Get the value of IdGrupos
 public function getIdGrupos()
 {
  return $this->IdGrupos;
 }


//Set the value of IdGrupos
 public function setIdGrupos($IdGrupos)
 {
  $this->IdGrupos = $IdGrupos;

  return $this;
 }


//Get the value of Nome_Grupo
 public function getNomeGrupo()
 {
  return $this->Nome_Grupo;
 }


//Set the value of Nome_Grupo
 public function setNomeGrupo($Nome_Grupo)
 {
  $this->Nome_Grupo = $Nome_Grupo;

  return $this;
 }


//Get the value of Descricao_Grupo
 public function getDescricaoGrupo()
 {
  return $this->Descricao_Grupo;
 }


//Set the value of Descricao_Grupo
 public function setDescricaoGrupo($Descricao_Grupo)
 {
  $this->Descricao_Grupo = $Descricao_Grupo;

  return $this;
 }


//Get the value of QuantidadeMax
 public function getQuantidadeMax()
 {
  return $this->QuantidadeMax;
 }


//Set the value of QuantidadeMax
 public function setQuantidadeMax($QuantidadeMax)
 {
  $this->QuantidadeMax = $QuantidadeMax;

  return $this;
 }


//Get the value of Fk_IdJogo
 public function getFkIdJogo()
 {
  return $this->Fk_IdJogo;
 }


//Set the value of Fk_IdJogo
 public function setFkIdJogo($Fk_IdJogo)
 {
  $this->Fk_IdJogo = $Fk_IdJogo;

  return $this;
 }


//Get the value of Data_Grupo
 public function getDataGrupo()
 {
  return $this->Data_Grupo;
 }


//Set the value of Data_Grupo
 public function setDataGrupo($Data_Grupo)
 {
  $this->Data_Grupo = $Data_Grupo;

  return $this;

}
}
?>