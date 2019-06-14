<?php

include_once "Grafico.class.php";

class Barra extends Grafico {

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

    public function gerarGrafico() {

        $data = [];
        echo "<br><br>gerarGrafico<br><br>";
        echo var_dump(parent::getArrayValorX());
        echo var_dump(parent::getArrayValorY());

        for ($i = 0; $i < sizeof(parent::getArrayValorX()); $i++) { 
            if (!isset(parent::getArrayValorX()[$i]) || !isset(parent::getArrayValorY()[$i])) {
                //throw new Exception('ERRO!');
                //return false;
                echo "ERRO";
            } else {
                $data[] = [
                    parent::getArrayValorX()[$i],
                    parent::getArrayValorY()[$i]
                ];
            }
            
        }

        echo var_dump($data);
        echo "teste";
        $scriptJS = ""
            . "<script>"
            
            /*google.charts.load('current', {packages: ['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawBasic);*/

            //function drawBasic() {

            //titulo, legenda, nomeEixoX, nomeEixoY, arrayNomeValor

            . "var arrayData = [];";
            foreach ($data as $chave => $valor) {
                $scriptJS .= "arrayData.push([ {$valor[0]} , {$valor[1]} ]);";
            }

            $scriptJS .= ""
            . "console.log(arrayData);"
            /*. "var data = google.visualization.arrayToDataTable(["
            . "    ['City', '2010 Population',],"
            . "    ['New York City, NY', 8175000],"
            . "    ['Los Angeles, CA', 3792000],"
            . "    ['Chicago, IL', 2695000],"
            . "    ['Houston, TX', 2099000],"
            . "    ['Philadelphia, PA', 1526000]"
            . "]);"

            /*console.log(data)

            var options = {
                title: 'Population of Largest U.S. Cities',
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Total Population',
                    minValue: 0
                },
                vAxis: {
                    title: 'City'
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('grafico'));

            chart.draw(data, options);*/
            . "</script>";

        return $scriptJS;
        //return "<script> console.log('teste') </script>";
    }

    public function __toString() {
        return "{ Barra: "
            . parent::__toString()
            . " Legenda = " . $this->getLegenda()
            . " Nome Eixo X = " . $this->getNomeEixoX()
            . " Nome Eixo Y = " . $this->getNomeEixoY() . " }";
    }
}

?>