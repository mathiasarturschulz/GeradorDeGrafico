<?php

include_once "Grafico.class.php";

class Pizza extends Grafico {

    public function __construct($titulo, $arrayValorX, $arrayValorY) 
    {
        parent::setTitulo($titulo);
        parent::setArrayValorX($arrayValorX);
        parent::setArrayValorY($arrayValorY);
    }

    /**
     * Método responsável por criar um gráfico de pizza de acordo com os paramêtros da classe
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
            . "google.charts.load('current', {'packages':['corechart']});"
            . "google.charts.setOnLoadCallback(function() { "
                
            . "    var arrayData = [];"
            . "    arrayData.push(['Table', 'Legend']);";
            
            foreach ($data as $chave => $valor) {
                $scriptJS .= "arrayData.push(['{$valor[0]}', {$valor[1]}]);";
            }

            $scriptJS .= ""
            . "    var data = google.visualization.arrayToDataTable(arrayData);"
            . "    var options = { "
            . "        title: '" . parent::getTitulo() . "'"
            . "    };"
            . "    var chart = new google.visualization.PieChart(document.getElementById('grafico_pizza'));"
            . "    chart.draw(data, options);"
            . "});"
            . "</script>";

        return $scriptJS;
    }

    public function __toString() {
        return "--> Pizza: <br>"
            . parent::__toString();
    }
}

?>