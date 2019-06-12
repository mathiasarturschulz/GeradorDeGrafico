<?php

include_once "Grafico.class.php";

class Pizza extends Grafico {

    public function __construct($titulo, $arrayValorX, $arrayValorY) 
    {
        parent::setTitulo($titulo);
        parent::setArrayValorX($arrayValorX);
        parent::setArrayValorY($arrayValorY);
    }

    public function __toString() {
        return "--> Pizza: <br>"
            . parent::__toString();
    }
}

?>