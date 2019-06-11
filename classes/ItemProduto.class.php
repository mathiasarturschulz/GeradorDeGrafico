<?php

class ItemProduto implements JsonSerializable {

    private $Produto;
    private $quantidadeProduto;

    public function __construct($Produto, $quantidadeProduto) {
        $this->setProduto($Produto);
        $this->setQuantidadeProduto($quantidadeProduto);
    }

    /**
     * Get the value of Produto
     */ 
    public function getProduto()
    {
        return $this->Produto;
    }

    /**
     * Set the value of Produto
     *
     * @return  self
     */ 
    public function setProduto($Produto)
    {
        $this->Produto = $Produto;

        return $this;
    }

    /**
     * Get the value of quantidadeProduto
     */ 
    public function getQuantidadeProduto()
    {
        return $this->quantidadeProduto;
    }

    /**
     * Set the value of quantidadeProduto
     *
     * @return  self
     */ 
    public function setQuantidadeProduto($quantidadeProduto)
    {
        $this->quantidadeProduto = $quantidadeProduto;

        return $this;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public function __toString() {
        return "--> ItemProduto: <br>"
                    . "Produto = " . $this->getProduto()
                    . "Quantidade Produto = " . $this->getQuantidadeProduto() . "<br><br>";
    }
}

?>