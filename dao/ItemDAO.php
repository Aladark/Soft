<?php
// Item.
class Item{


    private $IdItem = null;
    private $Fk_IdTipo_Item = null;
    private $Desc_Item = null;
    private $Valor = null;





    // Get the value of Fk_IdTipo_Item.
    public function getFkIdTipoItem()
    {
        return $this->Fk_IdTipo_Item;
    }

    // Set the value of Fk_IdTipo_Item.
    public function setFkIdTipoItem($Fk_IdTipo_Item)
    {
        $this->Fk_IdTipo_Item = $Fk_IdTipo_Item;

        return $this;
    }

    // Get the value of Desc_Item.
    public function getDescItem()
    {
        return $this->Desc_Item;
    }

    // Set the value of Desc_Item.
    public function setDescItem($Desc_Item)
    {
        $this->Desc_Item = $Desc_Item;

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

    // Get the value of IdItem.
    public function getIdItem()
    {
        return $this->IdItem;
    }

    // Set the value of IdItem.
    public function setIdItem($IdItem)
    {
        $this->IdItem = $IdItem;

        return $this;
}

}
?>