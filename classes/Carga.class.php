<?php

class Carga implements JsonSerializable {

    private $id;
    private $cepOrigem;
    private $cepDestino;
    private $Caminhao;
    private $ListaItemProduto = [];

    public function __construct($id, $cepOrigem, $cepDestino, $Caminhao, $ListaItemProduto)
    {
        $this->setId($id);
        $this->setCepOrigem($cepOrigem);
        $this->setCepDestino($cepDestino);
        $this->setCaminhao($Caminhao);
        $this->setListaItemProduto($ListaItemProduto);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of cepOrigem
     */ 
    public function getCepOrigem()
    {
        return $this->cepOrigem;
    }

    /**
     * Set the value of cepOrigem
     *
     * @return  self
     */ 
    public function setCepOrigem($cepOrigem)
    {
        $this->cepOrigem = $cepOrigem;

        return $this;
    }

    /**
     * Get the value of cepDestino
     */ 
    public function getCepDestino()
    {
        return $this->cepDestino;
    }

    /**
     * Set the value of cepDestino
     *
     * @return  self
     */ 
    public function setCepDestino($cepDestino)
    {
        $this->cepDestino = $cepDestino;

        return $this;
    }

    /**
     * Get the value of Caminhao
     */ 
    public function getCaminhao()
    {
        return $this->Caminhao;
    }

    /**
     * Set the value of Caminhao
     *
     * @return  self
     */ 
    public function setCaminhao($Caminhao)
    {
        $this->Caminhao = $Caminhao;

        return $this;
    }

    /**
     * Get the value of ListaItemProduto
     */ 
    public function getListaItemProduto()
    {
        return $this->ListaItemProduto;
    }

    /**
     * Set the value of ListaItemProduto
     *
     * @return  self
     */ 
    public function setListaItemProduto($ListaItemProduto)
    {
        $this->ListaItemProduto = $ListaItemProduto;

        return $this;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
    
    public function __toString() {
        return "--> Carga <br>"
                    . "ID = " . $this->getId() . "<br>"
                    . "CEP Origem = " . $this->getCepOrigem() . "<br><br>"
                    . "CEP Destino = " . $this->getCepDestino() . "<br>"
                    . "### Caminhao = " . $this->getCaminhao() . "<br>"
                    //EXEMPLO DATA=. "Data = " . $this->getData()->format('d-m-Y') . "<br>"
                    . "### Lista Produtos = <br>" . implode("", $this->getListaItemProduto()) . "<br>";
    }
}

?>