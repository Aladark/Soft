<?php
// MensagemTopico.
class MensagemTopico{



  private $IdMensagem_Topico = null;
  private $Mensagem = null;
  private $Fk_IdTopico = null;
  private $Fk_IdUsuario = null;
  private $Data_Mensagem = null;






  
// Get the value of IdMensagem_Topico.

  public function getIdMensagemTopico()
  {
    return $this->IdMensagem_Topico;
  }

  
// Set the value of IdMensagem_Topico.

  public function setIdMensagemTopico($IdMensagem_Topico): self
  {
    $this->IdMensagem_Topico = $IdMensagem_Topico;

    return $this;
  }

  
// Get the value of Mensagem.

  public function getMensagem()
  {
    return $this->Mensagem;
  }

  
// Set the value of Mensagem.

  public function setMensagem($Mensagem): self
  {
    $this->Mensagem = $Mensagem;

    return $this;
  }

  
// Get the value of Fk_IdTopico.

  public function getFkIdTopico()
  {
    return $this->Fk_IdTopico;
  }

  
// Set the value of Fk_IdTopico.

  public function setFkIdTopico($Fk_IdTopico): self
  {
    $this->Fk_IdTopico = $Fk_IdTopico;

    return $this;
  }

  
// Get the value of Fk_IdUsuario.

  public function getFkIdUsuario()
  {
    return $this->Fk_IdUsuario;
  }

  
// Set the value of Fk_IdUsuario.

  public function setFkIdUsuario($Fk_IdUsuario): self
  {
    $this->Fk_IdUsuario = $Fk_IdUsuario;

    return $this;
  }

  
// Get the value of Data_Mensagem.

  public function getDataMensagem()
  {
    return $this->Data_Mensagem;
  }

  
// Set the value of Data_Mensagem.

  public function setDataMensagem($Data_Mensagem): self
  {
    $this->Data_Mensagem = $Data_Mensagem;

    return $this;
  }
}

?>