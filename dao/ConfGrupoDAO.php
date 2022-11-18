<?php
// Conf_Grupo.
class  ConfGrupoDAO{

    private $Fk_IdUsuario = null;
    private $Tipo = null;
    private $Fk_IdGrupos = null;
    private $Data = null;



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

    // Get the value of Tipo.
    public function getTipo()
    {
        return $this->Tipo;
    }

    // Set the value of Tipo.
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;

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

    // Get the value of Data.
    public function getData()
    {
        return $this->Data;
    }

    // Set the value of Data.
    public function setData($Data)
    {
        $this->Data = $Data;

        return $this;
    }
}





?>