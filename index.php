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
    
?>

<div id="grafico_barra"></div>



<!--
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    //titulo, legenda, nomeEixoX, nomeEixoY, arrayNomeValor

    var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population',],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000]
    ]);

    console.log(data)

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

    chart.draw(data, options);
}
</script>

            




<div id="grafico_linha"></div>

<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    //titulo, legenda, nomeEixoX, nomeEixoY, arrayPontos

    var data = new google.visualization.DataTable();
    data.addColumn('number', '1X111');
    data.addColumn('number', 'Dogs');

    data.addRows([
        [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
        [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
        [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
        [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
        [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
        [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
        [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
        [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
        [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
        [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
        [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
        [66, 70], [67, 72], [68, 75], [69, 80]
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
</script>



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