 <?php
	// Amizade.
	class AmizadeDAO
	{
		private $Fk_idusuario = null;
		private $fk_idamigo = null;
		private $data_solicitacao = null;
		private $data_confirmacao = null;
		private $confirmacao = null;

		// Get the value of Fk_IdUsuario.
		public function GetFk_IdUsuario()
		{
			return $this->Fk_IdUsuario;
		}
		// Set the value of Fk_IfdUsuario.
		public function SetFk_IdUsuario($fk_idusuario)
		{
			$this->Fk_IdUsuario = $fk_idusuario;
		}

		// Get the value of Fk_IdAmigo.
		public function GetFk_IdAmigo()
		{
			return $this->Fk_IdAmigo;
		}
		// Set the value of Fk_IdAmigo.
		public function SetFk_IdAmigo($fk_idamigo)
		{
			$this->Fk_IdAmigo = $fk_idamigo;
		}

		// Get the value of Data_Solicitacao.
		public function GetData_Solicitacao()
		{
			return $this->Data_Solicitacao;
		}
		// Set the value of Data_Solicitacao.
		public function SetData_Solicitacao($data_solicitacao)
		{
			$this->Data_Solicitacao = $data_solicitacao;
		}

		// Get the value of Data_Confirmacao.
		public function GetData_Confirmacao()
		{
			return $this->Data_Confirmacao;
		}
		// Set the value of Data_Confirmacao.
		public function SetData_Confirmacao($data_confirmacao)
		{
			$this->Data_Confirmacao = $data_confirmacao;
		}

		// Get the value of Confirmacao.
		public function GetConfirmacao()
		{
			return $this->Confirmacao;
		}
		// Set the value of Confirmacao.
		public function SetConfirmacao($confirmacao)
		{
			$this->Confirmacao = $confirmacao;
		}
	}
	?>