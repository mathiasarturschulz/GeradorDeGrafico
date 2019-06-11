<?php

require_once "autoload.php";

class PersistenciaProduto {

    const NOME_JSON = "produto.json";

    /**
     * Método que gera o arquivo JSON, converte o array para JSON
     */
    public function arrayToJson($array)
    {
        // CONVERTE O ARRAY PARA JSON
        $json = json_encode($array);
        // ABRE / CRIA O ARQUIVO, LIMPA O ARQUIVO E ESCREVE OS DADOS
        $file = fopen(self::NOME_JSON, "w");
        // ESCREVE O CONTEUDO JSON NO ARQUIVO
        fwrite($file, $json);
        // FECHA O ARQUIVO
        fclose($file);
    }

    /**
     * Método que retorna um array de objetos a partir do JSON
     */
    public function jsonToArray()
    {
        // CARREGAR OS VALORES DO JSON
        $fileJson = file_get_contents(self::NOME_JSON);
        // DECODIFICA O JSON
        $arrayJson = json_decode($fileJson, true);

        $arrayObjetos = [];
        foreach ($arrayJson as $chave => $objeto) {
            $arrayObjetos[] = new Produto(
                $objeto["id"],
                $objeto["nome"],
                $objeto["descricao"],
                $objeto["marca"],
                $objeto["preco"],
                $objeto["largura"],
                $objeto["altura"]
            );
        }

        return $arrayObjetos;
    }

    /**
     * Método que verifica o ID do último objeto
     * Retorna o próximo ID para ser setado no novo Objeto a ser inserido
     */
    public function obterProximoId()
    {
        $arrayObjetos = $this->jsonToArray();
        // CASO O ARRAY / JSON NÃO SEJA VAZIO ENTRA NO IF
        if($arrayObjetos) {
            // ULTIMA POSIÇÃO DO ARRAY
            $objeto = end($arrayObjetos);
            // PRÓXIMO ID
            return ($objeto->getId() + 1);
        }
        // PRIMEIRO ELEMENTO DO ARRAY / JSON
        return 1;
    }

    /**
     * Método que retorna uma lista de informações dos Caminhoes
     */
    public function listaInfoProdutos()
    {
        $aProdutos = $this->jsonToArray();
        $aIdsProdutos = [];
        foreach ($aProdutos as $chave => $oProduto) {
            $aInfoProduto = [
                $oProduto->getId(),
                $oProduto->getNome()
            ];
            $aIdsProdutos[] = $aInfoProduto;
        }

        return $aIdsProdutos;
    }

    /**
     * Método que recebe um novo Objeto que será adicionado no JSON
     * Retorna o novo Array obtido
     */
    public function updateJsonFile($novoObjeto)
    {
        if (!$novoObjeto)
            return '';
        
        $array = $this->jsonToArray(); 
        $array[] = $novoObjeto;

        $this->arrayToJson($array);

        return $array;
    }

    /**
     * Método responsável por gerar a Tabela a partir do Array de Objetos passados
     * 
     * Retorna uma String das linhas da tabela
     */
    public function generateTable($aProduto)
    {
        // SETAR OS VALORES DO NOVO ARRAY NA TABELA
        $table = "";
        if ($aProduto) {
            foreach ($aProduto as $chave => $oProduto) {
                $table .= ""
                    . "<tr>"
                    . "    <td><input type='text' id='inputtableid' name='arrayIds[]' value='" . $oProduto->getId() . "' readOnly></td>"
                    . "    <td><input type='text' id='inputtable' name='arrayNomes[]' value='" . $oProduto->getNome() . "' </td>"
                    . "    <td><input type='text' id='inputtable' name='arrayDescricoes[]' value='" . $oProduto->getDescricao() . "' </td>"
                    . "    <td><input type='text' id='inputtable' name='arrayMarcas[]' value='" . $oProduto->getMarca() . "' </td>"
                    . "    <td><input type='text' id='inputtablepreco' name='arrayPrecos[]' value='" . $oProduto->getPreco() . "' </td>"
                    . "    <td><input type='text' id='inputtableid' name='arrayLarguras[]' value='" . $oProduto->getLargura() . "' </td>"
                    . "    <td><input type='text' id='inputtableid' name='arrayAlturas[]' value='" . $oProduto->getAltura() . "' </td>"
                    . "    <td>"
                    //. "        <button onclick='alteraLinha(this, \"tableProduto\")' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</button>"
                    . "        <button onclick='removeLinha(this, \"tableProduto\")' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Excluir</button>"
                    . "    </td>"
                    . "</tr>"
                ;
            }
        }else {
            $table .= "<tr><td colspan='6'>Nenhum registro encontrado! </td></tr>";
        }
        
        return $table;
    }

    /**
     * Método responsável por salvar a tabela gerada
     */
    function saveTable($arrayIds, $arrayNomes, $arrayDescricoes, $arrayMarcas, $arrayPrecos, $arrayLarguras, $arrayAlturas)
    {
        $arrayToSave = [];
        
		for ($i = 0; $i < sizeof($arrayIds); $i++) {
			$oProduto = new Produto(
                $arrayIds[$i],
                $arrayNomes[$i],
                $arrayDescricoes[$i],
                $arrayMarcas[$i],
                $arrayPrecos[$i],
                $arrayLarguras[$i],
                $arrayAlturas[$i]
            );

			array_push($arrayToSave, $oProduto);
        }
        
		$this->arrayToJson($arrayToSave);
	}
}

?>