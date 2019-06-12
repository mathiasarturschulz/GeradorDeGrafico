<?php

include_once "Grafico.class.php";

class Linha extends Grafico {

    private $legenda;
    private $nomeEixoX;
    private $nomeEixoY;

    public function __construct($titulo, $legenda, $nomeEixoX, $nomeEixoY, $arrayValorX, $arrayValorY) 
    {
        parent::setTitulo($titulo);
        $this->setLegenda($legenda);
        $this->setNomeEixoX($nomeEixoX);
        $this->setNomeEixoY($nomeEixoY);
        parent::setArrayValorX($arrayValorX);
        parent::setArrayValorY($arrayValorY);
    }

    /**
     * Get the value of legenda
     */ 
    public function getLegenda()
    {
        return $this->legenda;
    }

    /**
     * Set the value of legenda
     *
     * @return  self
     */ 
    public function setLegenda($legenda)
    {
        $this->legenda = $legenda;

        return $this;
    }

    /**
     * Get the value of nomeEixoX
     */ 
    public function getNomeEixoX()
    {
        return $this->nomeEixoX;
    }

    /**
     * Set the value of nomeEixoX
     *
     * @return  self
     */ 
    public function setNomeEixoX($nomeEixoX)
    {
        $this->nomeEixoX = $nomeEixoX;

        return $this;
    }

    /**
     * Get the value of nomeEixoY
     */ 
    public function getNomeEixoY()
    {
        return $this->nomeEixoY;
    }

    /**
     * Set the value of nomeEixoY
     *
     * @return  self
     */ 
    public function setNomeEixoY($nomeEixoY)
    {
        $this->nomeEixoY = $nomeEixoY;

        return $this;
    }

    public function __toString() {
        return "{ Linha: "
            . parent::__toString()
            . " Legenda = " . $this->getLegenda()
            . " Nome Eixo X = " . $this->getNomeEixoX()
            . " Nome Eixo Y = " . $this->getNomeEixoY() . " }";
    }
}

?>