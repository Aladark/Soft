<?php
// Forma_Pagamento
class Forma_PagamentoDAO{

private $IdForma_Pagamento = null;
private $Descricao = null;



// Get the value of IdForma_Pagamento.
public function getIdFormaPagamento()
{
return $this->IdForma_Pagamento;
}

// Set the value of IdForma_Pagamento.
public function setIdFormaPagamento($IdForma_Pagamento)
{
$this->IdForma_Pagamento = $IdForma_Pagamento;

return $this;
}

// Get the value of Descricao.
public function getDescricao()
{
return $this->Descricao;
}

// Set the value of IdForma_Pagamento.
public function setDescricao($Descricao)
{
$this->Descricao = $Descricao;

return $this;
}
}
?>