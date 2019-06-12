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
    <h2 class="col-sm-6">Caminhões</h2><br>

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

<?php
    require_once "inc/Footer.php";
?>