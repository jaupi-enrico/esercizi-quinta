const CHIAVE_STORAGE = "feedback";

let dati = JSON.parse(localStorage.getItem(CHIAVE_STORAGE)) || [];

const campi = [
  "nome",
  "email",
  "data",
  "ora",
  "tipoFeedback",
  "testoFeedback",
  "iscrizione"
];

const form = document.getElementById("formFeedback");
const messaggioConferma = document.getElementById("messaggioConferma");
const corpoTabella = document.getElementById("corpoTabella");
const bottoneEliminaTutto = document.getElementById("bottoneEliminaTutto");

function salvaStorage() {
  localStorage.setItem(CHIAVE_STORAGE, JSON.stringify(dati));
}

function creaRiga(dato) {
  const riga = document.createElement("tr");

  for (let i = 0; i < campi.length; i++) {
    const cella = document.createElement("td");
    cella.textContent = dato[campi[i]];
    riga.appendChild(cella);
  }

  const cellaAzioni = document.createElement("td");
  const bottoneElimina = document.createElement("button");
  bottoneElimina.textContent = "Elimina";

  bottoneElimina.addEventListener("click", function () {
    riga.remove();
    dati.splice(dati.indexOf(dato), 1);
    salvaStorage();
  });

  cellaAzioni.appendChild(bottoneElimina);
  riga.appendChild(cellaAzioni);

  corpoTabella.appendChild(riga);
}

for (let i = 0; i < dati.length; i++) {
  creaRiga(dati[i]);
}

form.addEventListener("submit", function (event) {
  event.preventDefault();

  const nome = document.getElementById("nome").value.trim();
  const email = document.getElementById("email").value.trim();
  const data = document.getElementById("data").value;
  const ora = document.getElementById("ora").value;
  const tipoFeedback = document.getElementById("tipoFeedback").value;
  const testoFeedback = document.getElementById("testoFeedback").value.trim();
  const iscrizioneCheck = document.getElementById("iscrizione").checked;

  if (!nome || !email || !data || !ora || !tipoFeedback || !testoFeedback) {
    alert("Compila tutti i campi obbligatori.");
    return;
  }

  const iscrizione = iscrizioneCheck ? "Si" : "No";

  const dato = {
    nome,
    email,
    data,
    ora,
    tipoFeedback,
    testoFeedback,
    iscrizione
  };

  dati.push(dato);
  salvaStorage();

  creaRiga(dato);

  messaggioConferma.textContent = "Feedback inviato con successo!";

  form.reset();
});

bottoneEliminaTutto.addEventListener("click", function () {
  dati = [];
  salvaStorage();
  corpoTabella.innerHTML = "";
});
