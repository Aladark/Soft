<?php
// MeusJogos.
class MeusJogosDAO{

 private $fk_idjogo = null;
 private $fk_idusuario = null;
 private $nick_jogo = null;





 
// Get the value of fk_idjogo.

 public function getFkIdjogo()
 {
  return $this->fk_idjogo;
 }

 
// Set the value of fk_idjogo.

 public function setFkIdjogo($fk_idjogo): self
 {
  $this->fk_idjogo = $fk_idjogo;

  return $this;
 }

 
// Get the value of fk_idusuario.

 public function getFkIdusuario()
 {
  return $this->fk_idusuario;
 }

 
// Set the value of fk_idusuario.

 public function setFkIdusuario($fk_idusuario): self
 {
  $this->fk_idusuario = $fk_idusuario;

  return $this;
 }

 
// Get the value of nick_jogo.

 public function getNickJogo()
 {
  return $this->nick_jogo;
 }

 
// Set the value of nick_jogo.

 public function setNickJogo($nick_jogo): self
 {
  $this->nick_jogo = $nick_jogo;

  return $this;
 }
}
?>