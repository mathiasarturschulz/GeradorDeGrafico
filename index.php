<?php
    require_once "inc/Header.php";
    require_once "autoload.php";
    echo "<br>";

    /*
    -- Google Charts:
    - Gráfico de Barra
    https://developers.google.com/chart/interactive/docs/gallery/barchart

    - Gráfico de Linha
    https://developers.google.com/chart/interactive/docs/gallery/linechart

    - Gráfico de Pizza
    https://developers.google.com/chart/interactive/docs/gallery/piechart

    Montar uma classe para o usuário montar um gráfico.
    */

    $titulo = "Cinco Cidades mais Populosas do Brasil";
    $legenda = "Número de Habitantes por Cidade";
    $nomeEixoX = "Cidade";
    $nomeEixoY = "Total de Habitantes (em milhões)";
    $arrayEixoX = [
        'Fortaleza (CE)',
        'São Paulo (SP)',
        'Brasília (DF)',
        'Salvador (BA)',
        'Rio de Janeiro (RJ)'
    ];
    $arrayEixoY = [
        2627482,
        12106920,
        3039444,
        2953986,
        6520266
    ];

    $oBarra = new Barra($titulo, $legenda, $nomeEixoX, $nomeEixoY, $arrayEixoX, $arrayEixoY);
    echo $oBarra->gerarGrafico();

    $oLinha = new Linha($titulo, $legenda, $nomeEixoX, $nomeEixoY, $arrayEixoX, $arrayEixoY);
    echo $oLinha->gerarGrafico();
    
?>

<div id="grafico_barra"></div>
<br><br>
<div id="grafico_linha"></div>
<br><br>




<!--
<div id="grafico_pizza" style="width: 900px; height: 500px;"></div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    //titulo, arrayNomeValor

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
    ]);

    var options = {
        title: 'My Daily Activities'
    };

    var chart = new google.visualization.PieChart(document.getElementById('grafico_pizza'));

    chart.draw(data, options);
}
</script>
-->

<?php
    require_once "inc/Footer.php";
?>