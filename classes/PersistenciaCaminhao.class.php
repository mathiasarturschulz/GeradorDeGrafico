<?php

require_once "autoload.php";

class PersistenciaCaminhao {

    const NOME_JSON = "caminhoes.json";

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
            $arrayObjetos[] = new Caminhao(
                $objeto["id"],
                $objeto["modelo"],
                $objeto["marca"],
                $objeto["nomeMotorista"]
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
    public function listaInfoCaminhoes()
    {
        $aCaminhoes = $this->jsonToArray();
        $aIdsCaminhoes = [];
        foreach ($aCaminhoes as $chave => $oCaminhao) {
            $aInfoCaminhao = [
                $oCaminhao->getId(),
                $oCaminhao->getNomeMotorista()
            ];
            $aIdsCaminhoes[] = $aInfoCaminhao;
        }

        return $aIdsCaminhoes;
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
    public function generateTable($aCaminhao) {
        // SETAR OS VALORES DO NOVO ARRAY NA TABELA
        $table = "";
        if ($aCaminhao) {
            foreach ($aCaminhao as $chave => $oCaminhao) {
                $table .= ""
                    . "<tr>"
                    . "    <td><input type='text' id='inputtableid' name='arrayCodigos[]' value='" . $oCaminhao->getId() . "' readOnly></td>"
                    . "    <td><input type='text' id='inputtable' name='arrayModelos[]' value='" . $oCaminhao->getModelo() . "' </td>"
                    . "    <td><input type='text' id='inputtable' name='arrayMarcas[]' value='" . $oCaminhao->getMarca() . "' </td>"
                    . "    <td><input type='text' id='inputtable' name='arrayNomeMotoristas[]' value='" . $oCaminhao->getNomeMotorista() . "' </td>"
                    . "    <td>"
                    //. "        <button onclick='alteraLinha(this, \"tableCaminhao\", modelo, marca, nomeMotorista)' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</button>"
                    . "        <button onclick='removeLinha(this, \"tableCaminhao\")' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Excluir</button>"
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
    function saveTable($arrayCodigos, $arrayModelos, $arrayMarcas, $arrayNomeMotoristas){
        $arrayToSave = [];
        
		for ($i = 0; $i < sizeof($arrayCodigos); $i++) {
			$oCaminhao = new Caminhao(
                $arrayCodigos[$i],
                $arrayModelos[$i],
                $arrayMarcas[$i],
                $arrayNomeMotoristas[$i]
            );

			array_push($arrayToSave, $oCaminhao);
        }
        
		$this->arrayToJson($arrayToSave);
	}
}

?>