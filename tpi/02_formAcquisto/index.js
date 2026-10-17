const form = document.getElementById("formAcquisto")
const tabella = document.getElementById("corpoTabella")
const risultato = document.getElementById("risultato")

let prodotti = JSON.parse(localStorage.getItem("prodotti")) || []

mostra()

form.addEventListener("submit", function (event) {
    event.preventDefault()

    const nome = document.getElementById("prodotto").value.trim()
    const prezzo = Number(document.getElementById("prezzo").value)
    const quantita = Number(document.getElementById("quantita").value)

    const subtotale = prezzo * quantita
    const sconto = subtotale >= 100 ? subtotale * 0.1 : 0
    const totale = subtotale - sconto

    prodotti.push({ nome, prezzo, quantita, subtotale, sconto, totale })

    localStorage.setItem("prodotti", JSON.stringify(prodotti))
    mostra()
    form.reset()
})

function elimina(indice) {
    prodotti.splice(indice, 1)
    localStorage.setItem("prodotti", JSON.stringify(prodotti))
    mostra()
}

function mostra() {
    tabella.innerHTML = ""
    let somma = 0

    prodotti.forEach(function (p, i) {
        tabella.innerHTML += `<tr>
            <td>${p.nome}</td>
            <td>${p.prezzo.toFixed(2)}</td>
            <td>${p.quantita}</td>
            <td>${p.subtotale.toFixed(2)}</td>
            <td>${p.sconto.toFixed(2)}</td>
            <td>${p.totale.toFixed(2)}</td>
            <td><button onclick="elimina(${i})">Elimina</button></td>
        </tr>`
        somma += p.totale
    })

    risultato.textContent = "Totale complessivo: " + somma.toFixed(2) + " €"
}
