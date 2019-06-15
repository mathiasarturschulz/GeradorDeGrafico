<?php

include_once "Grafico.class.php";

class Linha extends Grafico {

    const TIPO_PALAVRA = 'string';
    const TIPO_NUMERO = 'number';

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

        $scriptJS = ""
            . "<script>"
            . "google.charts.load('current', {packages: ['corechart', 'line']});"
            . "google.charts.setOnLoadCallback(function() { "
            . "    var arrayData = [];"
            . "    arrayData.push(['Table', '" . $this->getLegenda() . "']);";
            
            foreach ($data as $chave => $valor) {
                $scriptJS .= "arrayData.push(['{$valor[0]}', {$valor[1]}]);";
            }

            $scriptJS .= ""
            . "    var data = google.visualization.arrayToDataTable(arrayData);"
            . "    var options = { "
            . "        title: '" . parent::getTitulo() . "',"
            . "        chartArea: {width: '50%'},"
            . "        hAxis: { title: '" . $this->getNomeEixoY() ."', minValue: 0 },"
            . "        vAxis: { title: '" . $this->getNomeEixoX() . "'}"
            . "    };"
            . "    var chart = new google.visualization.BarChart(document.getElementById('grafico_barra'));"
            . "    chart.draw(data, options);"
            . "});"
            . "</script>";

        //return $scriptJS;
        $a = "<script>
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);
        
        function drawBasic() {
        
            //titulo, legenda, nomeEixoX, nomeEixoY, arrayPontos
        
            var data = new google.visualization.DataTable();
            data.addColumn('string', '1X111');
            data.addColumn('number', 'Dogs'); //SEGUNDA COLUNA NÃO PODE SER PALAVRA
        
            data.addRows([
                ['teste', 0],   ['teste', 10]
            ]);
        
            var options = {
                title: 'Dogs 123',
                hAxis: {
                    title: 'Time'
                },
                vAxis: {
                    title: 'Popularity'
                }
            };
        
            var chart = new google.visualization.LineChart(document.getElementById('grafico_linha'));
        
            chart.draw(data, options);
        }
        </script>";
        return $a;
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