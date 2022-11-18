<?php
// ContaReceber.
class ContaReceber{

    private $IdConta_Receber = null;
    private $Valor = null;
    private $Data_Recebimento = null;
    private $Fk_Venda_Usuario = null;
    private $Fk_IdVenda = null;


    // Get the value of IdConta_Receber.
    public function getIdContaReceber()
    {
        return $this->IdConta_Receber;
    }

    // Set the value of IdConta_Receber.
    public function setIdContaReceber($IdConta_Receber)
    {
        $this->IdConta_Receber = $IdConta_Receber;

        return $this;
    }

    // Get the value of Valor.
    public function getValor()
    {
        return $this->Valor;
    }

    // Set the value of Valor.
    public function setValor($Valor)
    {
        $this->Valor = $Valor;

        return $this;
    }

    // Get the value of Data_Recebimento.
    public function getDataRecebimento()
    {
        return $this->Data_Recebimento;
    }

    // Set the value of Data_Recebimento.
    public function setDataRecebimento($Data_Recebimento)
    {
        $this->Data_Recebimento = $Data_Recebimento;

        return $this;
    }

    // Get the value of Fk_Venda_Usuario.
    public function getFkVendaUsuario()
    {
        return $this->Fk_Venda_Usuario;
    }
    // Set the value of Fk_Venda_Usuario.
    public function setFkVendaUsuario($Fk_Venda_Usuario)
    {
        $this->Fk_Venda_Usuario = $Fk_Venda_Usuario;

        return $this;
    }

    // Get the value of Fk_IdVenda.
    public function getFkIdVenda()
    {
        return $this->Fk_IdVenda;
    }
    // Set the value of Fk_IdVenda.
    public function setFkIdVenda($Fk_IdVenda)
    {
        $this->Fk_IdVenda = $Fk_IdVenda;

        return $this;
    }
}




?>