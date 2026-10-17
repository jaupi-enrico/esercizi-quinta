const eventi = [
  { id: 1, titolo: "Torneo di robotica", categoria: "Tecnologia", costo: 12, posti: 24, iscritti: 18, attivo: true },
  { id: 2, titolo: "Laboratorio di fotografia", categoria: "Arte", costo: 8, posti: 15, iscritti: 15, attivo: true },
  { id: 3, titolo: "Visita al museo della scienza", categoria: "Scienze", costo: 20, posti: 30, iscritti: 21, attivo: true },
  { id: 4, titolo: "Corso di primo soccorso", categoria: "Formazione", costo: 0, posti: 20, iscritti: 12, attivo: false },
  { id: 5, titolo: "Hackathon scolastico", categoria: "Tecnologia", costo: 5, posti: 40, iscritti: 35, attivo: true },
  { id: 6, titolo: "Teatro serale", categoria: "Cultura", costo: 15, posti: 25, iscritti: 9, attivo: true }
];

const postiLiberi = (evento) => evento.posti - evento.iscritti;

const idOriginali = eventi.map((evento) => evento.id);

const eventiOrdinati = [...eventi].sort((a, b) => a.costo - b.costo);

const idInvariati = eventi.every((evento, indice) => evento.id === idOriginali[indice]);
console.log("Ordine di eventi invariato?", idInvariati);

const salvaEventi = (lista) => {
  localStorage.setItem("eventiScolastici", JSON.stringify(lista));
};

const caricaEventi = () => {
  const dati = localStorage.getItem("eventiScolastici");
  if (dati === null) {
    return [...eventi];
  }
  return JSON.parse(dati);
};

salvaEventi(eventiOrdinati);
const eventiCaricati = caricaEventi();
console.table(eventiCaricati);
