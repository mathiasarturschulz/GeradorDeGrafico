<?php
    require_once "inc/Header.php";
    require_once "autoload.php";
    echo "<br>";
?>

<?php
    $oPersistenciaCarga = new PersistenciaCarga();
    $oPersistenciaCaminhao = new PersistenciaCaminhao();
    $oPersistenciaProduto = new PersistenciaProduto();

    $cepOrigem = isset($_POST['cepOrigem']) ? $_POST['cepOrigem'] : "";
    $cepDestino = isset($_POST['cepDestino']) ? $_POST['cepDestino'] : "";
    $idCaminhao = isset($_POST['idCaminhao']) ? $_POST['idCaminhao'] : "";
    $arrayItemProduto = "";
    // $arrayItemProduto = isset($_POST['arrayItemProduto']) ? $_POST['arrayItemProduto'] : [];

    /*
	if (isset($_POST['confirmar'])) {
        // QUANDO CONFIRMAR PEGA O ID DO CAMINHAO NO SELECT
		$oPersistenciaCarga->saveTable(
            $_POST['arrayCepOrigem'],
            $_POST['arrayCepDestino'],
            $_POST['arrayIdCaminhao'],
            $_POST['arrayArrayItemProduto']
		);
    }*/
    
    $aInfoCaminhao = $oPersistenciaCaminhao->listaInfoCaminhoes();

    $sInfoCaminhoes = generateStringInfoCaminhoes($aInfoCaminhao);

    function generateStringInfoCaminhoes($aInfoCaminhao)
    {
        $sInfo = "<option value=\"0\">Nenhum produto encontrado </option>";
        if ($aInfoCaminhao) {
            $sInfo = "";
            foreach ($aInfoCaminhao as $chave => $oInfo) {
                $sInfo .= ""
                    . "<option value=\"$oInfo[0]\">" . ($oInfo[0] . " - " . $oInfo[1]) . "</option>"
                ;
            }
        }
        
        return $sInfo;
    }


    $aInfoProduto = $oPersistenciaProduto->listaInfoProdutos();

    $sInfoProdutos = generateStringInfoCaminhoes($aInfoProduto);

    function generateStringInfoProdutos($aInfoProduto)
    {
        $sInfo = "<option value=\"0\">Nenhum caminhão encontrado </option>";
        if ($aInfoProduto) {
            $sInfo = "";
            foreach ($aInfoProduto as $chave => $oInfo) {
                $sInfo .= ""
                    . "<option value=\"$oInfo[0]\">" . ($oInfo[0] . " - " . $oInfo[1]) . "</option>"
                ;
            }
        }
        
        return $sInfo;
    }


    /*
    <select name="select">
        <option value="valor1">Valor 1</option> 
        <option value="valor2" selected>Valor 2</option>
        <option value="valor3">Valor 3</option>
    </select>
    */

    $aCargas = $oPersistenciaCarga->jsonToArray();
	
	$table = $oPersistenciaCarga->generateTable($aCargas);
?>
<script>
	var valCodigoToSet = <?= $oPersistenciaCarga->obterProximoId();?>
</script>

<div class="container">
    <h2 class="col-sm-6">Cargas</h2><br>

    <form action="" method="post">
        <!--ESCONDER UM CAMPO: style="display:none;"-->
        <label for="Z">CEP Origem: </label>
        <input type="text" id="cepOrigem" name="cepOrigem"  value="<?= $cepOrigem;?>">
        <label for="Z">CEP Destino: </label>
        <input type="text" id="cepDestino" name="cepDestino"  value="<?= $cepDestino;?>">
        <br>
        <label for="Z">Dados do Caminhão: </label>
        <select name="select">
            <?= $sInfoCaminhoes?>
        </select>
        <br><br>
        <label for="Z">Produtos: </label>
        <select multiple name="select">
            <?= $sInfoProdutos?>
        </select>

        <br>
        <input type="button" class="btn btn-primary" onclick="adicionaLinhaCarga('tableCarga', 'cepOrigem', 'cepDestino', 'idCaminhao', 'arrayItemProduto')" value="Nova Carga">
    
        <br><br>
        <table id="tableCarga" class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CEP Origem</th>
                    <th>CEP Destino</th>
                    <th>Caminhao</th>
                    <th>Produtos</th>
                    <th>Ação</th>
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