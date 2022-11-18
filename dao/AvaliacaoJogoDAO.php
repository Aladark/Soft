<?php
// AvaliacaoJogo
class AvaliacaoJogoDAO
{

    private $Fk_IdJogo = null;
    private $Fk_IdUsuario = null;
    private $Avaliacao = null;
    private $Comentario = null;
    private $Data_Avaliacao = null;


    // Get the value of Fk_IdJogo.
    public function getFkIdJogo()
    {
        return $this->Fk_IdJogo;
    }

    // Set the value of Fk_IdJogo.
    public function setFkIdJogo($Fk_IdJogo)
    {
        $this->Fk_IdJogo = $Fk_IdJogo;
        return $this;
    }

    // Get the value of Fk_IdUsuario.
    public function getFkIdUsuario()
    {
        return $this->Fk_IdUsuario;
    }

    // Set the value of Fk_IdUsuario.
    public function setFkIdUsuario($Fk_IdUsuario)
    {
        $this->Fk_IdUsuario = $Fk_IdUsuario;

        return $this;
    }

    // Get the value of Avaliacao.
    public function getAvaliacao()
    {
        return $this->Avaliacao;
    }

    // Set the value of Avaliacao.
    public function setAvaliacao($Avaliacao)
    {
        $this->Avaliacao = $Avaliacao;

        return $this;
    }

    // Get the value of Comentario.
    public function getComentario()
    {
        return $this->Comentario;
    }

    // Set the value of Comentario.
    public function setComentario($Comentario)
    {
        $this->Comentario = $Comentario;

        return $this;
    }

    // Get the value of Data_Avaliacao.
    public function getDataAvaliacao()
    {
        return $this->Data_Avaliacao;
    }

    // Set the value of Data_Avaliacao.
    public function setDataAvaliacao($Data_Avaliacao)
    {
        $this->Data_Avaliacao = $Data_Avaliacao;

        return $this;
    }
}
