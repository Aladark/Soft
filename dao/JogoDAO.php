<?php
// Jogo.
class JogoDAO{

 private $IdJogo = null;
 private $Nome_Jogo = null;
 private $Desc_Jogo = null;
 private $Faixa_Etaria = null;
 private $Foto = null;




 
// Get the value of IdJogo.

 public function getIdJogo()
 {
  return $this->IdJogo;
 }

 
// Set the value of IdJogo.

 public function setIdJogo($IdJogo): self
 {
  $this->IdJogo = $IdJogo;

  return $this;
 }

 
// Get the value of Nome_Jogo.

 public function getNomeJogo()
 {
  return $this->Nome_Jogo;
 }

 
// Set the value of Nome_Jogo.

 public function setNomeJogo($Nome_Jogo): self
 {
  $this->Nome_Jogo = $Nome_Jogo;

  return $this;
 }

 
// Get the value of Desc_Jogo.

 public function getDescJogo()
 {
  return $this->Desc_Jogo;
 }

 
// Set the value of Desc_Jogo.

 public function setDescJogo($Desc_Jogo): self
 {
  $this->Desc_Jogo = $Desc_Jogo;

  return $this;
 }

 
// Get the value of Faixa_Etaria.

 public function getFaixaEtaria()
 {
  return $this->Faixa_Etaria;
 }

 
// Set the value of Faixa_Etaria.

 public function setFaixaEtaria($Faixa_Etaria): self
 {
  $this->Faixa_Etaria = $Faixa_Etaria;

  return $this;
 }

 
// Get the value of Foto.

 public function getFoto()
 {
  return $this->Foto;
 }

 
// Set the value of Foto.

 public function setFoto($Foto): self
 {
  $this->Foto = $Foto;

  return $this;
 }
}
?>