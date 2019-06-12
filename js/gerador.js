


/**
 * Método que adiciona uma nova linha na tabela
 */
function adicionaLinha(idTabela)
{
    // TABELA
    var tabela = document.getElementById(idTabela)
    var numeroLinhas = tabela.rows.length
    var linha = tabela.insertRow(numeroLinhas)

    // X
    var celula1 = linha.insertCell(0)
    var xs = document.createElement("input")
    xs.type = "text"
    xs.name = "arrayEixoX[]"
    celula1.appendChild(xs)

    // Y
    var celula2 = linha.insertCell(1)
    var ys = document.createElement("input")
    ys.type = "text"
    ys.name = "arrayEixoY[]"
    celula2.appendChild(ys)

    // BOTAO
    var celula3 = linha.insertCell(2)
    celula3.innerHTML =  "<button onclick='removeLinha(this, \"table\")' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Excluir</button>"
}



/**
 * Método que remove uma linha da tabela especificada
 */
function removeLinha(idLinhaParaRemover, nomeTabela) {
    const linha = idLinhaParaRemover.parentNode.parentNode.rowIndex
    document.getElementById(nomeTabela).deleteRow(linha)
}


/**
 * Método que gera o grafico
 */
function gerarGraficoBarra() {
    console.log('gerarGraficoBarra')
}



function apenasNumerosPositivos(string) {
    var numsStr = string.replace(/[^0-9]/g,'')
    numsStr = parseInt(numsStr)
    return numsStr > 0 ? numsStr : 0
}