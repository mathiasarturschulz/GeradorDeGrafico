<?php

include_once "Grafico.class.php";

class Linha extends Grafico {

    const TIPO_PALAVRA = "string";
    const TIPO_NUMERO = "number";

    private $legenda;
    private $nomeEixoX;
    private $tipoColunaX;
    private $nomeEixoY;

    public function __construct($titulo, $legenda, $nomeEixoX, $tipoColunaX, $nomeEixoY, $arrayValorX, $arrayValorY) 
    {
        parent::setTitulo($titulo);
        $this->setLegenda($legenda);
        $this->setNomeEixoX($nomeEixoX);
        $this->setTipoColunaX($tipoColunaX);
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
     * Get the value of tipoColunaX
     */ 
     public function getTipoColunaX()
     {
         return $this->tipoColunaX;
     }
 
     /**
      * Set the value of tipoColunaX
      *
      * @return  self
      */ 
     public function setTipoColunaX($tipoColunaX)
     {
         $this->tipoColunaX = $tipoColunaX;
 
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

    /**
     * Método responsável por criar um gráfico de linha de acordo com os paramêtros da classe
     *
     * @return  string
     */ 
     public function gerarGrafico() {
        $data = [];
        for ($i = 0; $i < sizeof(parent::getArrayValorX()); $i++) { 
            if (!isset(parent::getArrayValorX()[$i]) || !isset(parent::getArrayValorY()[$i])) {
                return "Erro ao gerar valores da tabela! ";
            }
            $data[] = [
                parent::getArrayValorX()[$i],
                parent::getArrayValorY()[$i]
            ];
        }
        if (!$data) {
            return "Sem valores Informados!! ";
        }
        if (!$this->getTipoColunaX() || ($this->getTipoColunaX() !== self::TIPO_NUMERO && $this->getTipoColunaX() !== self::TIPO_PALAVRA)
        ) {
            return "getTipoColunaX incorreto! Defina como: TIPO_PALAVRA ou TIPO_NUMERO.";
        }

        $scriptJS = ""
            . "<script>"
            . "google.charts.load('current', {packages: ['corechart', 'line']});"
            . "google.charts.setOnLoadCallback(function() { "

            . "    var data = new google.visualization.DataTable();"
            . "    data.addColumn('" . $this->getTipoColunaX() ."', 'COLUNA01');"
            . "    data.addColumn('number', '" . $this->getLegenda() . "'); /*SEGUNDA COLUNA NÃO PODE SER PALAVRA*/";

            if ($this->getTipoColunaX() === self::TIPO_PALAVRA) {
                foreach ($data as $chave => $valor) {
                    $scriptJS .= "data.addRows([['{$valor[0]}', {$valor[1]}]]);";
                }
            }
            if ($this->getTipoColunaX() === self::TIPO_NUMERO) {
                foreach ($data as $chave => $valor) {
                    $scriptJS .= "data.addRows([[{$valor[0]}, {$valor[1]}]]);";
                }
            }

            $scriptJS .= ""
            . "    var options = { "
            . "        title: '" . parent::getTitulo() . "',"
            . "        hAxis: { title: '" . $this->getNomeEixoX() ."', minValue: 0 },"
            . "        vAxis: { title: '" . $this->getNomeEixoY() . "'}"
            . "    };"
            . "    var chart = new google.visualization.LineChart(document.getElementById('grafico_linha'));"
            . "    chart.draw(data, options);"
            . "});"
            . "</script>";

        return $scriptJS;
    }

    public function __toString() {
        return "{ Linha: "
            . parent::__toString()
            . " Legenda = " . $this->getLegenda()
            . " Nome Eixo X = " . $this->getNomeEixoX()
            . " Tipo Eixo X = " . $this->getTipoColunaX()
            . " Nome Eixo Y = " . $this->getNomeEixoY() . " }";
    }
}

?>