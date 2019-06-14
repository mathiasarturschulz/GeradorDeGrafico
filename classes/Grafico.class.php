<?php

abstract class Grafico {

    private $titulo;
    private $arrayValorX = [];
    private $arrayValorY = [];

    public function __construct($titulo, $arrayValorX, $arrayValorY) 
    {
        $this->setTitulo($titulo);
        $this->setArrayValorX($arrayValorX);
        $this->setArrayValorY($arrayValorY);
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of arrayValorX
     */ 
    public function getArrayValorX()
    {
        return $this->arrayValorX;
    }

    /**
     * Set the value of arrayValorX
     *
     * @return  self
     */ 
    public function setArrayValorX($arrayValorX)
    {
        $this->arrayValorX = $arrayValorX;

        return $this;
    }

    /**
     * Get the value of arrayValorY
     */ 
    public function getArrayValorY()
    {
        return $this->arrayValorY;
    }

    /**
     * Set the value of arrayValorY
     *
     * @return  self
     */ 
    public function setArrayValorY($arrayValorY)
    {
        $this->arrayValorY = $arrayValorY;

        return $this;
    }

    public function __toString() {
        return "{ Grafico: "
            . " Titulo = " . $this->getTitulo()
            . " Array Valores X = " . json_encode($this->getArrayValorX())
            . " Array Valores Y = " . json_encode($this->getArrayValorY()) . " }";
    }
}

?>