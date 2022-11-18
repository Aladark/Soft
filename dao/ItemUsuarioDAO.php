<?php
// ItemJogo.
class ItemJogo{

 private $IdItem_Usuario = null;
 private $Desc_Item = null;
 private $Valor = null;
 private $Data_Venda = null;
 private $Fk_IdJogo = null;
 private $Fk_Usuario_Vendedor = null;



 
// Get the value of IdItem_Usuario.

 public function getIdItemUsuario()
 {
  return $this->IdItem_Usuario;
 }

 
// Set the value of IdItem_Usuario.

 public function setIdItemUsuario($IdItem_Usuario): self
 {
  $this->IdItem_Usuario = $IdItem_Usuario;

  return $this;
 }

 
// Get the value of Desc_Item.

 public function getDescItem()
 {
  return $this->Desc_Item;
 }

 
// Set the value of Desc_Item.

 public function setDescItem($Desc_Item): self
 {
  $this->Desc_Item = $Desc_Item;

  return $this;
 }

 
// Get the value of Valor.

 public function getValor()
 {
  return $this->Valor;
 }

 
// Set the value of Valor.

 public function setValor($Valor): self
 {
  $this->Valor = $Valor;

  return $this;
 }

 
// Get the value of Data_Venda.

 public function getDataVenda()
 {
  return $this->Data_Venda;
 }

 
// Set the value of Data_Venda.

 public function setDataVenda($Data_Venda): self
 {
  $this->Data_Venda = $Data_Venda;

  return $this;
 }

 
// Get the value of Fk_IdJogo.

 public function getFkIdJogo()
 {
  return $this->Fk_IdJogo;
 }

 
// Set the value of Fk_IdJogo.

 public function setFkIdJogo($Fk_IdJogo): self
 {
  $this->Fk_IdJogo = $Fk_IdJogo;

  return $this;
 }

 
// Get the value of Fk_Usuario_Vendedor.

 public function getFkUsuarioVendedor()
 {
  return $this->Fk_Usuario_Vendedor;
 }

 
// Set the value of Fk_Usuario_Vendedor.

 public function setFkUsuarioVendedor($Fk_Usuario_Vendedor): self
 {
  $this->Fk_Usuario_Vendedor = $Fk_Usuario_Vendedor;

  return $this;
 }
}
?>