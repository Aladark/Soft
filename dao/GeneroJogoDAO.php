<?php
// GeneroJogo
class GeneroJogo{
    
private $Fk_IdJogoFk_Id = null;
private $Genero = null;




// Get the value of Fk_IdJogoFk_I.
public function getFkIdJogoFkId()
{
return $this->Fk_IdJogoFk_Id;
}

// Set the value of Fk_IdJogoFk_Id.
public function setFkIdJogoFkId($Fk_IdJogoFk_Id)
{
$this->Fk_IdJogoFk_Id = $Fk_IdJogoFk_Id;

return $this;
}


// Get the value of Genero.
public function getGenero()
{
return $this->Genero;
}

// Set the value of Genero.
public function setGenero($Genero)
{
$this->Genero = $Genero;

return $this;
}
}


?>