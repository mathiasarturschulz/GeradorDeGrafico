


/**
 * Método que adiciona uma nova linha na tabela Caminhao
 */
function adicionaLinhaCaminhao(idTabela, idModelo, idMarca, idNomeMotorista)
{
    // TABELA
    var tabela = document.getElementById(idTabela)
    var numeroLinhas = tabela.rows.length
    var linha = tabela.insertRow(numeroLinhas)

    // ID
    var celula1 = linha.insertCell(0)
    var codigos = document.createElement("input")
    codigos.type = "text"
    codigos.id = "inputtableid"
    codigos.name = "arrayCodigos[]"
    codigos.value = valCodigoToSet
    codigos.readOnly = true
    celula1.appendChild(codigos)

    // MODELO
    var celula2 = linha.insertCell(1)
    var modelos = document.createElement("input")
    modelos.type = "text"
    modelos.id = "inputtable"
    modelos.name = "arrayModelos[]"
    modelos.value = document.getElementById(idModelo).value
    celula2.appendChild(modelos)

    // MARCA
    var celula3 = linha.insertCell(2)
    var marcas = document.createElement("input")
    marcas.type = "text"
    marcas.id = "inputtable"
    marcas.name = "arrayMarcas[]"
    marcas.value = document.getElementById(idMarca).value
    celula3.appendChild(marcas)

    // NOMEMOTORISTA
    var celula4 = linha.insertCell(3)
    var nomeMotoristas = document.createElement("input")
    nomeMotoristas.type = "text"
    nomeMotoristas.id = "inputtable"
    nomeMotoristas.name = "arrayNomeMotoristas[]"
    nomeMotoristas.value = document.getElementById(idNomeMotorista).value
    celula4.appendChild(nomeMotoristas)

    // ACAO
    var celula5 = linha.insertCell(4)
    var botoes = ""
        //+ "<button onclick='alteraLinha(this, \"tableCaminhao\", modelo, marca, nomeMotorista)' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</button>"
        + "<button onclick='removeLinha(this, \"tableCaminhao\")' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Excluir</button>"
    celula5.innerHTML = botoes;
    //celula5.innerHTML = "<button onclick='removeLinha(this, \"tableCaminhao\")' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Excluir</button>"
    valCodigoToSet++;
}


/**
 * Método que adiciona uma nova linha na tabela Produto
 */
function adicionaLinhaProduto(idTabela, idNome, idDescricao, idMarca, idPreco, idLargura, idAltura)
{
    var tabela = document.getElementById(idTabela)
    var numeroLinhas = tabela.rows.length
    var linha = tabela.insertRow(numeroLinhas)

    var celula1 = linha.insertCell(0)
    var codigos = document.createElement("input")
    codigos.type = "text"
    codigos.id = "inputtableid"
    codigos.name = "arrayIds[]"
    codigos.value = valCodigoToSet
    codigos.readOnly = true
    celula1.appendChild(codigos)

    var celula2 = linha.insertCell(1)
    var nomes = document.createElement("input")
    nomes.type = "text"
    nomes.id = "inputtable"
    nomes.name = "arrayNomes[]"
    nomes.value = document.getElementById(idNome).value
    celula2.appendChild(nomes)

    var celula3 = linha.insertCell(2)
    var descricoes = document.createElement("input")
    descricoes.type = "text"
    descricoes.id = "inputtable"
    descricoes.name = "arrayDescricoes[]"
    descricoes.value = document.getElementById(idDescricao).value
    celula3.appendChild(descricoes)

    var celula4 = linha.insertCell(3)
    var marcas = document.createElement("input")
    marcas.type = "text"
    marcas.id = "inputtable"
    marcas.name = "arrayMarcas[]"
    marcas.value = document.getElementById(idMarca).value
    celula4.appendChild(marcas)

    var celula5 = linha.insertCell(4)
    var precos = document.createElement("input")
    precos.type = "text"
    precos.id = "inputtablepreco"
    precos.name = "arrayPrecos[]"
    precos.value = document.getElementById(idPreco).value
    celula5.appendChild(precos)

    var celula6 = linha.insertCell(5)
    var larguras = document.createElement("input")
    larguras.type = "text"
    larguras.id = "inputtableid"
    larguras.name = "arrayLarguras[]"
    larguras.value = document.getElementById(idLargura).value
    celula6.appendChild(larguras)

    var celula7 = linha.insertCell(6)
    var alturas = document.createElement("input")
    alturas.type = "text"
    alturas.id = "inputtableid"
    alturas.name = "arrayAlturas[]"
    alturas.value = document.getElementById(idAltura).value
    celula7.appendChild(alturas)

    // ACAO
    var celula8 = linha.insertCell(7)
    var botoes = ""
        //+ "<button onclick='alteraLinha(this, \"tableProduto\")' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</button>"
        + "<button onclick='removeLinha(this, \"tableProduto\")' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Excluir</button>"
    celula8.innerHTML = botoes;
    //celula8.innerHTML = "<button onclick='removeLinha(this, \"tableProduto\")' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Excluir</button>"
    valCodigoToSet++;
}

/**
 * Método que remove uma linha da tabela especificada
 */
function removeLinha(idLinhaParaRemover, nomeTabela) {
    const linha = idLinhaParaRemover.parentNode.parentNode.rowIndex
    document.getElementById(nomeTabela).deleteRow(linha)
}

/**
 * Método que edita uma linha da tabela especificada
 */
function alteraLinha(idLinhaParaAlterar, nomeTabela, idModelo, idMarca, idNomeMotorista) {
    linhaParaAlterar = idLinhaParaAlterar.parentNode.parentNode.innerHTML
    //linhaParaAlterar = idLinhaParaAlterar.parentNode.parentNode.cells[1]
    //linhaParaAlterar = idLinhaParaAlterar.parentNode.parentNode
    //console.log(linhaParaAlterar)
    const linha = idLinhaParaAlterar.parentNode.parentNode.rowIndex
    document.getElementById(nomeTabela).deleteRow(linha)
    document.getElementById(nomeTabela).insertRow(linha)


    var nomeMotorista = document.getElementById(idNomeMotorista).value
    console.log(nomeMotorista)

    //var a = "<td><input type="text" name="arrayCodigos[]" value="3" readonly=""></td>    <td><input type="text" name="arraynomes[]" value="z3001223" <="" td="">    </td><td><input type="text" name="arraydescricoes[]" value="Iveco1223" <="" td="">    </td><td><input type="text" name="arraymarcas[]" value="2Mathias123" <="" td="">    </td><td>        <button onclick="alteraLinha(this, &quot;tableCaminhao&quot;)" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</button>    </td>"
    //var a;
    //a.appendChild("<td><input type=\"text\" name=\"arrayCodigos[]\" value=\"999\" readonly=\"\"></td>");

    //console.log(a)

    //document.getElementById(nomeTabela).replaceChild()
    //console.log(document.getElementById(nomeTabela).);


    var x = document.getElementById(nomeTabela).rows[1].cells;
    x[1].innerHTML = "NEW CONTENT";
    console.log(document.getElementById(nomeTabela).rows[1].cells)
}

function apenasNumerosPositivos(string) {
    var numsStr = string.replace(/[^0-9]/g,'')
    numsStr = parseInt(numsStr)
    return numsStr > 0 ? numsStr : 0
}