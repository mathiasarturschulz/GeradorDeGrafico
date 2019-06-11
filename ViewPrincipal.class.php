<?php
    require_once "inc/Header.php";
    require_once "autoload.php";
    echo "<br>";
?>

<?php
	$oPersistenciaCaminhao = new PersistenciaCaminhao();

    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : "";
    $marca = isset($_POST['marca']) ? $_POST['marca'] : "";
    $nomeMotorista = isset($_POST['nomeMotorista']) ? $_POST['nomeMotorista'] : "";

	if (isset($_POST['confirmar'])) {
		$oPersistenciaCaminhao->saveTable(
			$_POST['arrayCodigos'], 
			$_POST['arrayModelos'], 
			$_POST['arrayMarcas'], 
			$_POST['arrayNomeMotoristas']
		);
	}

	$aCaminhao = $oPersistenciaCaminhao->jsonToArray();
	
	$table = $oPersistenciaCaminhao->generateTable($aCaminhao);
?>
<script>
	var valCodigoToSet = <?= $oPersistenciaCaminhao->obterProximoId();?>
</script>

<div class="container">
    <h2 class="col-sm-6">Gerando um gráfico...</h2><br>

    <form action="" method="post">
        <!--ESCONDER UM CAMPO: style="display:none;"-->
        <label for="Z">Modelo: </label>
        <input type="text" id="modelo" name="modelo"  value="<?= $modelo;?>">
        <label for="Z">Marca: </label>
        <input type="text" id="marca" name="marca"  value="<?= $marca;?>">
        <label for="Z">Nome do Motorista: </label>
        <input type="text" id="nomeMotorista" name="nomeMotorista"  value="<?= $nomeMotorista;?>">

        <input type="button" class="btn btn-primary" onclick="adicionaLinhaCaminhao('tableCaminhao', 'modelo', 'marca', 'nomeMotorista')" value="Novo Caminhão">
        <!--<a class="btn btn-primary" onclick="adicionaLinhaCaminhao('table', 'modelo', 'marca', 'nomeMotorista')" ><i class="fa fa-plus"></i> Novo Caminhão</a>-->
    
        <br><br>
        <table id="tableCaminhao" class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Nome do Motorista</th>
                    <th>Ação<th>
                </tr>
            </thead>
            <?= $table?>
        </table>

        
		<div style="text-align: right;">
		<input type="submit" class="btn btn-outline-primary" id="confirmar" name="confirmar" value="Confirmar Alterações">
		</div>
    </form><br>
</div>

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors() {
      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population', '2000 Population'],
        ['New York City, NY', 8175000, 8008000],
        ['Los Angeles, CA', 3792000, 3694000],
        ['Chicago, IL', 2695000, 2896000],
        ['Houston, TX', 2099000, 1953000],
        ['Philadelphia, PA', 1526000, 1517000]
      ]);

      var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'City',
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>

<?php
    require_once "inc/Footer.php";
?>