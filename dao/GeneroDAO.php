<?php
// Genero
class GeneroDAO { 

 private $IdGenero = null;
 private $Desc_Genero = null;


 // Get the value of IdGenero.
 public function getIdGenero()
 {
  return $this->IdGenero;
 }

 // Set the value of IdGenero.
 public function setIdGenero($IdGenero)
 {
  $this->IdGenero = $IdGenero;

  return $this;
 }

 // Get the value of Desc_Genero.
 public function getDescGenero()
 {
  return $this->Desc_Genero;
 }

 // Set the value of Desc_Genero.
 public function setDescGenero($Desc_Genero)
 {
  $this->Desc_Genero = $Desc_Genero;

  return $this;
 }
}

?>