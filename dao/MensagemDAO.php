<?php
 // Mensagem.
 class MensagemDAO{
	 
 private $Fk_IdUsuario = null;
 private $Mensagem = null;
 private $Data_Mensagem = null;
 private $Fk_IdUsuarioReceptor = null;
 private $Fk_IdGrupos = null;


 // Get the value of Fk_IdUsuario.
  public function GetFk_IdUsuario(){
		   return $this->Fk_IdUsuario;
	   }
	   // Set the value of Fk_IdUsuario.
	   public function SetFk_IdUsuario($fk_idusuario){
		   $this->Fk_IdUsuario = $fk_idusuario;
	   }
 // Get the value of Mensagem.
 public function GetMensagem(){
		   return $this->Mensagem;
	   }
	   // Set the value of Fk_IdUsuario.
	   public function SetMensagem($mensagem){
		   $this->Mensagem = $mensagem;
	   }
 // Get the value of Data_Mensagem.
 public function GetData_Mensagem(){
		   return $this->Data_Mensagem;
	   }
	   // Set the value of Fk_IdUsuario.
	   public function SetData_Mensagem($data_mensagem){
		   $this->Data_Mensagem = $data_mensagem;
	   }
 // Get the value of Fk_IdUsuarioReceptor.
 public function GetFk_IdUsuarioReceptor(){
		   return $this->Fk_IdUsuarioReceptor;
	   }
	   // Set the value of Fk_IdUsuario.
	   public function SetFk_IdUsuarioReceptor($fk_idusuarioreceptor){
		   $this->Fk_IdUsuarioReceptor = $fk_idusuarioreceptor;
	   }
 // Get the value of Fk_IdGrupos.
public function GetFk_IdGrupos(){
		   return $this->Fk_IdGrupos;
	   }
	   // Set the value of Fk_IdUsuario.
	   public function SetFk_IdGrupos($fk_idgrupos){
		   $this->Fk_IdGrupos = $fk_idgrupos;
	   }

	}
?>