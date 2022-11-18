<?php
// AvaliacaoJogo
class AvaliacaousuarioDAO
{
    private $idAvaliacaousuario = null;
    private $Fk_IdUsuario = null;
    private $Fk_IdGrupos = null;
    private $Avaliacao = null;
    private $Comenatario = null;
    private $Denuncia = null;
    private $Revisasdo = null;
    private $Data_Avaliacao = null;
    private $Fk_IdModerador = null;

    public function getidAvaliacaousuario()
    {
        return $this->Fk_IdUsuario;
    }

    // Set the value of Fk_IdUsuario.
    public function setidAvaliacaousuario($idAvaliacaousuario)
    {
        $this->idAvaliacaousuario = $idAvaliacaousuario;

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

    // Get the value of Fk_IdGrupos.
    public function getFkIdGrupos()
    {
        return $this->Fk_IdGrupos;
    }

    // Set the value of Fk_IdGrupos.
    public function setFkIdGrupos($Fk_IdGrupos)
    {
        $this->Fk_IdGrupos = $Fk_IdGrupos;

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

    // Get the value of Comenatario.
    public function getComenatario()
    {
        return $this->Comenatario;
    }

    // Set the value of Comenatario.
    public function setComenatario($Comenatario)
    {
        $this->Comenatario = $Comenatario;

        return $this;
    }

    // Get the value of Denuncia.
    public function getDenuncia()
    {
        return $this->Denuncia;
    }

    // Set the value of Denuncia.
    public function setDenuncia($Denuncia)
    {
        $this->Denuncia = $Denuncia;

        return $this;
    }

    // Get the value of Revisasdo.
    public function getRevisasdo()
    {
        return $this->Revisasdo;
    }

    // Set the value of Revisasdo.
    public function setRevisasdo($Revisasdo)
    {
        $this->Revisasdo = $Revisasdo;

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

    // Get the value of Fk_IdModerador.
    public function getFkIdModerador()
    {
        return $this->Fk_IdModerador;
    }

    // Set the value of Fk_IdModerador.
    public function setFkIdModerador($Fk_IdModerador)
    {
        $this->Fk_IdModerador = $Fk_IdModerador;

        return $this;
    }
}
